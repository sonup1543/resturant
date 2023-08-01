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
    $foodData = food::all();
    return view("admin.foodmenu", compact("foodData"));
  }

  public function uploadfood(Request $request){
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

  public function deleteFood(request $request){
    $foodData = food::find($request->id);
    if($foodData->delete()){
      return redirect()->back();
    }else{
      dd("error");
    }
  }

  public function updateFood(request $request){
    $foodData = food::find($request->id);
    return view("admin.menuupdate", compact("foodData"));
  }
  
  public function updateFoodData(request $request){
    $foodData = food::find($request->id);
    $foodData->title = $request->title;
    $foodData->price = $request->price;
    //$foodData->image = $request->image;
    if($request->image != null){
    $image = $request->image;
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('foodimage',$imagename);
    $foodData->image = $imagename;
    }
    $foodData->description = $request->description;
    if($foodData->save()){
      return redirect()->route('foodmenu')->with('message', 'Saved successfully');
    }else{
      return redirect()->back();
    }
    dd($foodData);
  }
}
