<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\user;
use App\Models\food;
use App\Models\Reservation;
use App\Models\Chefs;
use App\Models\Cart;
use App\Models\Order;


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
  }

  public function reservationQuery(request $request){
  // dd($request->name);
     $reservationSave = new Reservation;
     $reservationSave->name = $request->name;
     $reservationSave->email = $request->email;
     $reservationSave->phone = $request->phone;
     $reservationSave->numberguests = $request->numberguests;
     $reservationSave->date = $request->date;
     $reservationSave->time = $request->time;
     $reservationSave->message = $request->message;
     $reservationSave->status = 1;
     if($reservationSave->save()){
      return redirect()->back()->with('message', 'Saved successfully');
     }else{
      return redirect()->back()->with('message', 'Pleasr Try After Some Time');
     }

  }

  public function reservation(request $request){
    $reservationData = Reservation::all();
    return view("admin.reservation", compact('reservationData'));
  }

  public function chefs(request $request){
    $chefsdata = Chefs::all();
    return view("admin.chefs", compact('chefsdata'));
  }

  public function chefUpload(request $request){
    $chefsData = new Chefs;
    $chefsData->name = $request->name;
    $chefsData->speciallity = $request->speciallity;
    if($request->image != null){
      $image = $request->image;
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('chefs',$imagename);
      $chefsData->image = $imagename;
      }
    if($chefsData->save()){
      return redirect()->back()->with('message', 'Saved successfully');
    }else{
      return redirect()->back()->with('message', 'Try Again');
    }
  }

  public function chefDelete(request $request){
   $deletechef = Chefs::find($request->id);
   if($deletechef->delete()){
    return redirect()->back()->with('message', 'Delete successfully');
   }else{
    return redirect()->back()->with('message', 'Try Again');
   }
  }

  public function chefUpdate(request $request){
    $updatechef = Chefs::find($request->id);
    return view('admin.chefupdate', compact('updatechef'));
  }

  public function chefUpdateData(request $request){
    $chefsData = Chefs::find($request->id);
    $chefsData->name = $request->name;
    $chefsData->speciallity = $request->speciallity;
    if($request->image != null){
      $image = $request->image;
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('chefs',$imagename);
      $chefsData->image = $imagename;
      }
    if($chefsData->save()){
      return redirect()->route('chefs')->with('message', 'Saved successfully');
    }else{
      return redirect()->back()->with('message', 'Try Again');
    }
  }

  public function addCart(request $request){
    $cartItem = new Cart;
    $cartItem->user_id= Auth::id();
    $cartItem->food_id= $request->productid;
    $cartItem->quantity= $request->quantity;
    $cartItem->save();
    return redirect()->back();
  }

  public function cartHome(request $request){
     $user_id = Auth::id();     
     $cartValue = Cart::where('user_id', $user_id)->count(); 
    // $cartInfo = Cart::where('user_id', $user_id)->join('food', 'food.id','=','carts.food_id')->get();
   $cartInfo = Cart::where('user_id', $user_id)->get();
   $foodData = food::all();
     return view('cart', compact('cartInfo','cartValue','cartInfo','foodData'));
  }

  public function cartDelete(request $request){
    $cartdelte = Cart::find($request->id);
   if($cartdelte->delete()){
        return redirect()->back();
   }else{
        return redirect()->back();
   }
  }

  public function orderConform(request $request){
   // dd("hello");
    foreach($request->foodQuantity as $key=>$fquantity){
      $data = new Order;
      $data->foodname= $fquantity;
      $data->price= $request->foodprice[$key];
      $data->quantity= $request->foodQuantity[$key];
      $data->name= $request->name;
      $data->phone= $request->phone;
      $data->address= $request->address;
      $data->save();
    }
    return redirect()->back();
  }
  
  public function orderFetch(request $request){
    $orderdata = Order::all();
    return view('admin.order', compact('orderdata'));
  }


}
