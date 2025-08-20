<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\School_Classes;
use App\Models\Section;
use Illuminate\Http\Request;

class EnrollmentsController extends Controller
{
    public function index()
    {
            $classes     = School_Classes::all(); // add this line

$enrollments = Enrollment::with(['student', 'schoolClass', 'section'])->get();
        return view('enrollments.index', compact('enrollments','classes'));
    }

    public function create()
    {
    $students = Student::with('user')->get(); // eager load user
        $classes = School_Classes::all();
        $sections = Section::all();

        return view('enrollments.create', compact('students', 'classes', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'class_id'   => 'required|integer',
            'section_id' => 'nullable|integer',
            'session'    => 'required|string',
        ]);

        Enrollment::create([
            'student_id' => $request->student_id,
            'class_id'   => $request->class_id,
            'section_id' => $request->section_id,
            'session'    => $request->session,
            'status'     => 'active',
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully');
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::all();
        $classes = School_Classes::all();
        $sections = Section::all();

        return view('enrollments.edit', compact('enrollment', 'students', 'classes', 'sections'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'class_id'   => 'required|integer',
            'section_id' => 'nullable|integer',
            'session'    => 'required|string',
            'status'     => 'required|string',
        ]);

        $enrollment->update($request->all());

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully');
    }

    // ✅ Bulk promote students
    public function promote(Request $request)
    {
        $request->validate([
            'from_class_id' => 'required|integer',
            'to_class_id'   => 'required|integer',
            'new_session'   => 'required|string',
        ]);

        $enrollments = Enrollment::where('class_id', $request->from_class_id)
                                ->where('status', 'active')
                                ->get();

        foreach ($enrollments as $enrollment) {
            $enrollment->update(['status' => 'promoted']);
            Enrollment::create([
                'student_id' => $enrollment->student_id,
                'class_id'   => $request->to_class_id,
                'section_id' => null,
                'session'    => $request->new_session,
                'status'     => 'active',
            ]);
        }

        return redirect()->route('enrollments.index')->with('success', 'Students promoted successfully');
    }
}
