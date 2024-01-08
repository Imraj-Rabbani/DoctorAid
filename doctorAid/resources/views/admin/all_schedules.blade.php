@extends('admin.layouts.template')
@section('title')
    All Schedules
@endsection

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="container-fluid" >
        @foreach ($doctors as $doctor)
        <div class="row">
            <div class="card col-3  m-4">
                <img src="{{ asset($doctor->image) }}" style="width: 100%; height:auto; padding:0" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $doctor->name }}</h5>
                </div>
            </div>
            <div class="col-2 text-start" style="padding-top: 25%">
                <a class="btn btn-primary " href="{{route('addschedules',$doctor->id)}}">Add Another Schedule</a>
            </div>
        </div>
            @php

                $all_schedules = Illuminate\Support\Facades\DB::table('doc_schedules')->where('doc_id', $doctor->id)->get();

            @endphp
            <table class="table table-striped mt-4" >
                <tr>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Seat Left</th>
                    <th>Fees</th>
                    <th>Action</th>
                </tr>
                @foreach ($all_schedules as $schedule)
                <tr>
                    <td>{{$schedule->day}}</td>
                    <td>{{$schedule->time}} pm</td>
                    <td>{{$schedule->seat_left}}</td>
                    <td>{{$schedule->fees}}</td>
                    <td>
                        <a href="{{route('deleteschedule',$doctor->id)}}" class="btn btn-warning">Delete</a>
                    </td>
                </tr>
                @endforeach
                
            
            </table>
        @endforeach

    </div>
@endsection
