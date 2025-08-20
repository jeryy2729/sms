<?php
namespace App\Http\Controllers;

use App\Models\School_Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = School_Classes::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        School_Classes::create($request->only(['name']));

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        $class =    School_Classes::findOrFail($id);
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $class =    School_Classes::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $class->update($request->only(['name']));

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $class =    School_Classes::findOrFail($id);
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
