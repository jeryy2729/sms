<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\School_Classes;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with(['teacher.user', 'schoolClass'])->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::with('user')->get();
        $classes = School_Classes::all();

        return view('courses.create', compact('teachers', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'nullable|integer',
            'class_id' => 'nullable|integer',
            'description'=>'required|string'
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }

    public function edit(Course $course)
    {
        $teachers = Teacher::with('user')->get();
        $classes = School_Classes::all();
        return view('courses.edit', compact('course', 'teachers', 'classes'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
                        'description'=>'required|string',
                            'teacher_id' => 'nullable|integer',
            'class_id' => 'nullable|integer',

        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
