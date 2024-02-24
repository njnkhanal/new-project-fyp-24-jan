@extends('frontend.layouts.master')

@section('maincontent')
    <section style="height: 100vh;" class=" bg-danger d-flex justify-content-center">
        <div class="card bg-transparent m-auto" style="width:50%">
            <div class="card-body text-center">
                <h1 class="card-title text-light">This is my homepage</h1>
                <h6 class="card-subtitle mb-2 text-muted text-light">Card subtitle</h6>
                <p class="card-text text-light">Some quick example text to build on the card title and make up
                    the
                    bulk of the
                    card's content.</p>

                <form action="{{ route('contact.submit') }}" method="post">
                    @csrf
                    <input type="text" name="first_name" placeholder="First Name">
                    <input type="text" name="last_name" placeholder="Last Name">
                    <button type="submit">Contact</button>
                </form>
            </div>
        </div>
    </section>
@endsection
