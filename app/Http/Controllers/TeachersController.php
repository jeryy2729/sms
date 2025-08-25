<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['user', 'address'])->get();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
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
            'phone_no'  =>'required|string',

            // address validation
           'street' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postal_code' => 'required',
        'country' => 'required',
        ]);

        // Create teacher
        $teacher = Teacher::create($request->only([
            'user_id', 'employee_id', 'qualification', 'department', 'join_date', 'phone_no'
        ]));

        // Attach address
        $teacher->address()->create($request->only(['street', 'city', 'state', 'country','postal_code']));

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
            'phone_no'  =>'required|string',

            'street' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postal_code' => 'required',
        'country' => 'required',
        ]);

        // Update teacher info
        $teacher->update($request->only([
            'user_id', 'employee_id', 'qualification', 'department', 'join_date', 'phone_no'
        ]));

        // Update or create address
        if ($teacher->address) {
            $teacher->address->update($request->only(['street', 'city', 'state', 'country','postal_code']));
        } else {
            $teacher->address()->create($request->only(['street', 'city', 'state', 'country','postal_code']));
        }

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->address()->delete(); // delete address too
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
