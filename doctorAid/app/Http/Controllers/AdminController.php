<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


$GLOBALS['specialties'] =
    [
        'Cardiologist',
        'Neurologist',
        'Oncologist',
        'Pediatrician',
        'Dermatologist'
    ];
class AdminController extends Controller
{
    public function dashboard()
    {
        $doctors = DB::table('doctors')->get();
        return view('admin.dashboard', ['doctors' => $doctors]);
    }

    public function addDoctor()
    {
        global $specialties;
        return view('admin.doc_info', ['specialties' => $specialties]);
    }

    public function saveDoctor(Request $request)
    {
        // ==== Fetch the image from the form, create a unique id for the image then move it to the upload folder, where it will be stored==== //
        $image = $request->file('image');
        $img_name = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;
        // ==== Save the image url/path that leads to the image not the image itself ==== //


        DB::table('doctors')->insert([
            'name' => $request->doc_name,
            'long_desc' => $request->description,
            'phone_number' => $request->phone_number,
            'image' => $img_url,
            'specialty' => $request->specialty,
        ]);

        return redirect()->route('admindashboard')->with("message", "Doctor's Information Added Successfully!");

    }

    public function editInfo($id)
    {
        $doc_info = DB::table('doctors')->find($id);
        global $specialties;
        return view('admin.editinfo', ['doc_info' => $doc_info, 'specialties' => $specialties]);
    }

    public function updateDoctor(Request $request)
    {
        DB::table('doctors')
            ->where('id', $request->doc_id)
            ->update([
                'name' => $request->doc_name,
                'long_desc' => $request->description,
                'phone_number' => $request->phone_number,
                'specialty' => $request->specialty,
            ]);

        return redirect()->route('admindashboard')->with("message", "Doctor's Information Updated Successfully!");

    }

    public function deleteDoctor($id)
    {
        DB::table('doctors')
            ->where('id', $id)
            ->delete();

        return redirect()->route('admindashboard')->with("deletemessage", "Doctor's Information Deleted Successfully!");
    }

    

    public function allSchedules()
    {
        $doctors = DB::table('doctors')->get();
        return view('admin.all_schedules', ['doctors' => $doctors]);
    }

    public function addSchedules($id)
    {
        $doc_name = DB::table('doctors')->where('id',$id)->value('name');
        return view('admin.addschedule', ['id' => $id, 'doc_name' => $doc_name ]);
    }

    public function insertSchedule(Request $request)
    {
        DB::table('doc_schedules')->insert([
            'doc_id' => $request->id,
            'day' => $request->day,
            'time' => $request->time,
            'fees' => $request->fees,
        ]);
        return redirect()->route('allschedules')->with("message", "Doctor's Schedule Added Successfully!");
    }

    public function deleteSchedule($id)
    {
        DB::table('doc_schedules')
            ->where('doc_id', $id)
            ->delete();


        return redirect()->route('allschedules')->with("message", "Doctor's Schedule deleted Successfully!");
        
    }
}