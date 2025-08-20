<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['course', 'teacher.user'])->get();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $courses = Course::all();
        $teachers = Teacher::with('user')->get();
        return view('subjects.create', compact('courses', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'course_id'  => 'nullable|integer',
            'teacher_id' => 'nullable|integer',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    public function edit(Subject $subject)
    {
        $courses = Course::all();
        $teachers = Teacher::with('user')->get();
        return view('subjects.edit', compact('subject', 'courses', 'teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
