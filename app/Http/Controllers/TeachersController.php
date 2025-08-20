<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        // Load teachers with their linked user
        $teachers = Teacher::with('user')->get();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        // Get all users with role = teacher (or empty if you only create teacher from here)
        $users = User::where('role', 'teacher')->get();
        return view('teachers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'employee_id' => 'required|string|unique:teachers,employee_id',
            'qualification' => 'required|string',
            'department'    => 'required|string',
            'join_date'     => 'required|date',
            'phone_no'  =>'required|string'
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        $users = User::where('role', 'teacher')->get();
        return view('teachers.edit', compact('teacher', 'users'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'employee_id' => 'required|string|unique:teachers,employee_id,' . $teacher->id,
            'qualification' => 'required|string',
            'department'    => 'required|string',
            'join_date'     => 'required|date',
                        'phone_no'  =>'required|string'

        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
