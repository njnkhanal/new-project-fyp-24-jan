<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function list()
    {
        $products = User::all();
        return view('frontend.pages.list', compact('products'));
    }

    public function checkout()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('frontend.pages.checkout', compact('carts'));
    }
}
