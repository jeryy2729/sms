@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Class</h2>
    <form method="POST" action="{{ route('classes.store') }}">
        @csrf
        <div class="mb-3">
            <label>Class Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
      
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
