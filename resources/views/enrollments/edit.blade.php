@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Enrollment</h2>

    <form action="{{ route('enrollments.update', $enrollment) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $enrollment->student_id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Class</label>
            <select name="class_id" class="form-control" required>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $class->id == $enrollment->class_id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Section</label>
            <select name="section_id" class="form-control">
                <option value="">-- Select Section --</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ $section->id == $enrollment->section_id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Session</label>
            <input type="text" name="session" class="form-control" value="{{ $enrollment->session }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $enrollment->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="promoted" {{ $enrollment->status == 'promoted' ? 'selected' : '' }}>Promoted</option>
                <option value="graduated" {{ $enrollment->status == 'graduated' ? 'selected' : '' }}>Graduated</option>
                <option value="dropped" {{ $enrollment->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
