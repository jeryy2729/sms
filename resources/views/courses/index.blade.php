@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Courses</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add Course</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Description</th>
                <th>Teacher</th>
                <th>Class</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->teacher->user->name ?? 'N/A' }}</td>
                    <td>{{ $course->schoolClass->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
