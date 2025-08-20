@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="form-group mb-3">
            <label for="name">Student Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->user->name }}" required>
        </div>

        {{-- Email --}}
        <div class="form-group mb-3">
            <label for="email">Student Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->user->email }}" required>
        </div>

        {{-- Roll Number --}}
        <div class="form-group mb-3">
            <label for="roll_no">Roll Number</label>
            <input type="text" name="roll_no" class="form-control" value="{{ $student->roll_no }}" required>
        </div>

        {{-- Class --}}
        <div class="form-group mb-3">
            <label for="class_id">Class</label>
            <select name="class_id" class="form-control" required>
                <option value="">-- Select Class --</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Section --}}
        <div class="form-group mb-3">
            <label for="section_id">Section</label>
            <select name="section_id" class="form-control" required>
                <option value="">-- Select Section --</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Admission Date --}}
        <div class="form-group mb-3">
            <label for="admission_date">Admission Date</label>
            <input type="date" name="admission_date" class="form-control" value="{{ $student->admission_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
