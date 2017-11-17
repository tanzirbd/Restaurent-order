<?php

namespace App\Http\Controllers;

use App\Brand;
use Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{


    public function index(){
        //$categories = Category::all();
        $brands = Brand::orderBy('id', 'dsc')->get();
        return view('admin.forms.brand.brand', ['brands'=>$brands]);
    }

    public function saveBrandInfo(Request $request){
        $brandImage = $request->file('brand_logo');
        $imageName = $brandImage->getClientOriginalName();
        $directory= 'admin/images/brand-images/';
        $brandUrl = $directory.$imageName;
        Image::make($brandImage)->insert('admin/images/watermark/logo.png', 'center')->save($brandUrl);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->brand_publish_status = $request->brand_publish_status;
        $brand->brand_logo = $brandUrl;
        $brand->save();

        return redirect('/forms/brand')->with('messege', 'Brand Info Add Successfully');
    }

    public function unpublishBrandInfo($data){
        $brandById = Brand::find($data);
        $brandById -> brand_publish_status = 2;
        $brandById -> save();

        return redirect('/forms/brand')->with('messege', 'Brand Unpublish Successfully');
    }

    public function publishBrandInfo($data){
        $brandById = Brand::find($data);
        $brandById -> brand_publish_status = 1;
        $brandById -> save();

        return redirect('/forms/brand')->with('messege', 'Brand Publish Successfully');
    }

    public function editBrandInfo($data){
        $brandById = Brand::find($data);
        return view('admin.forms.brand.brand-edit', ['brandById'=>$brandById]);
    }

    public function updateBrandInfo(Request $request){
        $brand = Brand::find($request->category_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->brand_publish_status = $request->brand_publish_status;
        $brand->save();

        return redirect('/forms/brand')->with('messege', 'Brand Update Successfully');
    }

    public function deleteBrandInfo($data){
        $brandById = Brand::find($data);
        $brandById->delete();
        return redirect('/forms/brand')->with('messege', 'Brand Delete Successfully');
    }


}
