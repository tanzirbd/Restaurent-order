<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubImages;

use DB;
use Cart;
use Illuminate\Http\Request;

class PoloFrontController extends Controller{
    public function homeIndex(){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->get();

//        $subImages = SubImages::where('product_id','products.id')->get();

        return view('front.home.home',[
            'products'=>$products,
//            'subImages'=>$subImages
        ]);
    }

    public function productAjaxView($id){
        $product = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'mainmenus.mainmenu_name', 'categories.category_name', 'sub_categories.sub_category_name', 'brands.brand_name')
            ->where('products.id',$id)
            ->first();

        $subImages = SubImages::where('product_id', $id)->get();

        return view('front.product-ajax-view.product-ajax-view',[
            'product'=>$product,
            'subImages'=>$subImages
        ]);
    }

    public function productFullDetails($id){
        $product = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'mainmenus.mainmenu_name', 'categories.category_name', 'sub_categories.sub_category_name', 'brands.brand_name')
            ->where('products.id',$id)
            ->first();



        $subImages = SubImages::where('product_id', $id)->get();

        $latestProducts = Product::where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->take(3)
            ->get();

        return view('front.product-full-details.product-full-details',[
            'product'=>$product,
            'subImages'=>$subImages,
            'latestProducts'=>$latestProducts
        ]);
    }

    public function about(){
        return view('front.about.about');
    }

    public function aboutMember(){
        return view('front.about.about-member');
    }

    public function contactUs(){
        return view('front.contact.contact-us');
    }

    public function userLogin(){
        return view('front.user.user-login');
    }
    public function userRegister(){
        return view('front.user.user-register');
    }
    public function userPasswordRecovery(){
        return view('front.user.user-password-recovery');
    }
    public function aboutServices(){
        return view('front.about.about-services');
    }

    public function fourZeroPage(){
        return view('front.extra-page.404-page');
    }

    public function fiveZeroPage(){
        return view('front.extra-page.500-page');
    }
    public function pageFaqs(){
        return view('front.extra-page.faqs');
    }

    public function blogDetails(){
        return view('front.blog.blog-details');
    }

    public function menuProducts($id){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('mainmenu_id', $id)
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->paginate(9);

        $latestProducts = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('mainmenu_id', $id)
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->take(3)
            ->get();

        return view('front.products-show.products',[
            'products'=>$products,
            'latestProducts'=>$latestProducts,
        ]);
    }

    public function categoryProducts($id){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('category_id', $id)
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->paginate(9);

        $latestProducts = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('category_id', $id)
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->take(3)
            ->get();

        return view('front.products-show.products',[
            'products'=>$products,
            'latestProducts'=>$latestProducts,
        ]);
    }

    public function subCategoryProducts($id){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('sub_category_id', $id)
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->paginate(9);

        $latestProducts = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->select('products.*', 'mainmenus.mainmenu_name')
            ->where('sub_category_id', $id)
            ->where('product_publish_status', 1)
            ->orderBy('id', 'dsc')
            ->take(3)
            ->get();

        return view('front.products-show.products',[
            'products'=>$products,
            'latestProducts'=>$latestProducts,
        ]);
    }
}
