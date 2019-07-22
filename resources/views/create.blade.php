@extends('master')
@section('title')
Student |New Insertion
@endsection
@section('content')
  <form class="form-horozontal" action="{{route('store')}}" method="post" enctype="multipart/form-data">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </ul>
      </div>
    @endif
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Student ID:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="s_id" placeholder="Enter Student Name">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Student Name:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Student Name">
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

    <button type="submit" class="btn btn-primary">Register Student</button>
  </form>
@endsection
