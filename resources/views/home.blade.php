@extends('layouts.app')
@section('navs')
@if(Auth::user()->role=="admin"&&Auth::user()->status=="valid")

<li class="nav-item active">
  <a class="nav-link" href="{{ url('/adminDashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="{{ url('/student')}}">Student <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="{{ url('/teacher')}}">Teacher <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="{{ url('/equipment')}}">Equipment <span class="sr-only">(current)</span></a>
</li>
@endif

@if(Auth::user()->role=="student"&&Auth::user()->status=="valid")
<li class="nav-item active">
  <a class="nav-link" href="{{ url('/student')}}">Dashboard <span class="sr-only">(current)</span></a>
</li>
@endif
@if(Auth::user()->role=="teacher"&&Auth::user()->status=="valid")
<li class="nav-item active">
  <a class="nav-link" href="{{ url('/student')}}">Dashboard <span class="sr-only">(current)</span></a>
</li>
@endif
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->role!="admin"&&Auth::user()->role!="student"&&Auth::user()->role!="teacher"&&Auth::user()->status!="valid")
                    <form class="form-horozontal" action="{{route('set_role',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
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
                        <label for="exampleInputEmail1">Formal ID:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="f_id" placeholder="Enter Your Formal ID">
                      </div>




                      <div class="form-group">
                        <label for="exampleFormControlFile1">Choose Your Profile Picture</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
                      </div>


                      <div class="form-group">
                      <label for="exampleFormControlSelect1">I am a ___.</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="role">
                        <option>student</option>
                        <option>teacher</option>


                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">My gender is ___.</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="gender">
                        <option>Male</option>
                        <option>Female</option>


                      </select>
                    </div>

                      <button type="submit" class="btn btn-primary">Set Up Profile</button>
                    </form>
                    @endif

                    You are logged in!
                    @if(Auth::user()->role=="admin"&&Auth::user()->status=="valid")
                    You are admin
                    @endif
                    @if(Auth::user()->role=="student"&&Auth::user()->status=="valid")
                    You are student
                    @endif
                    @if(Auth::user()->role=="teacher"&&Auth::user()->status=="valid")
                    You are teacher
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
