<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\user;
use App\Models\food;

class HomeController extends Controller
{
    public function index(){
        $data = food::all();
        return view('home', compact('data'));
    }

    public function redirects(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.adminhome');
        }else{
            $data = food::all();
            return view('home', compact('data'));
        }
    }

}
