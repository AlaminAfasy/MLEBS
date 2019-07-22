<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class FrontendController extends Controller
{
  function index(){
    return view('welcome');
  }
  function adminDashboard(){
    $all_users= User::all();

    return view('adminDashboard',compact('all_users'));
    
  }

}
