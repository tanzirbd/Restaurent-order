<?php

namespace App\Http\Controllers;

use App\SubCategory;
use DB;

use Illuminate\Http\Request;

class SubCategoryController extends Controller{

    public function index(){
        $subCategories = DB::table('sub_categories')
            ->join('mainmenus', 'sub_categories.mainmenu_id', '=', 'mainmenus.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('sub_categories.*', 'mainmenus.mainmenu_name', 'categories.category_name')
            ->orderBy('id', 'dsc')->get();
        return view('admin.forms.sub-category.sub-category',['subCategories'=>$subCategories]);
    }

    public function saveSubCategoryInfo(Request $request){
        $subCategory = new SubCategory();
        $subCategory->sub_category_name = $request->sub_category_name;
        $subCategory->sub_category_description = $request->sub_category_description;
        $subCategory->mainmenu_id = $request->mainmenu_id;
        $subCategory->category_id = $request->category_id;
        $subCategory->sub_category_publish_status = $request->sub_category_publish_status;
        $subCategory->save();

        return redirect('/forms/sub-category')->with('messege', 'Sub Category Info Add Successfully');
    }

    public function unpublishSubCategoryInfo($data){
        $subCategoryById = SubCategory::find($data);
        $subCategoryById -> sub_category_publish_status = 2;
        $subCategoryById -> save();

        return redirect('/forms/sub-category')->with('messege', 'Sub Category Unpublish Successfully');
    }

    public function publishSubCategoryInfo($data){
        $subCategoryById = SubCategory::find($data);
        $subCategoryById -> sub_category_publish_status = 1;
        $subCategoryById -> save();

        return redirect('/forms/sub-category')->with('messege', 'Sub Category Publish Successfully');
    }

    public function editSubCategoryInfo($data){
        $subCategoryById = SubCategory::find($data);
        return view('admin.forms.sub-category.sub-category-edit', ['subCategoryById'=>$subCategoryById]);
    }

    public function updateSubCategoryInfo(Request $request){
        $subCategory = SubCategory::find($request->sub_category_id);
        $subCategory->sub_category_name = $request->sub_category_name;
        $subCategory->sub_category_description = $request->sub_category_description;
        $subCategory->mainmenu_id = $request->mainmenu_id;
        $subCategory->category_id = $request->category_id;
        $subCategory->sub_category_publish_status = $request->sub_category_publish_status;
        $subCategory->save();

        return redirect('/forms/sub-category')->with('messege', 'Sub Category Update Successfully');
    }

    public function deleteSubCategoryInfo($data){
        $subCategoryById = SubCategory::find($data);
        $subCategoryById->delete();

        return redirect('/forms/sub-category')->with('messege', 'Sub Category Delete Successfully');
    }
}
