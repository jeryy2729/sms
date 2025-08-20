@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Subject</h2>

    <form action="{{ route('subjects.update', $subject) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Subject Name</label>
            <input type="text" name="name" class="form-control" value="{{ $subject->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Course</label>
            <select name="course_id" class="form-control">
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $subject->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Assign Teacher</label>
            <select name="teacher_id" class="form-control">
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $subject->teacher_id == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
