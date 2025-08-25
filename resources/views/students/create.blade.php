@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        {{-- Select Student User --}}
        <div class="mb-3">
            <label>User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Select Student User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        {{-- Roll No --}}
        <div class="mb-3">
            <label>Roll No</label>
            <input type="text" name="roll_no" class="form-control" required>
        </div>

        {{-- Class --}}
        <div class="mb-3">
            <label>Class</label>
            <select name="class_id" class="form-control">
                <option value="">-- Select Class --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Section --}}
        <div class="mb-3">
            <label>Section</label>
            <select name="section_id" class="form-control">
                <option value="">-- Select Section --</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Date of Birth --}}
        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control">
        </div>

        {{-- Gender --}}
        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="">-- Select Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        {{-- Phone No --}}
        <div class="mb-3">
            <label>Phone No</label>
            <input type="text" name="phone_no" class="form-control">
        </div>

        {{-- Address Info (Polymorphic) --}}
        <h4>Address Information</h4>
        <div class="mb-3">
            <label>City</label>
            <input type="text" name="city" class="form-control" required>
        </div>
         <div class="mb-3">
            <label>Country</label>
            <input type="text" name="country" class="form-control" required>
        </div>
   <div class="mb-3">
            <label>Postal Code</label>
            <input type="text" name="postal_code" class="form-control" required>
        </div>
         <div class="mb-3">
            <label>Street</label>
            <input type="text" name="street" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>State</label>
            <input type="text" name="state" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
