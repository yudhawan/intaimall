<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use file;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Product;
use Crypt;
use Auth;
class Shipping extends Controller
{
    
    public function __construct(){
       
    }
    
    public function add_to_basket(Request $r){
        $product = DB::table('products')->where('product_id', $r->input('id'))->first();
        $cart = session()->get('cart');
        if(!$cart){
            $cart[$r->input('id')] = [
                    "id" => $product->product_id,
                    "name" => $product->product_name,
                    "img" => $product->img,
                    "color" => $r->color,
                    "quantity" => 1,
                    "price" => $product->price,
                    "img" => $product->img
            ];
            session()->put('cart', $cart);
            return redirect('product');
        }

        if(isset($cart[$r->input('id')])){
            $cart[$r->input('id')]['quantity']++;
            session()->put('cart', $cart);
            return redirect('product');
        }
        $cart[$r->input('id')] = [
            "id" => $product->product_id,
            "name" => $product->product_name,
            "img" => $product->img,
            "color" => $r->color,
            "quantity" => 1,
            "price" => $product->price,
            "img" => $product->img
        ];
        session()->put('cart', $cart);
        return redirect('product');
    }
    public function add($idd){
        $id = Crypt::decrypt($idd);
    	$product = DB::table('products')->where('product_id', $id)->first();
        $warna = explode(",", $product->color);
        $cart =  session()->get('cart');
        if(!$cart){
            $cart[$id] = [
                    "id" => $product->product_id,
                    "name" => $product->product_name,
                    "img" => $product->img,
                    "color" => $warna[0],
                    "quantity" => 1,
                    "price" => $product->price,
                    "img" => $product->img
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('added', 'The item has been added');
        }

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('added', 'The quantity has been added');
        }
        $cart[$id] = [
            "id" => $product->product_id,
            "name" => $product->product_name,
            "img" => $product->img,
            "color" => $warna[0],
            "quantity" => 1,
            "price" => $product->price,
            "img" => $product->img
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('added', 'The item has been added');

    }

    public function remove($id){
        $idd = Crypt::decrypt($id);
        $cart = session()->get('cart');
        if (isset($cart[$idd])) {
           unset($cart[$idd]);
           session()->put('cart', $cart);
        }
        return redirect()->back()->with('remove', 'The item has been removed');
    }
    public function update(Request $r){
        
        for($i=0; $i < count($r->quantity); $i++){
            $cart = session()->get('cart');
            $cart[$r->id[$i]]['quantity']=$r->quantity[$i];
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('update', 'The item has been updated');
    }

    public function proccess_checkout(Request $request){
        
        //total
        $total = 0;
        foreach(session('cart') as $id => $key){
            $total += $key['price']*$key['quantity'];
        } 
        //product
        $dat = [];
        foreach (session('cart') as $a => $brng) {
            array_push($dat, $brng['name']);
        }
        $product = implode(',', $dat);
        //decrement product
        foreach (session('cart') as $a =>$prodd ) {
            $barang = DB::table('products')->where('product_id', $prodd['id']);
            $diambil = $barang->first()->stock-$prodd['quantity'];
            $barang->update(['stock'=>$diambil]);
        }
        //create invoice
        $invoice = "INV".date('md').substr(Auth::user()->name,0,1).rand(3,99).Auth::user()->id;
        $cek = DB::table('orders')->where('invoice', $invoice)->first();
        if (!is_null($cek)) {
            $invoicenew = "INV".date('md').substr(Auth::user()->name,0,1).rand(3,99).Auth::user()->id;
            DB::table('orders')->insert([
                'invoice' =>$invoicenew,
                'user_id' => Auth::user()->id,
                'product' => $product,
                'phone' => Auth::user()->phone,
                'total' => $total,
                'order_time' => date('Y-m-d'),
                'status' => 1
            ]);
            DB::table('note')->insert([
                'invoice' => $invoicenew,
                'text' => $request->note,
                'date' => date('Y-m-d')
            ]);
            $this->forget();
            return redirect('checkout');
        }else{
            DB::table('orders')->insert([
                'invoice' =>$invoice,
                'user_id' => Auth::user()->id,
                'product' => $product,
                'phone' => Auth::user()->phone,
                'total' => $total,
                'order_time' => date('Y-m-d'),
                'status' => 1
            ]);
            DB::table('note')->insert([
                'invoice' => $invoice,
                'text' => $request->note,
                'date' => date('Y-m-d')
            ]);
            $this->forget();
            return redirect('checkout');
        }

    }
   
    public function forget(){
        session()->forget('cart');    
        
    }
}
