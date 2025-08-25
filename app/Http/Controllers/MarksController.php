<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;

class MarksController extends Controller
{
        public function create($student_id, $class_id, $section_id)
    {
        $student = Student::findOrFail($student_id);
        $subjects = Subject::where('class_id', $class_id)->get(); // subjects of class
        return view('marks.create', compact('student', 'class_id', 'section_id', 'subjects'));
    }

    // Store marks
   public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required',
        'class_id' => 'required',
        'section_id' => 'required',
        'subject_id' => 'required|array',
        'marks_obtained' => 'required|array',
        'total_marks' => 'required|array',
    ]);

    foreach ($request->subject_id as $key => $subjectId) {
        // ✅ Check if marks already exist for this student + class + section + subject
        $exists = Mark::where('student_id', $request->student_id)
            ->where('class_id', $request->class_id)
            ->where('section_id', $request->section_id)
            ->where('subject_id', $subjectId)
            ->exists();

        if ($exists) {
            // Skip or throw error
            return redirect()->back()->with('error', 'Marks for this subject already exist for this student!');
        }

        // If not exists, insert
        Mark::create([
            'student_id'     => $request->student_id,
            'class_id'       => $request->class_id,
            'section_id'     => $request->section_id,
            'subject_id'     => $subjectId,
            'marks_obtained' => $request->marks_obtained[$key],
            'total_marks'    => $request->total_marks[$key],
        ]);
    }

    return redirect()->back()->with('success', 'Marks saved successfully!');
}

    public function show($classId, $sectionId, $studentId)
    {
        $student = Student::with('user')->findOrFail($studentId);

        // Fetch marks for this student in given class & section
        $marks = Mark::where('student_id', $studentId)
                    ->where('class_id', $classId)
                    ->where('section_id', $sectionId)
                    ->get();

        return view('marks.show', compact('student', 'marks', 'classId', 'sectionId'));
    }
}
