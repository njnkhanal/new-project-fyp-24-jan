@extends('frontend.layouts.master')

@section('maincontent')
    <section style="height: 100vh;" class="  bg-danger d-flex justify-content-center">
        <div class="card bg-transparent m-auto" style="width:50%">
            <div class="card-body text-center">
                <h1 class="card-title text-light">This is my List page</h1>
                <div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4">
                                <div class="card" style="width:18rem;">
                                    <img src="" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted ">{{ $product->email }}</h6>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="number" value="{{ $product->id }}" name="product"
                                                class="d-none" />
                                            <button class="btn btn-info" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
