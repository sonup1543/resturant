<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\user;
use App\Models\food;
use App\Models\Chefs;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index(request $request){ 
        $user_id = Auth::id();      
        $data = food::all();
        $chefsdata = Chefs::all();
        $cartValue = Cart::where('user_id', $user_id)->count(); 
        return view('home', compact('data', 'chefsdata','cartValue'));
    }

    public function redirects(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.adminhome');
        }else{
            $user_id = Auth::id();
            $data = food::all();
            $chefsdata = Chefs::all();
            $cartValue = Cart::where('user_id', $user_id)->count(); 
            return view('home', compact('data','chefsdata','cartValue'));
        }
    }

}
