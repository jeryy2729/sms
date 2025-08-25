@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Select Student User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $student->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Roll No</label>
            <input type="text" name="roll_no" value="{{ $student->roll_no }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Class</label>
            <select name="class_id" class="form-control">
                <option value="">-- Select Class --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Section</label>
            <select name="section_id" class="form-control">
                <option value="">-- Select Section --</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" value="{{ $student->dob }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="">-- Select Gender --</option>
                <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Phone No</label>
            <input type="text" name="phone_no" value="{{ $student->phone_no }}" class="form-control">
        </div>

        {{-- Address (Polymorphic) --}}
         <div class="mb-3">
    <label>Country</label>
    <input type="text" name="country" value="{{ $student->address->country ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Street</label>
    <input type="text" name="street" value="{{ $student->address->street ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>City</label>
    <input type="text" name="city" value="{{ $student->address->city ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>State</label>
    <input type="text" name="state" value="{{ $student->address->state ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Postal Code</label>
    <input type="text" name="postal_code" value="{{ $student->address->postal_code ?? '' }}" class="form-control">
</div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
