<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
   public function index(){
    return view('home');
   }
   public function contactUs(){
    return view('contactus');
   }
   public function aboutUs(){
    return view('aboutus');
   }
   public function blog(){
    return view('home');
   }
}
