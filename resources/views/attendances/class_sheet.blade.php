@extends('layouts.app')

@section('content')
<h2>Attendance Sheet: {{ $class->name }} - {{ $section->name }}</h2>
<!-- <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Mark All</a> -->

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Status (Today)</th>
            <th>Actions</th>
            <th>Mark Sheet</th>
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
                <td>
                    {{-- Mark attendance for single student --}}
                    <a href="{{ route('attendances.mark', [$class->id, $section->id, $student->id]) }}" 
                       class="btn btn-sm btn-success">
                        Mark
                    </a>

                    {{-- Delete attendance if exists --}}
                    @if($attendance)
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" 
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    @endif
                </td>
                <td>
    <div class="btn-group">
        <a href="{{ route('marksheet.show', [$class->id, $section->id, $student->id]) }}" class="btn btn-info btn-sm">
            View Marksheet
        </a>
    </div>
</td>

            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No students found</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
