<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     // admin after login
     public function admin(){
        return view('admin.home');
    }

    // admin custome logout
    public function logout(){
        Auth()->logout();
        $notification = array('message'=>'You are logout out','alert_type'=>'success');
        return redirect()->route('admin.login')->with($notification);
    }
}
