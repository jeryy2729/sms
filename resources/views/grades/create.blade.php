@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Grade</h2>
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Grade Name</label>
            <input type="text" name="name" class="form-control" placeholder="A+" required>
        </div>
        <div class="mb-3">
            <label>Mark From</label>
            <input type="number" name="mark_from" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mark To</label>
            <input type="number" name="mark_to" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Remarks</label>
            <input type="text" name="remarks" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
