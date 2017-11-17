<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use App\SubImages;
use File;
use Image;
use DB;
use Storage;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public function index(){
        return view('admin.forms.product.product');
    }


    public function saveProductInfo(Request $request){

        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'admin/images/product-main-image/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)
            ->save($imageUrl);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->mainmenu_id = $request->mainmenu_id;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->product_price = $request->product_price;
        $product->product_price_off = $request->product_price_off;
        $product->product_new_price = $request->product_new_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_label = $request->product_label;
        $product->product_image = $imageUrl;
        $product->author_name = Auth::user()->name;
        $product->product_publish_status = $request->product_publish_status;
        $product->save();
        $productId = $product->id;

        $productSubImages = $request->file('product_sub_image');
        foreach ($productSubImages as $productSubImage) {
            $subImageName = $productSubImage->getClientOriginalName();
            $subDirectory = 'admin/images/product-sub-image/';
            $subImageUrl = $subDirectory.$subImageName;
            Image::make($productSubImage)
                ->save($subImageUrl);

            $subImage = new SubImages();
            $subImage->product_id = $productId;
            $subImage->product_sub_image = $subImageUrl;
            $subImage->save();
        }


        return redirect('/forms/product')->with('messege', 'Product Info Add Successfully');
    }

    public function manageProductInfo(){
        $products = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->select('products.*', 'mainmenus.mainmenu_name', 'categories.category_name', 'sub_categories.sub_category_name')
            ->orderBy('id', 'dsc')->get();
        return view('admin.forms.product.product-manage',['products'=>$products]);
    }

    public function unpublishProductInfo($data){
        $productById = Product::find($data);
        $productById -> product_publish_status = 2;
        $productById -> save();

        return redirect('/forms/product/product-manage')->with('messege', 'Product Unpublish Successfully');
    }

    public function publishProductInfo($data){
        $productById = Product::find($data);
        $productById -> product_publish_status = 1;
        $productById -> save();

        return redirect('/forms/product/product-manage')->with('messege', 'Product Publish Successfully');
    }

    public function deleteProductInfo($data ){
        $productById = Product::find($data);
        $productById->delete();

        return redirect('/forms/product/product-manage')->with('messege', 'Product Delete Successfully');
    }

    public function viewProductInfo($data){
        $productById = Product::find($data);
        $productById-> $productById = DB::table('products')
            ->join('mainmenus', 'products.mainmenu_id', '=', 'mainmenus.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->select('products.*', 'mainmenus.mainmenu_name', 'categories.category_name', 'sub_categories.sub_category_name')
            ->orderBy('id', 'dsc')->get();
        return view('admin.forms.product.product-view',['productById'=>$productById]);
    }

    public function editProductInfo($data){
        $productById = Product::find($data);
        return view('admin.forms.product.product-edit',['productById'=>$productById]);
    }




}
