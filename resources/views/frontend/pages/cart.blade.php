@extends('frontend.layouts.master')

@section('maincontent')
    <section style="height: 100vh;" class="  bg-danger d-flex justify-content-center">
        <div class="card bg-transparent m-auto" style="width:50%">
            <div class="card-body text-center">
                <h1 class="card-title text-light">This is my cart</h1>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>Product Email</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $key => $cart)
                                @if ($cart->product)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $cart->product->name }}</td>
                                        <td>{{ $cart->product->email }}</td>
                                        <td>$100</td>
                                        <td>
                                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('user.checkout') }}" class="btn btn-success">Checkout</a>
                </div>
            </div>
        </div>
    </section>
@endsection
