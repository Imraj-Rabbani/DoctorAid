@extends('admin.layouts.template')
@section('title')
    Admin Dashboard
@endsection

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session()->get('message') }}
        </div>
    @endif

    @if (session()->has('deletemessage'))
        <div class="alert alert-danger mt-4">
            {{ session()->get('deletemessage') }}
        </div>
    @endif

    <section class="pt-4">
        <div class="container-fluid row pl-6 ">


                @foreach ($doctors as $doctor)
                    <div class="card col-3  m-4">
                        <img src="{{ asset($doctor->image) }}" style="width: 100%; height:auto; padding:0" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title">{{ $doctor->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $doctor->specialty }}</h6>
                            <p class="card-text">{{ $doctor->long_desc }}</p>
                            <p class="card-text">Phone Number: {{ $doctor->phone_number }}</p>
                            <a href="{{route('editinfo',$doctor->id)}}" class="btn btn-primary mx-2">Edit</a>
                            <a href="{{route('deleteinfo',$doctor->id)}}" class="btn btn-danger mx-2">Delete</a>
                        </div>

                    </div>
                @endforeach


        </div>


    </section>
@endsection
