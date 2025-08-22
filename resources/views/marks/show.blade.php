@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('marks.create', [$student->id, $student->class_id, $student->section_id]) }}" 
       class="btn btn-sm btn-primary">
       Create Marksheet
    </a>

    <h3>Marksheet of {{ $student->user->name }}</h3>
    <p>
        <strong>Class:</strong> {{ $student->class->name ?? $classId }} | 
        <strong>Section:</strong> {{ $student->section->name ?? $sectionId }}
    </p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @forelse($marks as $mark)
                <tr>
                    <td>{{ $mark->subject->name ?? 'N/A' }}</td>
               <td>{{ $mark->marks_obtained }} / {{ $mark->total_marks }}</td>
<td>
    @php
        $percentage = ($mark->marks_obtained / $mark->total_marks) * 100;
    @endphp

    @if($percentage >= 90) 
        A+
    @elseif($percentage >= 80) 
        A
    @elseif($percentage >= 70) 
        B
    @elseif($percentage >= 60) 
        C
    @elseif($percentage >= 50) 
        D
    @else 
        F
    @endif
</td>

                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No marks found for this student</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
