@extends('layouts.app')
@section('content')
<h2>Attendance Sheet: {{ $class->name }} - {{ $section->name }}</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Status (Today)</th>
        </tr>
    </thead>
    <tbody>
        @forelse($section->students as $index => $student)
            @php
                $attendance = $attendances->where('student_id', $student->id)->first();
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $student->user->name ?? 'N/A' }}</td>
                <td>{{ $attendance->status ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No students found</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection