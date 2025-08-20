@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Course</h2>

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Course name -->
        <div class="mb-3">
            <label for="name" class="form-label">Course name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                value="{{ old('name', $course->name) }}" 
                required
            >
        </div>
 <div class="mb-3">
            <label for="description" class="form-label">Course Description</label>
            <input 
                type="text" 
                name="description" 
                id="description" 
                class="form-control" 
                value="{{ old('description', $course->description) }}" 
                required
            >
        </div>

        <!-- Assign Teacher -->
        <div class="mb-3">
            <label for="teacher_id" class="form-label">Teacher</label>
            <select name="teacher_id" id="teacher_id" class="form-control">
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option 
                        value="{{ $teacher->id }}" 
                        {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}
                    >
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
                    <option 
                        value="{{ $class->id }}" 
                        {{ $class->id == $course->class_id ? 'selected' : '' }}
                    >
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Course</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
