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
                <div class="fs-3 mb-4"><span class="fw-bold">Specialty:</span> {{ $doc_info->specialty }}</div>
                <div class="fs-4 mb-4">{{ $doc_info->long_desc }}</div>
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
            @php
                $num = 0;
            @endphp
{{-- $user_schedule === $schedule->id --}}
            @foreach ($doc_schedules as $schedule)
                @php
                    $num++;
                @endphp
                @if (in_array($schedule->id,$user_schedule->toArray()))
                    <tr>
                        <td style="background-color: rgb(175,214,155)">{{ $schedule->day }}</td>
                        <td style="background-color: rgb(175,214,155)">{{ $schedule->time }} pm</td>
                        <td style="background-color: rgb(175,214,155)">{{ $schedule->seat_left }}</td>
                        <td style="background-color: rgb(175,214,155)">{{ $schedule->fees }}</td>
                        <td style="background-color: rgb(175,214,155)">
                            <button class="btn btn-primary" disabled>Already Booked</button>

                            {{-- <form action="{{ route('bookappointment') }}" id="form-submit" method="POST"
                                style="display: none;">
                                @csrf
                                <input type="hiddenu" name="id" value="{{ $schedule->id }}">
                            </form> --}}
                        </td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ $schedule->time }} pm</td>
                        <td>{{ $schedule->seat_left }}</td>
                        <td>{{ $schedule->fees }}</td>
                        <td>
                            <a href="{{ route('bookappointment') }}" class="btn btn-primary"
                                onclick="event.preventDefault();
                                    document.getElementById('form-submit-{{ $num }}').submit();">Book
                                Now</a>

                            <form action="{{ route('bookappointment') }}" id="form-submit-{{ $num }}"
                                method="POST"
                                style="display: none">
                                @csrf
                                <input type="hidden"
                                name="id" value="{{ $schedule->id }}">
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach


        </table>

        <div class="d-flex flex-column ">
            <h2 class="mt-4 text-decoration-underline">Your Feedback</h2>
            <form action="{{ route('submitreview') }}" method="POST" id="review-submit" class="my-4">
                @csrf
                <div class="form-floating">
                    <input type="hidden" name="doc_id" value="{{ $doc_info->id }}">
                    <textarea class="form-control" name="feedback" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Write your personal experience</label>
                </div>
            </form>
            <div class="d-flex flex-row-reverse mx-4">
                <a href="{{ route('submitreview') }}" class="btn btn-primary" style="width: 10%"
                    onclick="event.preventDefault();
                        document.getElementById('review-submit').submit();">Submit</a>
            </div>

        </div>
        <h2 class="mt-4 text-decoration-underline">Reviews</h2>
        @foreach ($doc_reviews as $review)
            <div class="mt-4">
                <h4>
                    {{ $review->name }}
                    <small class="text-body-secondary">said: </small>
                    </h3>
                    <p class="fs-5">{{ $review->feedback }}</p>
                    <hr>
            </div>
        @endforeach


    </div>
@endsection
