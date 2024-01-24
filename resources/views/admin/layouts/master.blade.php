<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.header')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('body-content')
        </div>
    </main>
    @include('admin.layouts.footer')
</body>

</html>
