@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Course</h2>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <!-- Course name -->
        <div class="mb-3">
            <label for="name" class="form-label">Course name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
 <div class="mb-3">
            <label for="description" class="form-label">Course Description</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>

        <!-- Assign Teacher -->
        <div class="mb-3">
            <label for="teacher_id" class="form-label">Teacher</label>
            <select name="teacher_id" id="teacher_id" class="form-control">
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">
                        {{ $teacher->user->name ?? 'Unnamed Teacher' }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Assign Class -->
        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" id="class_id" class="form-control">
                <option value="">-- Select Class --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Course</button>
    </form>
</div>
@endsection
