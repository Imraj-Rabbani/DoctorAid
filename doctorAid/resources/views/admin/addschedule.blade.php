@extends('admin.layouts.template')
@section('title')
Add Schedule
@endsection

@section('content')
<form action="{{route('insertschedule')}}" method="POST">
    @csrf
    <div class="container-sm w-50 bg-light mt-6 shadow-lg rounded-4">
        <div class="mx-3 pb-2 pt-4 text-start">
            <label for="name" class="form-label mx-2">Doctor's Name</label>
            <input type="text" class="form-control" id="name" name="doc_name" disabled value="{{$doc_name}}">
            <input type="hidden" name="id" value="{{$id}}">
          </div>
        
          <div class="mx-3 pt-4 text-start">
            <select class="form-select" name="day" aria-label="Default select example">
                <option selected>Choose day</option>
                <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
              </select>
          </div>
        
          <div class="mx-3 pb-2 pt-4 text-start">
            <label for="time" class="form-label mx-2">Time</label>
            <input type="text" class="form-control fw-light" id="time" name="time" placeholder="4-6">
          </div>

          <div class="mx-3 pb-2 pt-4 text-start">
            <label for="fees" class="form-label mx-2">Fees</label>
            <input type="text" class="form-control" id="fees" name="fees" placeholder="500">
          </div>
          
          
          
          <div class="col-sm-10 pt-2 pb-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<div style="height: 30vh"></div>

@endsection