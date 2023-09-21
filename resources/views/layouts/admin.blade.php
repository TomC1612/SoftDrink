<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/fcac1399ab.js" crossorigin="anonymous"></script>
    <title>@yield('title', 'Soft Drink')</title>
</head>

<body>

    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="{{ route('admin.home.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                        aria-current="true">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                    </a>




                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>


                    <a href="{{ route('admin.product.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fa-solid fa-bottle-droplet fa-fw me-3"></i><span>Product</span></a>
                    <a href="{{ route('admin.user.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-users fa-fw me-3"></i><span>Users</span></a>

                </div>
            </div>
        </nav>

    </header>
    <div class="container mt-5">

        @yield('content')
    </div>



</body>
@yield('script')

</html>
