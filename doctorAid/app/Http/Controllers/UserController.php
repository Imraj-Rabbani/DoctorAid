<?php

namespace App\Http\Controllers;


use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function homepage()
    {
        $doctors = DB::table('doctors')->get();
        return view('user_template.homepage', ['doctors' => $doctors]);
    }

    public function profile()
    {

        // ====Fetching appointment_id, Schedule Information and Doctors name using Advanced joinclause ==== //
        // ====Using the select method so that appointment_id is given priority if there is a clash ==== //
        $user_appointments = DB::table('appointments')
        ->select('appointments.id as appointment_id','doc_schedules.*','doctors.name')
            ->join('doc_schedules', function (JoinClause $join) {
                $join->on('appointments.schedule_id', '=', 'doc_schedules.id')
                    ->where('appointments.user_id', '=', Auth::id());
            })
            ->join('doctors', 'doc_schedules.doc_id', '=', 'doctors.id')
            ->get();


        $user_reviews = DB::table('reviews')
            ->join('doctors', 'reviews.doc_id', '=', 'doctors.id')
            ->select('reviews.*', 'doctors.name')
            ->get();

        return view(
            'user_template.profile',
            ['user_appointments' => $user_appointments, 'user_reviews' => $user_reviews]
        );
    }
    public function docProfile($id)
    {
        // ====Fetching all the schedules of the logged in user, so that the booked appointment can be highlighted later==== //
        $user_id = Auth::id();
        $user_schedule = DB::table('appointments')->where('user_id',$user_id)->pluck('schedule_id');


        $doc_info = DB::table('doctors')->find($id);
        $doc_schedules = DB::table('doc_schedules')->where('doc_id', $id)->get();
        $doc_reviews = DB::table('reviews')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->select('reviews.*', 'users.name')
            ->get();


        return view(
            'user_template.doc_profile',
            ['doc_info' => $doc_info, 'doc_schedules' => $doc_schedules, 'doc_reviews' => $doc_reviews, 'user_schedule' => $user_schedule]
        );

    }

    public function specialtyWise($specialty)
    {
        $doctors = DB::table('doctors')
            ->where('specialty', $specialty)
            ->get();

        return view('user_template.specialty', ['doctors' => $doctors, 'specialty' => $specialty]);
    }

    public function bookAppointment(Request $request)
    {
        $user_id = Auth::id();
        DB::table('appointments')->insert([
            'user_id' => $user_id,
            'schedule_id' => $request->id,
        ]);

        DB::table('doc_schedules')
            ->where('id', $request->id)
            ->decrement('seat_left', 1);

        return redirect()->route('homepage')->with('message', 'Your appointment has been booked');
    }

    public function cancelAppointment(Request $request)
    {
        $schedule_id = DB::table('appointments')->where('id',$request->id)->value('schedule_id');
        
        DB::table('doc_schedules')->where('id', $schedule_id)->increment('seat_left', 1);

        // ==== Always do the logic first if any, then delete ==== //

        DB::table('appointments')->where('id', $request->id)->delete();

        return redirect()->route('homepage')->with('message', 'Your Appointment has been cancelled');
    }

    public function reviewSubmission(Request $request)
    {
        // ==== Validate the feedback given by the user==== //
        $request->validate([
            'feedback' => "required|string|max:255"
        ]);

        DB::table('reviews')->insert([
            'user_id' => Auth::id(),
            'doc_id' => $request->doc_id,
            'feedback' => $request->feedback,
        ]);
        return redirect()->route('homepage')->with('message', 'Your Feedback has been submitted to us');
    }
}