<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function homepage(){
        $doctors = DB::table('doctors')->get();
        return view('user_template.homepage',['doctors' => $doctors]);
    }

    public function docProfile($id){
        $doc_info = DB::table('doctors')->find($id);
        
    }

    public function specialtyWise($specialty){
        $doctors = DB::table('doctors')
                        ->where('specialty',$specialty)
                        ->get();
        
        return view('user_template.specialty',['doctors' => $doctors, 'specialty'=>$specialty]);
    }
}
