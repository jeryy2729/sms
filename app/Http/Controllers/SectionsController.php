<?php
namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\School_Classes;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
        $sections = Section::with('schoolClass')->get();
        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        $classes = School_Classes::all();
        return view('sections.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|numeric',
            'name' => 'required|string|max:255',
        ]);

        Section::create($request->all());

        return redirect()->route('sections.index')->with('success', 'Section created successfully.');
    }

    public function edit(Section $section)
    {
        $classes = School_Classes::all();
        return view('sections.edit', compact('section','classes'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'class_id' => 'required|numeric',
            'name' => 'required|string|max:255',
        ]);

        $section->update($request->all());

        return redirect()->route('sections.index')->with('success', 'Section updated successfully.');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}
