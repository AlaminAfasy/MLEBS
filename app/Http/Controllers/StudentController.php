<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students=Student::all();
        return view('index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Check validation
      $this->validate($request, [
          'name'                   =>  'required|string|max:10',
          's_id'        =>  'required|string',
          'department'        =>  'required|string',
          'photo'                    =>  'nullable|image',
      ]);

        //dd('Submitted');
        $student=new Student;
        $student->s_id=$request->s_id;
        $student->name=$request->name;
        $student->department=$request->department;
        if ($request->hasFile('photo')) {
            //store
            $student->photo = $request->photo->store('public/images');
        }
        $student->save();
        return redirect()->route('student');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('edit')->with('student',$student);
    }

    public function delete($id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect()->route('student');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $student=Student::find($id);
      $student->s_id=$request->s_id;
      $student->name=$request->name;
      $student->department=$request->department;
      if ($request->hasFile('photo')) {
          //store
          $student->photo = $request->photo->store('public/images');
      }
      $student->save();
      return redirect()->route('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
