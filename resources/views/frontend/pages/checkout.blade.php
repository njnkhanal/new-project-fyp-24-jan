@extends('frontend.layouts.master')

@section('maincontent')
    <section style="height: 100vh;" class="  bg-danger d-flex justify-content-center">
        <div class="card bg-transparent m-auto" style="width:50%">
            <div class="card-body text-center">
                <h1 class="card-title text-light">Checkout now</h1>
                <div>
                    <form action="" method="post">
                        @csrf
                        {{-- for checkout --}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select name="payment_method" class="form-control" id="payment_method">
                                <option value="cod">Cash on delivery</option>
                                <option value="khalti">Pay with khalti</option>
                                <option value="reward">Pay with reward</option>
                            </select>
                        </div>
                        <button class="mt-3 btn btn-success" type="submit">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
