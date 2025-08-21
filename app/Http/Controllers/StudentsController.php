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
        $students = Student::with(['user', 'schoolClass', 'section'])->get();
        return view('students.index', compact('students'));
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
            'user_id' => 'required',
            'roll_no' => 'required|unique:students',
            'class_id' => 'nullable|integer',
            'section_id' => 'nullable|integer',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully');
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
            'roll_no' => 'required|unique:students,roll_no,'.$student->id,
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
    public function myProfile()
{
    $student = auth()->user()->student; // assuming relation exists
    return view('students.my-profile', compact('student'));
}

}
