@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Create Teacher</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf

        <!-- Select User -->
        <div class="mb-3">
            <label for="user_id" class="form-label">Select User</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Select User (Teacher Role) --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <!-- Employee ID -->
        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee ID</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control" required>
        </div>

        <!-- Qualification -->
        <div class="mb-3">
            <label for="qualification" class="form-label">Qualification</label>
            <input type="text" name="qualification" id="qualification" class="form-control" required>
        </div>
      <div class="mb-3">
    <label for="phone_no" class="form-label">Phone Number</label>
    <input type="text" name="phone_no" id="phone_no" class="form-control" 
           value="{{ old('phone_no', $teacher->phone_no ?? '') }}" required>
</div>

        <!-- Department -->
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" name="department" id="department" class="form-control" required>
        </div>

        <!-- Join Date -->
        <div class="mb-3">
            <label for="join_date" class="form-label">Join Date</label>
            <input type="date" name="join_date" id="join_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Teacher</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
