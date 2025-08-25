@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Teacher</h2>

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>User (Name - Email)</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Select User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $teacher->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} - {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Employee ID</label>
            <input type="text" name="employee_id" value="{{ $teacher->employee_id }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Qualification</label>
            <input type="text" name="qualification" value="{{ $teacher->qualification }}" class="form-control" required>
        </div>
<div class="mb-3">
    <label for="phone_no" class="form-label">Phone Number</label>
    <input type="text" name="phone_no" id="phone_no" class="form-control" 
           value="{{ old('phone_no', $teacher->phone_no ?? '') }}" required>
</div>
        <div class="mb-3">
            <label>Department</label>
            <input type="text" name="department" value="{{ $teacher->department }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Join Date</label>
            <input type="date" name="join_date" value="{{ $teacher->join_date }}" class="form-control" required>
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
        <button type="submit" class="btn btn-success">Update Teacher</button>
    </form>
</div>
@endsection
