<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\ReservationModel;
use Illuminate\Http\Request;
use DB;
use App\SubImages;
use App\Product;
use Cart;
use Session;
class TomatoController extends Controller{
    public function homeIndex(){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->get();

        return view('front.home.home',['products'=>$products]);
    }

    public function menu(){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->get();

        return view('front.menu.menu',['products'=>$products]);
    }
    public function about(){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->get();
        return view('front.about.about',['products'=>$products]);
    }

    public function shop(){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->paginate(6);

        $latestProducts = Product::where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->take(3)
            ->get();
        return view('front.shop.products',[
            'products'=>$products,
            'latestProducts'=>$latestProducts
        ]);
    }

    public function productDetails($id){

        $product = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'mainmenus.mainmenu_name', 'categories.category_name', 'sub_categories.sub_category_name', 'brands.brand_name')
            ->where('products.id',$id)
            ->first();

        $latestProducts = Product::where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->take(3)
            ->get();

        $subImages = SubImages::where('product_id', $id)->get();
        return view('front.shop.products-full-details',[
            'product'=>$product,
            'subImages'=>$subImages,
            'latestProducts'=>$latestProducts
        ]);
    }

    public function reservation(){
        return view('front.reservation.reservation');
    }

    public function makeReservation(Request $request){
        $reservation = new Reservation();

        $reservation->date = $request->date;
        $reservation->name = $request->name;
        $reservation->time = $request->time;
        $reservation->email = $request->email;
        $reservation->guests = $request->guests;
        $reservation->phone = $request->phone;
        $reservation->save();

        return redirect('/');
    }
}
