@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Class</h2>
    <form method="POST" action="{{ route('classes.update', $class->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Class Name</label>
            <input type="text" name="name" class="form-control" value="{{ $class->name }}" required>
        </div>
      
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
