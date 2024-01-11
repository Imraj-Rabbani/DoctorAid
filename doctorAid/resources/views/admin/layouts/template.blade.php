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

    <div class="container-fluid">
        <div class="row ">
            <div class="col-2 border text-center shadow fixed" style="min-height: 100vh">
                <div class="mt-4 ">
                    <a class="fs-3 text-decoration-none" href="{{ route('homepage') }}">Doctor<span
                            class="fw-bold">Aid</span></a>
                </div>
                <div class="text-start fw-light pt-4 mx-4"> -- Menu</div>
                <div class="container">
                    <div class="item rounded mt-4 py-2">
                        <a href="{{ route('admindashboard') }}" class="text-decoration-none fw-semibold menu">Dashboard</a>
                    </div>
                    <div class="item rounded mt-4 py-2">
                        <a href="{{ route('adddoctor') }}" class="text-decoration-none fw-semibold menu">Add Doctor</a>
                    </div>
                    <div class="item rounded mt-4 py-2">
                        <a href="{{ route('allschedules') }}" class="text-decoration-none fw-semibold menu">All Schedules</a>
                    </div>
                </div>
            </div>
            <div class="col-10 text-center" style="background-color: #F0F8FF; margin-left:20%; width:80%">
                <input type="text" name="" id="" placeholder="Search..."
                    class="mt-4 px-4 col-10 fw-light border bg-light rounded shadow-lg" style="height: 50px">
                @yield('content')
            </div>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
