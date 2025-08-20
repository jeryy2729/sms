@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Students</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Class</th>
                <th>Section</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->roll_no }}</td>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->user->email }}</td>
                <td>{{ $student->schoolClass->name ?? '-' }}</td>
                <td>{{ $student->section->name ?? '-' }}</td>
                <td>{{ $student->phone_no }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
