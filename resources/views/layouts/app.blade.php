<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/fcac1399ab.js" crossorigin="anonymous"></script>

    <title>@yield('title', 'Soft Drink')</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ asset('/img/logo.png') }}" alt=""
                        width="80" height="70" class=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                        </li>
                        <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                        @guest
                            <a href="{{ route('login') }}" class="nav-link active">Login</a>
                            <a href="{{ route('register') }}" class="nav-link active">Register</a>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('myaccount.orders') }}">My orders</a>
                            </li>
                            <form action="{{ route('logout') }}" id="logout" method="POST">
                                <a class="nav-link active" role="button"
                                    onclick="document.getElementById('logout').submit();">Logout</a>
                                @csrf
                            </form>
                        @endguest

                    </ul>
                    {{-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> --}}
                </div>
            </div>
        </nav>

    </div>
    <div class="container mh-100">
        @yield('content')
    </div>
    <div>
        <footer class="bg-dark  row mt-5 p-5 ">


            <p class="text-light text-center">Designed by P&G</p>


        </footer>
    </div>
</body>

</html>
