@extends('admin.layouts.template')
@section('title')
Edit Information
@endsection

@section('content')
<form action="{{route('updateinfo')}}" method="POST">
    @csrf
    <div class="container-sm w-50 bg-light mt-6 shadow-lg rounded-4">
        <div class="mx-3 pb-2 pt-4 text-start">
            <label for="name" class="form-label mx-2">Doctor's Name</label>
            <input type="hidden" name="doc_id" value="{{$doc_info->id}}">
            <input type="text" class="form-control" id="name" name="doc_name" value="{{$doc_info->name}}" >
          </div>
        
          <div class="mx-3 py-2 text-start">
            <label for="number" class="form-label mx-2">Phone Number</label>
            <input type="text" class="form-control" id="number" name="phone_number" value="{{$doc_info->phone_number}}" >
          </div>
        
          <div class="mx-3 py-2 text-start">
            <label for="information" class="form-label mx-2">Additional Information</label>
            <textarea class="form-control" id="information" name="description" rows="3">{{$doc_info->long_desc}}</textarea>
          </div>
          <div class="mx-3 pt-4 text-start">
            <select class="form-select" name="specialty" aria-label="Default select example">
                <option selected>{{$doc_info->specialty}}</option>
                @foreach ($specialties as $specialty)
                <option  value="{{$specialty}}">{{$specialty}}</option>
                @endforeach
                
              </select>
          </div>
          <div class="col-sm-10 pt-2 pb-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
<div style="height: 30vh"></div>

@endsection