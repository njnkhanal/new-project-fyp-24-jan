<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark " style="background: rgb(142, 20, 94);">
            <div class="container">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-heart"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                    aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarID">
                    <div class="navbar-nav">
                        <a class="nav-link {{ Request::segment(1) ? '' : 'active' }}" aria-current="page"
                            href="{{ route('front.home') }}">Home</a>
                        <a class="nav-link {{ Request::segment(1) == 'list' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('front.list') }}">List</a>
                        <a class="nav-link {{ Request::segment(1) == 'about' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('front.about') }}">About</a>
                        <a class="nav-link {{ Request::segment(1) == 'cart' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('cart.index') }}">Cart</a>
                    </div>
                    <div class="ml-auto">
                        <ul class="navbar-nav">
                            @auth
                                <li><a href="{{ route('admin.dashboard') }}" class="nav-link">Admin Pannel</a></li>
                                <li><a href="javascript:void(0);" class="nav-link"
                                        onclick="document.getElementById('logoutForm').submit();">Logout</a></li>
                                <form action="{{ route('logout') }}" id="logoutForm" method="post">
                                    @csrf
                                </form>
                            @else
                                <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                                <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    @yield('maincontent')
</body>

</html>
