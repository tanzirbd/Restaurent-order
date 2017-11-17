<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller{
    public function addToCart(Request $request){

        $product = Product::find($request->product_id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_new_price,
            'qty' => $request->qty,
            'options'=>[
                'image' =>$product->product_image,
            ]

        ]);

        return redirect('/show-cart');
    }

    public function showCart(){
        return view('front.cart.show-cart');
    }

    public function deleteCartProduct($rowId){
        Cart::remove($rowId);
        return redirect('/show-cart');
    }

    public function updateCartProduct(Request $request){
        Cart::update($request->rowId, $request->qty);
        return redirect('/show-cart');
    }
}
