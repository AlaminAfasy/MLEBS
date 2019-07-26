@extends('master')
@section('title')
Student |View
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success">Student's Li st</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table ">
                  <thead>
                    <tr>

                      <th scope="col">SL</th>
                      <th scope="col">Photo</th>
                      <th scope="col">Student ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Department</th>
                      <th scope="col" colspan="2"><center>Actions</center></th>

                    </tr>
                  </thead>
                  <tbody>
                    @php $sl=0; @endphp
                    @foreach($students as $student)
                    @php $sl++ @endphp


                    <tr>
                      <td>{{$sl}}</td>
                      <td>
                        <img src="{{ Storage::url($student->photo) }}" alt="" width="50px" height="50px">
                      </td>
                      <td>{{$student->s_id}}</td>
                      <td>{{$student->name}}</td>
                      <td>{{$student->department}}</td>
                      <td>
                        <a href="{{ route('edit', $student->id) }}" class="btn btn-success">Edit</a>

                      </td>
                      <td>
                        <form class="form-inline" action="{{ route('delete', $student->id) }}" method="post">
                          @csrf
                          <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                      </td>

                    </tr>

                    @endforeach


                  </tbody>
                </table>





            </div>
        </div>
    </div>
</div>
</div>

@endsection
