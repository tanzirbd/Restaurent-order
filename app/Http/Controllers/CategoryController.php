<?php

namespace App\Http\Controllers;
use App\Category;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller{

    public function index(){
        //$categories = Category::all();
//        SELECT *, (SELECT mainmenu_name FROM mainmenus WHERE id=products.`mainmenu_id`) AS mainmenu_name, (SELECT category_name FROM categories WHERE id=products.`category_id`) AS category_name,(SELECT sub_category_name FROM sub_categories WHERE id=products.`sub_category_id`) AS sub_category_name, (SELECT brand_name FROM brands WHERE id=products.`brand_id`) AS brand_name FROM products
//        $categories = DB::raw("SELECT *, (SELECT mainmenu_name FROM mainmenus WHERE id=categories.`id`) AS brand_name FROM categories ") ;
//        $categories = Category::orderBy('id', 'dsc')->get();
        $categories = DB::table('categories')
            ->join('mainmenus', 'categories.mainmenu_id', '=', 'mainmenus.id')
            ->select('categories.*', 'mainmenus.mainmenu_name')
            ->orderBy('id', 'dsc')->get();

        return view('admin.forms.category.category', ['categories'=>$categories,]);
    }

    public function done(Task $task){ 
        if($task->done){ $task->done = false; 
            $task->done_at = null; 
        }else{ 
            $task->done = true; 
            $task->done_at = Carbon::parse(Carbon::now()); 
        } $task->save(); return back(); 
    }

    public function saveCategoryInfo(Request $request){
        //return $request->all();
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->mainmenu_id = $request->mainmenu_id;
        $category->category_publish_status = $request->category_publish_status;
        $category->save();

        return redirect('/forms/category')->with('messege', 'Category Info Add Successfully');
    }

    public function unpublishCategoryInfo($data){
        $categoryById = Category::find($data);
        $categoryById -> category_publish_status = 2;
        $categoryById -> save();

        return redirect('/forms/category')->with('messege', 'Category Unpublish Successfully');
    }

    public function publishCategoryInfo($data){
        $categoryById = Category::find($data);
        $categoryById -> category_publish_status = 1;
        $categoryById -> save();

        return redirect('/forms/category')->with('messege', 'Category Publish Successfully');
    }

    public function editCategoryInfo($data){
        $categoryById = Category::find($data);
        return view('admin.forms.category.category-edit', ['categoryById'=>$categoryById,]);
    }

    public function updateCategoryInfo(Request $request){
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->mainmenu_id = $request->mainmenu_id;
        $category->category_publish_status = $request->category_publish_status;
        $category->save();

        return redirect('/forms/category')->with('messege', 'Category Update Successfully');
    }

    public function deleteCategoryInfo($data){
        $categoryById = Category::find($data);
        $categoryById->delete();
        return redirect('/forms/category')->with('messege', 'Category Delete Successfully');
    }
}
