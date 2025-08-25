@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add Subject</h2>

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Subject Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
<div class="form-group">
    <label for="class_id">Class</label>
    <select name="class_id[]" id="class_id" class="form-control" multiple required>
        @foreach($classes as $class)
            <option value="{{ $class->id }}">
                {{ $class->name }}
            </option>
        @endforeach
    </select>
    <small class="text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple classes</small>
</div>


        <div class="mb-3">
            <label class="form-label">Course</label>
            <select name="course_id" class="form-control">
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Assign Teacher</label>
            <select name="teacher_id" class="form-control">
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
