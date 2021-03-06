<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $student = new Student();
        $student->stud_full_name = $request->input('stud_full_name');

        $student->save();

        return redirect()->route('projects')
            ->with('successStudent', 'Student was added successfully !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $groupId)
    {
        $studentId = (int)$request->studentId;
        $student = Student::where('id', $studentId)->first();
        $student->group_id = $groupId;

        $student->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()->with('deleteStudent', 'Student was deleted');
    }
}
