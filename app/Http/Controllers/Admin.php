<?php

namespace App\Http\Controllers;     
use Illuminate\Support\Facades\DB;
use file;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;


class Admin extends Controller
{
    public function __construct(){
        $this->middleware('admn:mimin');
        //update discount
         $product_date = DB::table('discount')->get();
         $now = date('Y-m-d H:i:s');
         foreach ($product_date as $key){
            if ($key->date<=$now){
                DB::table('discount')->where('id', $key->id)->delete();
            }
         }
    }

   
    public function pesananmasuk(){
        $pm = DB::table('orders')->where('status', 1)->get();
        return $pm;
    }
    function index()
    {
    	return view('admin', ['fragment' =>'admin/dasboard', 'pm'=>$this->pesananmasuk()]);
    }
    function sub($id)
    {
        $sub = DB::table('sub_cat')->where('cat_id', $id)->get();
        return response()->json(['sub'=>$sub, 200]);
        
    }
    function discount()
    {
        $final = array();
        $discount= DB::table('discount')->get();
        foreach ($discount as $key ) {
            $product= DB::table('products')->where('product_id', $key->product_id)->get();
            array_push($final, ['id'=>$key->id, 'product_id'=>$key->product_id, 'discount'=>$key->discount, 'date'=>$key->date, 'product'=>$product]);
        }
        return view('admin', ['fragment'=>'admin/discount', 'data'=>$final, 'pm'=>$this->pesananmasuk()]);
    }
    // function discount_s(Request $r)
    // {
    //     if ($r->get('query')) {
    //         $query = $r->get('query');
    //         $data = DB::table('products')->where('product_name', 'LIKE', '%'.$query.'%')->get();
    //         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
    //         foreach ($data as $key=>$value ) {
    //             $output .= '<li><a href="javascript:;">'.$value->product_name.'</a></li>';
    //         }
    //         $output .= '</ul>';
    //         echo $output;
    //         //return response()->json($data);
    //     }
    // }
    function data($month=null)
    {
        if (!is_null($month)) {
            $bulan = date_create($month);
            $m =date_format($bulan, "m");
            $y =date_format($bulan, "yy");
            $order = array();
            $data = DB::table('orders')->whereMonth('order_time', '=', $m)->whereYear('order_time', '=', $y)->where('status', 0)->get();
            foreach ($data as $key =>$value) {
                $stuff= array();
                $user = DB::table('users')->where('id', $value->user_id)->get();
                 array_push($order, ['id'=>$value->id, 'invoice'=>$value->invoice, 'user_id'=>$user, 'total'=>$value->total, 'order_time'=>$value->order_time]);
            }
            return view('admin', ['fragment'=>'admin/data', 'order'=>$order, 'pm'=>$this->pesananmasuk()]);
        }else{
            $order = array();
            $data= DB::table('orders')->where('status', 0)->get();
            foreach ($data as $key =>$value) {
                $stuff= array();
                $user = DB::table('users')->where('id', $value->user_id)->get();
                 array_push($order, ['id'=>$value->id, 'invoice'=>$value->invoice, 'user_id'=>$user, 'total'=>$value->total, 'order_time'=>$value->order_time]);
            }
            return view('admin', ['fragment'=>'admin/data', 'order'=>$order, 'pm'=>$this->pesananmasuk()]);
        }
    }
    function order()
    {
        $order = array();
        $order= DB::table('orders')->join('users', 'orders.user_id', '=', 'users.id')->where('status', 1)->get();
        return view('admin', ['fragment'=>'admin/order', 'order'=>$order, 'pm'=>$this->pesananmasuk()]);
    }
    function product()
    {
        $final = array();
        $product= DB::table('products')->orderBy('product_id', 'desc')->get();
        foreach ($product as $key ) {
            $category= DB::table('category')->where('category_id', $key->category_id)->get();
            
            array_push($final, ['product_id'=>$key->product_id, 'product_name'=>$key->product_name, 'description'=>$key->description, 'price'=>$key->price, 'category'=>$category, 'stock'=>$key->stock, 'color'=>$key->color, 'img'=>$key->img]);
        }
        
    	return view('admin', ['fragment'=>'admin/product', 'final'=>$final, 'pm'=>$this->pesananmasuk()]);
    }

    function proccess_order($id){
        DB::table('orders')->where('invoice', $id)->update(['status'=>0]);
        return redirect()->back();
    }

    function product_out()
    {
        $final = array();
        $product= DB::table('product_out')->orderBy('id', 'desc')->get();
        foreach ($product as $key ) {
            $category= DB::table('category')->where('category_id', $key->category_id)->get();
            
            array_push($final, ['product_id'=>$key->product_id, 'product_name'=>$key->product_name, 'description'=>$key->description, 'price'=>$key->price, 'category'=>$category, 'stock'=>$key->stock, 'color'=>$key->color, 'img'=>$key->img]);
        }
        
        return view('admin', ['fragment'=>'admin/product_out', 'final'=>$final, 'pm'=>$this->pesananmasuk()]);
    }
    
    function add_product()
    {
        $final = array();
        $cat=DB::table('category')->orderBy('category_name', 'asc')->get();
        foreach ($cat as $key) {
            $sub = DB::table('sub_cat')->where('cat_id', $key->category_id)->get();
            array_push($final, ['id'=>$key->category_id, 'name'=>$key->category_name, 'sub'=>$sub]);
        }
    	return view('admin', ['fragment'=>'admin/add_product', 'final'=>$final, 'pm'=>$this->pesananmasuk()]);
    }
    function add_category(Request $r)
    {
    	DB::table('category')->insert(['category_name'=>$r->category]);
    	return redirect('/acategory');
    }
    function add_sub_cat(Request $r)
    {
        DB::table('sub_cat')->insert(['cat_id'=>$r->category,'sub'=>$r->sub_cat]);
        return redirect('/acategory');
    }
    function add_discount(Request $r)
    {
        $cek = DB::table('discount')->where('product_id', $r->input('product_id'))->get();
        if (count($cek)==1) {
            DB::table('discount')->where('product_id', $r->input('product_id'))->update([
            'discount'=>$r->discount,
            'date'=>$r->date
            ]);
        }else{
            DB::table('discount')->insert([
            'product_id'=>$r->input('product_id'),
            'discount'=>$r->discount,
            'date'=>$r->date
            ]);
        }
        
        return redirect('adiscount');
        
    }
    function add_voucher(Request $r)
    {
        DB::table('voucher')->insert([
            'name'=> $r->name,
            'des'=> $r->des,
            'amount'=>$r->amount,
            'img'=>$img
        ]);
    }
    function category()
    {
        $final = array();
    	
        $cat=DB::table('category')->orderBy('category_name', 'asc')->get();
        foreach ($cat as $key) {
            $sub = DB::table('sub_cat')->where('cat_id', $key->category_id)->get();
            array_push($final, ['id'=>$key->category_id, 'name'=>$key->category_name, 'sub'=>$sub]);
        }
        
    	return view('admin', ['fragment'=>'admin/category', 'category'=>$cat, 'final'=>$final, 'pm'=>$this->pesananmasuk()]);
    }
    
    function edit_product($id)
    {
        $data['product'] = DB::table('products')->where('product_id', $id)->first();
        $data['category_select'] = DB::table('category')->where('category_id', $id)->first();
        $data['category'] = DB::table('category')->get();
        $data['picture'] = DB::table('picture')->where('id', $id)->first();
        $data['discount'] = DB::table('discount')->where('product_id', $id)->first();
        return view('admin', ['fragment'=>'admin/edit_product', 'pm'=>$this->pesananmasuk()], $data);
    }
    function tambah(Request $r)
    {
        
        $idc = $r->input('sub'.$r->cat_id);
        $cat = DB::table('category')->where('category_id', $r->cat_id)->first();
        $sub = DB::table('sub_cat')->where('id', $idc)->first();
        $dataimg = array();
        if ($r->hasfile('attachment')) {
            $file=implode(",", $r->file('attachment'));
            foreach ($r->file('attachment') as $file) {
                $name=$file->getClientOriginalName();
                
                $names = str_replace(" ", "_", $name);
                $img=date('ymd').$names;
                $file->move('picture', $img);
                array_push($dataimg, $img);
            }
        }else{
            $img=null;
        }
        $pict = implode(",", $dataimg);
        $color = implode(",", $r->color);
        DB::table('products')->insert([
    		'product_name'=>$r->name,
    		'description'=>$r->description,
    		'price'=>$r->price,
    		'category_id'=>$cat->category_id,
            'sub'=>$idc,
    		'stock'=>$r->stock,
            'color'=>$color,
            'img'=>$pict
    	]);
      
        return redirect('/add_product');
    }
    function delete($id, $table)
    {
        if ($table=='products') {
           
            $count = DB::table('products')->where('product_id', $id)->first();
            $img = explode(',', $count->img);
            for($i=0; $i < count($img); $i++) {
                unlink('picture/'.$img[$i]);
            }
            $cek = DB::table('discount')->where('product_id', $id)->first();
            if (is_null($cek)) {
                 DB::table('products')->where('product_id', $id)->delete();
                return redirect('aproduct');
            }else{
                DB::table('products')->where('product_id', $id)->delete();
                DB::table('discount')->where('product_id', $id)->delete();
                return redirect('aproduct');
            }
            
        }elseif ($table=='category') {
            DB::table('category')->where('category_id', $id)->delete();
            $cat = DB::table('category')->where('category_id', $id)->first();
            return redirect('acategory');
        }elseif ($table=='sub_cat') {
            DB::table('sub_cat')->where('id', $id)->delete();
            return redirect('acategory');
        }elseif ($table=='discount') {
            DB::table('discount')->where('id', $id)->delete();
            return redirect('adiscount');
            
        }
    }
    function update_disc(Request $r)
    {
        $dat = $r->date;
        if ($dat==null) {
            DB::table('discount')->where('id', $r->product_id)->update([
            'discount'=>$r->discount
        ]);
            
        }else{
            DB::table('discount')->where('id', $r->product_id)->update([
            'discount'=>$r->discount,
            'date'=>$r->date
        ]);
           
        }
        return redirect('/adiscount');
    }
    function update_cat(Request $r)
    {
        DB::table('category')->where('category_id', $r->input('category_id'))->update([
            'category_name'=>$r->category
        ]);
        return redirect('/acategory');
    }
    function update_pro(Request $r)
    {
        DB::table('products')->where('product_id', $r->input('product_id'))->update([
            'category_name'=>$r->category
        ]);
        return redirect('/aproduct');
    }
    function inbox()
    {
        return view('admin', ['fragment'=>'admin/inbox', 'pm'=>$this->pesananmasuk()]);
    }
    function voucher()
    {
        $voucher=DB::table('voucher')->get();
        return view('admin', ['fragment'=>'admin/voucher', 'voucher'=>$voucher, 'pm'=>$this->pesananmasuk()]);
    }
}
