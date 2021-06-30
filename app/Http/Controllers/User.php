<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Shipping;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use file;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;
use Auth;
use \Crypt;

class User extends Controller
{
    public function __construct(){
        //update discount
         $product_date = DB::table('discount')->get();
         $now = date('Y-m-d H:i:s');
         foreach ($product_date as $key){
            if ($key->date<=$now){
                DB::table('discount')->where('id', $key->id)->delete();
            }
         }
    }

    public function history(){
        if (Auth::check()) {
            $proccess = DB::table('orders')->where('user_id', Auth::user()->id)->where('status', 1)->get();
            return $proccess;
        }else{
            $proccess=null;
            return $proccess;
        }
    }

    public function history_page(){
        $history = array();
        $barang = array();
        $goods = array();
        $data = DB::table('orders')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
     
        return view('user', ['fragment'=>'user/history', 'order'=>$data,'category'=>$this->catlist(), 'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
    }

    public function catlist()
    {
        $category = array();
        $c = DB::table('category')->get();
                foreach ($c as $key) {
                    $s = DB::table('sub_cat')->where('cat_id', $key->category_id)->get();
                    array_push($category, ['category_id'=>$key->category_id, 'category_name'=>$key->category_name, 'sub'=>$s]);
                }
        return $category;
    }

    public function wishlist()
    {
        if (Auth::check()) {
            $wishlist = DB::table('wishlist')->where('id_user', Auth::user()->id)->get();
            return $wishlist;
        }else{
            $wishlist=0;
            return $wishlist;
        }
    }

    public function rmvw($idd){
        $id = Crypt::decrypt($idd);
        DB::table('wishlist')->where('id_user', Auth::user()->id)->where('product_id', $id)->delete();
        return redirect()->back();
    }

    public function wishlist_page(){
        $wis = DB::table('wishlist')->join('products', 'wishlist.product_id', '=', 'products.product_id')->where('wishlist.id_user', Auth::user()->id)->get();
    
         return view('user', ['fragment'=>'user/wishlist', 'category'=>$this->catlist(),'wis'=>$wis,'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
    }

    public function updateuser(Request $r){
        if ($r->password!='') {
            DB::table('users')->where('id', Auth::user()->id)->update([
               'name'=>$r->name,
               'phone'=>$r->phone,
               'email'=>$r->email,
               'address'=>$r->address,
               'password'=>Hash::make($r->password)
            ]);
            return redirect()->back();
        }else{
            DB::table('users')->where('id', Auth::user()->id)->update([
                'name'=>$r->name,
                'phone'=>$r->phone,
                'email'=>$r->email,
                'address'=>$r->address,
            ]);
            return redirect()->back();
        }
        
    }

    public function setup(){
        $data = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('user', ['fragment'=>'user/user_setting', 'category'=>$this->catlist(),'user'=>$data,'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
    }

    public function home()
    {
        $na = DB::table('products')->orderBy('product_id', 'desc')->take(3)->get();
        $aside = DB::table('products')->orderBy('product_id', 'desc')->skip(1)->take(2)->get();
        $product = DB::table('products')->join('discount', 'products.product_id', '=', 'discount.product_id')->select('products.*', 'discount.*')->get();
                
    	return view('user', ['fragment'=>'user/home', 'category'=>$this->catlist(), 'na'=>$na,'product'=>$product, 'aside'=>$aside,'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
    }

    public function update_address(Request $r){
        DB::table('users')->where('id', Auth::user()->id)->update(['address'=>$r->address]);
        return redirect()->back();
    }

    public function addwishlist($id)
    {
        $id_p = Crypt::decrypt($id);
        $cek = DB::table('wishlist')->where('id_user', Auth::user()->id)->where('product_id', $id_p)->first();
        if ($cek) {
         return redirect()->back()->with(['wishadd'=>true]);
        }
        else{
           
           DB::table('wishlist')->insert([
                'id_user'=> Auth::user()->id,
                'product_id'=>$id_p,
            ]);
            return redirect()->back();
        }
    }

    public function product($cat=null)
    {

        $sub = null;
        $data = array();
        
        $sub = DB::table('sub_cat')->where('sub', $cat)->first();
        $cate = DB::table('category')->where('category_name', $cat)->first();
        if (!is_null($cate)) {
            $sb = DB::table('category')->rightJoin('sub_cat', 'sub_cat.cat_id', '=', 'category.category_id')->where('sub_cat.cat_id', $cate->category_id)->get();
            $product = DB::table('products')->leftJoin('discount', 'products.product_id', '=', 'discount.product_id')->select('products.product_id as product_id', 'products.product_name as product_name', 'products.description as description', 'products.price as price', 'products.stock as stock', 'products.color as color', 'products.img as img', 'discount.discount as discount', 'discount.date as date')->where('category_id', $cate->category_id)->orderBy('product_id','desc')->get();
                return view('user', ['fragment'=>'user/product', 'product'=>$product, 'catname'=>$cate->category_name,'cate'=>$sb, 'category'=>$this->catlist(), 'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
            
        }elseif (!is_null($sub)) {
            $c = DB::table('category')->where('category_id', $sub->cat_id)->first();
            $sb = DB::table('sub_cat')->where('cat_id', $sub->cat_id)->get();
            $product = DB::table('products')->leftJoin('discount', 'products.product_id', '=', 'discount.product_id')->select('products.product_id as product_id', 'products.product_name as product_name', 'products.description as description', 'products.price as price', 'products.stock as stock', 'products.color as color', 'products.img as img', 'discount.discount as discount', 'discount.date as date')->where('sub', $sub->id)->orderBy('product_id','desc')->get();
            return view('user', ['fragment'=>'user/product', 'product'=>$product, 'catname'=>$c->category_name, 'cate'=>$sb, 'category'=>$this->catlist(), 'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
        }elseif(is_null($cat)){
            
            $product = DB::table('products')->leftJoin('discount', 'products.product_id', '=', 'discount.product_id')->select('products.product_id as product_id', 'products.product_name as product_name', 'products.description as description', 'products.price as price', 'products.stock as stock', 'products.color as color', 'products.img as img', 'discount.discount as discount', 'discount.date as date')->orderBy('product_id','desc')->get();

            return view('user', ['fragment'=>'user/product', 'product'=>$product, 'catname'=>null,'cate'=>null, 'category'=>$this->catlist(), 'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
            
        }
    }

    public function details($id){
        
        $idd = Crypt::decrypt($id);
        $cek = DB::table('products')->where('product_id', $idd)->first();
        $data['sub'] = DB::table('sub_cat')->where('id', $cek->sub)->first();
        $data['cat'] = DB::table('category')->where('category_id', $cek->category_id)->first();
        $data['review'] = DB::table('review')->where('product_id', $idd)->get();
        $data['pro'] = DB::table('products')->where('product_id', $idd)->first();
        $data['discount'] = DB::table('discount')->where('product_id', $idd)->first();
        return view('user', ['fragment'=>'user/product-centered', 'category'=>$this->catlist(), 'history'=>$this->history(), 'wishlist'=>$this->wishlist()], $data);
    }

    public function cart(){
        return view('user', ['fragment'=>'user/cart', 'category'=>$this->catlist(), 'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
    }

    public function checkout(){
        $order = DB::table('orders')->join('note', 'note.invoice', '=', 'orders.invoice')->where('orders.user_id', Auth::user()->id)->first();
        return view('user', ['fragment' =>'user/checkout', 'category' => $this->catlist(), 'order'=>$order, 'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
    }

    // public function confirm_page(){
    //     $order = DB::table('orders')->join('note', 'note.invoice', '=', 'orders.invoice')->where('orders.user_id', Auth::user()->id)->first();
    //     return view('user', ['fragment' =>'user/confirm', 'category' => $this->catlist(), 'order'=>$order, 'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
    // }

    public function contacts(){
        return view('user', ['fragment'=>'user/contact', 'category'=>$this->catlist(), 'history'=>$this->history(), 'wishlist'=>$this->wishlist()]);
    }
    public function search(Request $r){
        if ($r->get('query')) {
            $query = $r->get('query');
            $data = DB::table('products')->where('product_name', 'LIKE', '%'.$query.'%')->get();
            $url = url('details');
            $img = asset('picture');
            $output = '<ul class="menu" style="display:block; with:auto;">';
            foreach ($data as $key=>$value ) {
                $gmbr = explode(',', $value->img);
                $id = Crypt::encrypt($value->product_id);
                $output .= '<li class="megamenu-container"><a style="text-align:left; font-size:10px" href="'.$url.'/'.$id.'"><img style="width:50px;" src="'.$img.'/'.$gmbr[0].'">'.$value->product_name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
            //return response()->json($data);
        }
    }
    public function forget(){
        
         echo count($this->history());
      //session()->forget('cart');
       
    }
}
