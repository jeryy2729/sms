<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\School_Classes;
use App\Models\Section;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    // show attendance form
    public function index()
    {
        $classes = School_Classes::all();
        return view('attendances.index', compact('classes'));
    }

    public function create()
    {
    $classes = School_Classes::with('sections')->get();

        // $classes = School_Classes::all();
        return view('attendances.create', compact('classes'));
    }
public function getStudents($class, $section)
{
    $students = Student::with('user')
        ->where('class_id', $class)
        ->where('section_id', $section)
        ->get(['id','user_id','class_id','section_id']);

    return response()->json($students);
}public function store(Request $request)
{
    $request->validate([
        'class_id' => 'required|exists:school_classes,id',
        'section_id' => 'required|exists:sections,id',
        'attendance' => 'required|array',
    ]);

    foreach ($request->attendance as $studentId => $status) {
        Attendance::create([
            'student_id' => $studentId,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id, // include this if DB requires
            'date' => now()->toDateString(),
            'status' => $status,
        ]);
    }

    return redirect()->back()->with('success', 'Attendance saved successfully!');
}
    
    public function showClassAttendance($classId, $sectionId)
{
    $class = School_Classes::findOrFail($classId);
    $section = $class->sections()->with('students.user')->findOrFail($sectionId);

    // Today's attendances for this section
    $attendances = Attendance::where('class_id', $classId)
        ->where('section_id', $sectionId)
        ->whereDate('date', now()->toDateString())
        ->get();

    return view('attendances.class_sheet', compact('class', 'section', 'attendances'));
}



}

