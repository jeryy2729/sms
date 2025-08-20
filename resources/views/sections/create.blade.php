{{-- resources/views/sections/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Section</h2>
    <form action="{{ route('sections.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" class="form-control" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name">Section Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
