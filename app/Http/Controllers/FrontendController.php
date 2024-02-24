<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmailJob;
use App\Mail\ContactMail;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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

    public function weatherCall()
    {
        $lat = 100;
        $lon = 98.5;
        $apiKey = env('WEATHER_KEY');
        $url = 'https://api.openweathermap.org/data/3.0/onecall?lat=' . $lat . '&lon=' . $lon . '&exclude=hourly&appid=' . $apiKey;
        // install http package 'composer require guzzlehttp/guzzle'
        $response = Http::get($url);
        dd($response);
        return view('frontend.pages.weather');
    }

    public function contactForm(Request $request)
    {
        // validation if needed
        $data = $request->all();
        dispatch(new SendContactEmailJob($data));
        return back()->with('success', 'Contact submitted');
    }
}
