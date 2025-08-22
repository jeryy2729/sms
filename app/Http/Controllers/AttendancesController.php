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
    public function mark($class_id, $section_id, $student_id)
    {
        $student = Student::with('user')->findOrFail($student_id);
        return view('attendances.mark', compact('student', 'class_id', 'section_id'));
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
}
public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'date'       => 'required|date',
        'status'     => 'required|in:present,absent,late,leave',
    ]);

    $student = Student::findOrFail($request->student_id);

    Attendance::updateOrCreate(
        [
            'student_id' => $student->id,
            'date'       => $request->date,
        ],
        [
            'status'     => $request->status,
            'class_id'   => $student->class_id,
            'section_id' => $student->section_id,
        ]
    );

        return redirect()->route('attendances.index')->with('success', 'Attendance marked successfully.');
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

public function destroy(Attendance $attendance)
{
    $attendance->delete();

    return back()->with('success', 'Attendance record deleted successfully.');
}


}

