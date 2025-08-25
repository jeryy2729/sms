<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\School_Classes;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $classes = School_Classes::all();
        $students = Student::with(['user', 'schoolClass', 'section', 'address'])->get(); // include address
        return view('students.index', compact('students','classes'));
    }

    public function create()
    {
        $users = User::where('role', 'student')->get(); // only student-role users
        $classes = School_Classes::all();
        $sections = Section::all();

        return view('students.create', compact('users', 'classes', 'sections'));
    }
public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'roll_no' => 'required',
        'class_id' => 'required',
        'section_id' => 'required',
        'dob' => 'required|date',
        'gender' => 'required',
        'phone_no' => 'required',

        // address validation
        'street' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postal_code' => 'required',
        'country' => 'required',
    ]);

    // create student
    $student = Student::create($request->only([
        'user_id', 'roll_no', 'class_id', 'section_id', 'dob', 'gender', 'phone_no'
    ]));

    // attach address
    $student->address()->create($request->only([
        'street', 'city', 'state', 'postal_code', 'country'
    ]));

    return redirect()->route('students.index')->with('success', 'Student created successfully.');
}

    public function edit(Student $student)
    {
        $users = User::where('role', 'student')->get();
        $classes = School_Classes::all();
        $sections = Section::all();

        return view('students.edit', compact('student', 'users', 'classes', 'sections'));
    }
public function update(Request $request, Student $student)
{
    $request->validate([
        'roll_no'     => 'required|unique:students,roll_no,' . $student->id,
        'dob'         => 'nullable|date',
        'gender'      => 'nullable|string',
        'phone_no'    => 'nullable|string',
        'street'      => 'required|string',
        'city'        => 'required|string',
        'state'       => 'required|string',
        'postal_code' => 'required|string',
        'country'     => 'required|string',
    ]);

    // update student
    $student->update($request->only([
        'user_id', 'roll_no', 'class_id', 'section_id', 'dob', 'gender', 'phone_no'
    ]));

    // update or create address
    $student->address()->updateOrCreate(
        ['addressable_id' => $student->id, 'addressable_type' => Student::class],
        $request->only(['street','city','state','postal_code','country'])
    );

    return redirect()->route('students.index')->with('success', 'Student and address updated successfully');
}


    public function destroy(Student $student)
    {
        if ($student->address) {
            $student->address->delete();
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student and address deleted successfully');
    }

    public function myProfile()
    {
        $student = auth()->user()->student; // assuming relation exists
        return view('students.my-profile', compact('student'));
    }
}
