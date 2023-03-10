<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\food;


class AdminController extends Controller
{
  public function user(){
    $data=user::all();
      return view("admin.user", compact("data"));
  }
  public function deleteuser($id){
    $data = user::find($id);
    $data->delete();
    return redirect()->back();
  }

  public function foodmenu(){
    return view("admin.foodmenu");
  }

  public function uploadfood(Request $request){
    //dd("hello");
    $data = new food;
    $image = $request->image;
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('foodimage',$imagename);
    $data->image = $imagename;
    $data->title = $request->title;
    $data->price = $request->price;
    $data->description = $request->description;
    $data->save();
    return redirect()->back();
   
  }
}
