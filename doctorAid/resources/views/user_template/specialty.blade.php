@extends('user_template.layouts.template')
@section('title')
    Specialty Wise
@endsection

@section('content')
    <header class="py-5">
        <div class="container px-lg-5 ">
            <div class="p-4 p-lg-5 rounded-3 background">
                <div class="m-4 m-lg-5">

                </div>
            </div>
        </div>
    </header>
    <!-- Page Content-->
    <div class="container-fluid text-center fw-bold fs-3">Book appointments with ease. Anytime, anywhere.</div>
    <div class="container-fluid">
        <div class="row justify-content-end mr-2">
            <div class="row justify-content-end mr-4 mb-2">Search By specialty</div>
            <select class="form-select shadow" id="redirect" style="width: 20%">
                
                <option selected>{{ $specialty }}</option>

                @php
                    $specialities = ['Cardiologist', 'Neurologist', 'Oncologist', 'Pediatrician', 'Dermatologist'];
                @endphp

                @foreach ($specialities as $specialist)
                    <option value="{{ route('specialty', $specialist) }}">{{ $specialist }}</option>
                @endforeach



            </select>
        </div>
    </div>
    <section class="pt-4 ">
        <div class="container-fluid row pl-8 ">


            @foreach ($doctors as $doctor)
                <div class="card col-3  m-4">
                    <img src="{{ asset($doctor->image) }}" style="width: 100%; height:auto; padding:0" class="card-img-top"
                        alt="...">

                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $doctor->specialty }}</h6>
                        <p class="card-text">{{ $doctor->long_desc }}</p>
                        <a href="{{ route('docprofile', $doctor->id) }}" class="btn btn-primary mt-2">See More</a>

                    </div>

                </div>
            @endforeach


        </div>


    </section>
@endsection
