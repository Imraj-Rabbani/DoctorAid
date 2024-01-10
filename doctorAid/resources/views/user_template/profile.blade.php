@extends('user_template.layouts.template')
@section('title')
    Doctor's Profile
@endsection

@section('content')
    <div class="container w-75 ">
        <h2 class="mt-4 text-decoration-underline" style="margin-left: 35%">Your Appointments</h2>


        <table class="table table-hover table-bordered text-center mt-4 rounded shadow">
            <tr>
                <th class="bg-dark-subtle text-emphasis-dark">Doctor</th>
                <th class="bg-dark-subtle text-emphasis-dark">Day</th>
                <th class="bg-dark-subtle text-emphasis-dark">Time</th>
                <th class="bg-dark-subtle text-emphasis-dark">Action</th>
            </tr>

            @foreach ($user_appointments as $appointment)
                <tr>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->day }}</td>
                    <td>{{ $appointment->time }} pm</td>
                    <td>
                        <a href="{{ route('cancelappointment', $appointment->appointment_id) }}" class="btn btn-warning"
                            onclick="event.preventDefault();
                                document.getElementById('cancel-appointment').submit();">
                            Cancel Appointment</a>

                        <form action="{{ route('cancelappointment') }}" id="cancel-appointment" method="POST"
                            style="display: none;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $appointment->appointment_id }}">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <h2 class="mt-4 text-decoration-underline" style="margin-left: 40%">Your Reviews</h2>

        <div class="container border rounded shadow">
            @foreach ($user_reviews as $review)
                <div class="mt-4">
                    <h4>
                        On {{ $review->name }}
                        <small class="text-body-secondary">you said: </small>
                        </h3>
                        <p class="fs-5">{{ $review->feedback }}</p>
                        <hr>
                </div>
        @endforeach
    </div>


    </div>
@endsection
