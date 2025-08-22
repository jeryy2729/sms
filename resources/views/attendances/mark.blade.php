@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Mark Attendance - {{ $student->user->name }}</h3>

<form action="{{ route('attendances.store') }}" method="POST">
        @csrf
            <input type="hidden" name="student_id" value="{{ $student->id }}">

        <input type="hidden" name="date" value="{{ now()->toDateString() }}">

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
                <option value="late">Late</option>
                <option value="leave">Leave</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
