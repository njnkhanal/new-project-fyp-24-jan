<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.pages.home');
    }

    public function about(){
        return view('frontend.pages.about');
    }

    public function list(){
        return view('frontend.pages.list');
    }
}
