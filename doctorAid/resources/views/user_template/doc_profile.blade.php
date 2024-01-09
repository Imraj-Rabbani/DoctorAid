@extends('user_template.layouts.template')
@section('title')
    Doctor's Profile
@endsection

@section('content')
    <div class="container w-75">
        <div class="row">
            <div class="card col-3  m-4 shadow">
                <img src="{{ asset($doc_info->image) }}" style="width: 100%; height:auto; padding:0" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $doc_info->name }}</h5>
                </div>
            </div>
            <div class="container d-flex flex-column justify-content-end col-6">
                <div class="fs-3 mb-4"><span class="fw-bold">Specialty:</span> {{$doc_info->specialty}}</div>
                <div class="fs-4 mb-4">{{$doc_info->long_desc}}</div>
            </div>
        </div>

        <table class="table table-striped table-hover table-bordered text-center mt-4 rounded">
            <tr>
                <th>Day</th>
                <th>Time</th>
                <th>Seat(s) Left</th>
                <th>Fees</th>
                <th>Action</th>
            </tr>

            @foreach ($doc_schedules as $schedule)
                <tr>
                    <td>{{ $schedule->day }}</td>
                    <td>{{ $schedule->time }} pm</td>
                    <td>{{ $schedule->seat_left }}</td>
                    <td>{{ $schedule->fees }}</td>
                    <td>
                        <a href="{{ route('bookappointment', $doc_info->id) }}" class="btn btn-primary">Book Now</a>
                    </td>
                </tr>
            @endforeach


        </table>

        <div>
            <h2>Reviews</h2>
        </div>

    </div>
@endsection
