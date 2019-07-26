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
@if(Auth::user()->role=="admin"&&Auth::user()->status=="valid")

<div class="container bg-info">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">Dashboard</div>
                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    You are logged in!
                    <table class="table ">
                      <thead>
                        <tr>
                          <th scope="col">SL</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                          <th scope="col">Status</th>
                          <th scope="col" colspan="2"><center>Actions</center></th>
                        </tr>
                      </thead>
                      <tbody>

                        @php $sl=0; @endphp
                        @foreach($all_users as $user)
                        @if($user->role!="admin")
                        @php $sl++ @endphp


                        <tr>
                          <td>{{$sl}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->role}}</td>
                          <td>{{$user->status}}</td>
                          <td>
                            @if($user->status!="valid")
                            <a href="{{ route('valid', $user->id) }}" class="btn btn-success">Valid</a>
                            @else
                            <a href="{{ route('invalid', $user->id) }}" class="btn btn-success">Invalid</a>
                            @endif
                          </td>
                          <td>
                            <form class="form-inline" action="{{ route('delete', $user->id) }}" method="post">
                              @csrf
                              <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                          </td>

                        </tr>
                        @endif

                        @endforeach


                      </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
