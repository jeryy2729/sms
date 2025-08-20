@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teachers</h1>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th>
                <!-- <th>Phone</th> -->
                <th>Qualification</th>
                <th>Join Date</th>
                    <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                   <td>{{ $teacher->user->name }}</td>
<td>{{ $teacher->user->email }}</td>
 <!-- <td>{{ $teacher->phone }}</td> -->
                    <td>{{ $teacher->qualification }}</td>
                                        <td>{{ $teacher->join_date }}</td>

                    <td>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this teacher?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
