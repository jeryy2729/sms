@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Enrollment</h2>

    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
       <select name="student_id" class="form-control" required>
    <option value="">-- Select Student --</option>
    @foreach($students as $student)
        <option value="{{ $student->id }}">
            {{ $student->user->name ?? 'N/A' }}  <!-- Fetch name from user -->
        </option>
    @endforeach
</select>

        <div class="mb-3">
            <label>Class</label>
            <select name="class_id" class="form-control" required>
                <option value="">-- Select Class --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Section</label>
            <select name="section_id" class="form-control">
                <option value="">-- Select Section --</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Session</label>
            <input type="text" name="session" class="form-control" placeholder="2025-2026" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
