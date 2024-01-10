<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('home/assets/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('home/css/app.css') }}">
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container px-lg-5">
            <span class="toggle_icon mx-4"><img src="{{ asset('home/assets/toggle-icon.png') }}"
                    style = "height: 20px"></span>
            <a class="navbar-brand" href="{{ route('homepage') }}">Doctor<span style="font-weight: bold">Aid</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="{{ route('homepage') }}">Home</a></li>
                    @php
                        $logged = Illuminate\Support\Facades\Auth::check();
                    @endphp
                    @if ($logged)
                        <li class="nav-item"><a class="nav-link active" href="#">My Account</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li class="nav-item"><a class="nav-link active" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('register') }}">Register</a></li>
                    @endif


                </ul>
            </div>
        </div>
    </nav>
    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- Header-->
    @yield('content')
    <!-- Footer-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('home/js/scripts.js') }}"></script>
</body>

</html>
