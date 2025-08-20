{{-- resources/views/sections/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Section</h2>
    <form action="{{ route('sections.update',$section->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" class="form-control" required>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $section->class_id == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name">Section Name</label>
            <input type="text" name="name" class="form-control" value="{{ $section->name }}" required>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
