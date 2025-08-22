<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mark_from' => 'required|integer',
            'mark_to' => 'required|integer',
        ]);

        Grade::create($request->all());

        return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
    }
}
