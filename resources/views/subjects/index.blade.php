@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Subjects</h2>
    <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Add Subject</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject Name</th>
                <th>Course</th>
                <th>Teacher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->course->name ?? 'N/A' }}</td>
                    <td>{{ $subject->teacher->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this subject?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
