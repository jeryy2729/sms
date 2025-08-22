<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\School_Classes;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['course', 'teacher.user', 'classes'])->get();
        $classes  = School_Classes::all();

        return view('subjects.index', compact('subjects', 'classes'));
    }

    public function create()
    {
        $courses  = Course::all();
        $teachers = Teacher::with('user')->get();
        $classes  = School_Classes::all();

        return view('subjects.create', compact('courses', 'teachers', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'course_id'  => 'nullable|integer',
            'teacher_id' => 'nullable|integer',
            'class_id'   => 'required|array', // ✅ multiple classes allowed
        ]);

        $subject = Subject::create($request->only(['name', 'course_id', 'teacher_id']));

        // attach classes
        $subject->classes()->attach($request->class_id);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    public function edit(Subject $subject)
    {
        $courses  = Course::all();
        $classes  = School_Classes::all();
        $teachers = Teacher::with('user')->get();

        return view('subjects.edit', compact('subject', 'courses', 'teachers', 'classes'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'course_id'  => 'nullable|integer',
            'teacher_id' => 'nullable|integer',
            'class_id'   => 'required|array',
        ]);

        $subject->update($request->only(['name', 'course_id', 'teacher_id']));

        // sync classes
        $subject->classes()->sync($request->class_id);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        // detach classes first (optional but safe)
        $subject->classes()->detach();
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
