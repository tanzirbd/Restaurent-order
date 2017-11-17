<?php

namespace App\Http\Controllers;

use App\Mainmenu;
use Illuminate\Http\Request;

class MainmenuController extends Controller
{
    public function index(){
        $mainmenus = Mainmenu::orderBy('id', 'dsc')->get();
        return view('admin.forms.mainmenu.mainmenu', ['mainmenus' => $mainmenus]);
    }

    public function saveMainmenuInfo(Request $request){
        $mainmenu = new Mainmenu();
        $mainmenu->mainmenu_name = $request->mainmenu_name;
        $mainmenu->mainmenu_description = $request->mainmenu_description;
        $mainmenu->mainmenu_publish_status = $request->mainmenu_publish_status;
        $mainmenu->save();

        return redirect('/forms/mainmenu')->with('messege', 'Your Menu Info Create Successfully');
    }

    public function unpublishMainmenuInfo($data){
        $mainmenuById = Mainmenu::find($data);
        $mainmenuById->mainmenu_publish_status = 2;
        $mainmenuById->save();

        return redirect('/forms/mainmenu')->with('messege', 'Your Menu Unpublish Successfully');
    }

    public function publishMainmenuInfo($data){
        $mainmenuById = Mainmenu::find($data);
        $mainmenuById->mainmenu_publish_status = 1;
        $mainmenuById->save();

        return redirect('/forms/mainmenu')->with('messege', 'Your Menu Publish Successfully');
    }

    public function editMainmenuInfo($data){
        $mainmenuById = Mainmenu::find($data);
        return view('admin.forms.mainmenu.mainmenu-edit', ['mainmenuById'=>$mainmenuById]);
    }

    public function  updateMainmenuInfo(Request $request){
        $mainmenu = Mainmenu::find($request->mainmenu_id);
        $mainmenu->mainmenu_name = $request->mainmenu_name;
        $mainmenu->mainmenu_description = $request->mainmenu_description;
        $mainmenu->mainmenu_publish_status = $request->mainmenu_publish_status;
        $mainmenu->save();

        return redirect('/forms/mainmenu')->with('messege', 'Your Menu Info Update Successfully');
    }

    public function deleteMainmenuInfo($data){
        $mainmenuById = Mainmenu::find($data);
        $mainmenuById->delete();

        return redirect('/forms/mainmenu')->with('messege', 'Your Menu Info Delete Successfully');
    }


}
