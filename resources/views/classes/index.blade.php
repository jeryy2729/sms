@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Classes</h2>
    <a href="{{ route('classes.create') }}" class="btn btn-primary mb-3">Add Class</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
               
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($classes as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->name }}</td>
                
                <td>
                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this class?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5">No classes found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
