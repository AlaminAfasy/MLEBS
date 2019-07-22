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
