@extends('user_template.layouts.template')
@section('title')
    Homepage
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
    <section class="pt-4">
        <div class="container px-lg-5 border">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('home/assets/doc_1.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Dr. Rafiq</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius excepturi corrupti
                        quo aut corporis, quidem exercitationem repellendus</p>
                    <a href="#" class="btn btn-primary">See More</a>
                </div>
            </div>
            <!-- Page Features-->

        </div>
    </section>
@endsection
