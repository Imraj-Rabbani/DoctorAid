<?php

namespace App\Http\Controllers;


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

    public function docProfile($id)
    {
        $doc_info = DB::table('doctors')->find($id);
        $doc_schedules = DB::table('doc_schedules')->where('doc_id',$id)->get();
        $doc_reviews = DB::table('reviews')
                        ->join('users','reviews.user_id','=','users.id')
                        ->select('reviews.*','users.name')
                        ->get();
        
        
        return view('user_template.doc_profile', 
        ['doc_info' => $doc_info, 'doc_schedules' => $doc_schedules, 'doc_reviews'=> $doc_reviews]);

    }

    public function specialtyWise($specialty)
    {
        $doctors = DB::table('doctors')
            ->where('specialty', $specialty)
            ->get();

        return view('user_template.specialty', ['doctors' => $doctors, 'specialty' => $specialty]);
    }

    public function bookAppointment(Request $request){
        $user_id = Auth::id();
        DB::table('appointments')->insert([
            'user_id' => $user_id,
            'schedule_id' => $request->id,
            
        ]);

        DB::table('doc_schedules')
            ->where('id',$request->id)
            ->decrement('seat_left',1);

        return redirect()->route('homepage')->with('message','Your appointment has been booked');
    }

    public function reviewSubmission(Request $request){
        $request->validate([
            'feedback' => "required|string|max:255"
        ]);

        DB::table('reviews')->insert([
            'user_id' => Auth::id(),
            'doc_id' => $request->doc_id,
            'feedback' => $request->feedback,
        ]);
        return redirect()->route('homepage')->with('message','Your Feedback has been submitted to us');


    }
}