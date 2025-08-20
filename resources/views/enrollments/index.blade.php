@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enrollments</h2>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary mb-3">Add Enrollment</a>

    <form action="{{ route('enrollments.promote') }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-2">
            <div class="col-md-3">
                <select name="from_class_id" class="form-control" required>
                    <option value="">-- From Class --</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="to_class_id" class="form-control" required>
                    <option value="">-- To Class --</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="new_session" class="form-control" placeholder="2025-2026" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success">Promote Students</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Class</th>
            <th>Section</th>
            <th>Session</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($enrollments as $enrollment)
        <tr>
            <td>{{ $enrollment->id }}</td>
            <td>{{ $enrollment->student->name ?? 'N/A' }}</td>
<td>{{ $enrollment->schoolClass->name ?? 'N/A' }}</td>
            <td>{{ $enrollment->section->name ?? 'N/A' }}</td>
            <td>{{ $enrollment->session }}</td>
            <td>{{ ucfirst($enrollment->status) }}</td>
            <td>
                <a href="{{ route('enrollments.edit', $enrollment) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
