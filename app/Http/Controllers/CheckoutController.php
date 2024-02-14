<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\CheckoutProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'zip' => 'nullable',
            'payment_method' => 'nullable',
        ]);

        $checkout = Checkout::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip' => $request->zip,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_method == 'reward' ? 'paid' : 'pending',
        ]);

        $carts = Cart::all(); // replace with session
        $totalPrice = 0;
        foreach ($carts as $key => $cart) {
            $product_id = $cart->product_id;
            // $qty = $cart->qty;
            $product = User::findOrFail($product_id); // find product exist or not
            $totalPrice += $product->price;
            // $totalPrice += $product->price * $qty;if qty exist
            CheckoutProduct::create([
                'checkout_id' => $checkout->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }
        $checkout->update([
            'to_pay' => $totalPrice
        ]);
        if ($request->payment_method == 'reqard') {
            // subtract the total price from user reward
            // $user = User::findOrFail(Auth::user()->id);
            // $user->update([
            //  'reward' => $user->reward - $totalPrice
            // ]);
        }
        // $checkout->to_pay = $totalPrice;
        // $checkout->update();
        if ($request->payment_status == 'paid') {
            return redirect(route('checkout.index')); // if already paid
        }
        if ($request->payment_method != 'cod')
            return redirect(route('checkout.index')); // redirect to payment page if not cod
        else
            return redirect(route('payment.index')); // redirect to payment page if cod
    }
}
