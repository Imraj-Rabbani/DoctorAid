@extends('admin.layouts.template')
@section('title')
Doctor Information
@endsection

@section('content')
<form action="{{route('savedoctorinfo')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-sm w-50 bg-light mt-6 shadow-lg rounded-4">
        <div class="mx-3 pb-2 pt-4 text-start">
            <label for="name" class="form-label mx-2">Doctor's Name</label>
            <input type="text" class="form-control" id="name" name="doc_name" placeholder="Name">
          </div>
        
          <div class="mx-3 py-2 text-start">
            <label for="number" class="form-label mx-2">Phone Number</label>
            <input type="text" class="form-control" id="number" name="phone_number" placeholder="Number">
          </div>
        
          <div class="mx-3 py-2 text-start">
            <label for="information" class="form-label mx-2">Additional Information</label>
            <textarea class="form-control" id="information" name="description" rows="3"></textarea>
          </div>
          <div class="mx-3 pt-4 text-start">
            <select class="form-select" name="specialty" aria-label="Default select example">
                <option selected>Specialty</option>
                @foreach ($specialties as $specialty)
                <option  value="{{$specialty}}">{{$specialty}}</option>
                @endforeach
                
              </select>
          </div>
          <div class="mx-3 py-4 text-start">
            <label for="image" class="form-label mx-2">Doctor's Photo</label>
            <input class="form-control" type="file" name="image" id="image">
          </div>
          <div class="col-sm-10 pt-2 pb-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<div style="height: 20vh"></div>

@endsection