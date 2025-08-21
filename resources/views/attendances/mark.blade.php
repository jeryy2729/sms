@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Mark Attendance</h3>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <input type="hidden" name="class_id" value="{{ request('class_id') }}">
        <input type="hidden" name="section_id" value="{{ request('section_id') }}">
        <input type="hidden" name="date" value="{{ request('date') }}">

        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>
                        <select name="attendance[{{ $student->id }}]" class="form-control">
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="late">Late</option>
                            <option value="leave">Leave</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Save Attendance</button>
    </form>
</div>
@endsection
