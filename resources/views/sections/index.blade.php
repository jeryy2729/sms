{{-- resources/views/sections/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sections</h2>
    <a href="{{ route('sections.create') }}" class="btn btn-primary mb-3">Add Section</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Class</th>
            <th>Section Name</th>
            <th>Actions</th>
        </tr>
        @foreach($sections as $section)
        <tr>
            <td>{{ $section->id }}</td>
            <td>{{ $section->schoolClass->name ?? 'N/A' }}</td>
            <td>{{ $section->name }}</td>
            <td>
                <a href="{{ route('sections.edit',$section->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('sections.destroy',$section->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
