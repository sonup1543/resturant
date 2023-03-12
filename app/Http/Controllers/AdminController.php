<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

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
}
