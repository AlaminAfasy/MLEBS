@extends('master')
@section('title')
Student |Changing Information
@endsection

@section('content')
  <form class="form-horozontal" action="{{route('update',$student->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Student ID:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="s_id" value="{{$student->s_id}}">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Student Name:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$student->name}}">
    </div>


    <div class="form-group">
      <label for="exampleFormControlFile1">Your Profile Picture</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Select Department</label>
    <select class="form-control" id="exampleFormControlSelect1" name="department">
      <option>JMC</option>
      <option>SWE</option>
      <option>MCT</option>

    </select>
  </div>

    <button type="submit" class="btn btn-primary">Update Student</button>
  </form>
@endsection
