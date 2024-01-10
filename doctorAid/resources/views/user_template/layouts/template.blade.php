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
    <div class="menu items-center  bg-white shadow text-center"  id="menu-bar">
        <div>All Routes</div>
        <ul class="list-group ">
            <div class="my-4 fw-bold">Can be accessed by User</div>
            <a class="list-group-item" href="{{route('homepage')}}">Homepage</a>
            <a class="list-group-item" href="{{route('docprofile',1)}}">Doctor's Profile</a>
            <a class="list-group-item" href="{{route('specialty',1)}}">Specialty Wise sort</a>
            <a class="list-group-item" href="{{route('profile')}}">User Dashboard</a>
            <div class="my-4 fw-bold">Can only be accessed by Admin</div>

            <a class="list-group-item" href="{{route('admindashboard')}}">Admin Dashboard</a>
            <a class="list-group-item" href="{{route('adddoctor')}}">Add Doctor</a>
            <a class="list-group-item" href="{{route('editinfo',1)}}">Edit Doctor's Info</a>
            <a class="list-group-item" href="{{route('allschedules')}}">All Schedules</a>
            <a class="list-group-item" href="{{route('addschedules',1)}}">Add A Schedule</a>
            
        </ul>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        
        <div class="container px-lg-5" id="nav-container">
            <div class="sidebar mx-4">
                <img id="toggle_icon" src="{{ asset('home/assets/toggle-icon.png') }}" style = "height: 20px">
                
            </div>
            <a class="navbar-brand" href="{{ route('homepage') }}">Doctor<span style="font-weight: bold">Aid</span></a>


            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="{{ route('homepage') }}">Home</a></li>
                    @php
                        $logged = Illuminate\Support\Facades\Auth::check();
                    @endphp
                    @if ($logged)
                        <li class="nav-item"><a class="nav-link active" href="{{ route('profile') }}">My Account</a>
                        </li>
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
