<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('user_template.register');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'requiredemail|unique:users',
            'password' => 'required',
        ]);
    }
    public function homepage()
    {
        $doctors = DB::table('doctors')->get();
        return view('user_template.homepage', ['doctors' => $doctors]);
    }

    public function docProfile($id)
    {
        $doc_info = DB::table('doctors')->find($id);
        $doc_schedules = DB::table('doc_schedules')->where('doc_id',$id)->get();
        return view('user_template.doc_profile', ['doc_info' => $doc_info, 'doc_schedules' => $doc_schedules]);

    }

    public function specialtyWise($specialty)
    {
        $doctors = DB::table('doctors')
            ->where('specialty', $specialty)
            ->get();

        return view('user_template.specialty', ['doctors' => $doctors, 'specialty' => $specialty]);
    }
}