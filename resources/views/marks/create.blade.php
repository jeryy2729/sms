@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Enter Marks for {{ $student->user->name }}</h3>

    <form action="{{ route('marks.store') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">
        <input type="hidden" name="class_id" value="{{ $class_id }}">
        <input type="hidden" name="section_id" value="{{ $section_id }}">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Marks Obtained</th>
                    <th>Total Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>
                        {{ $subject->name }}
                        <input type="hidden" name="subject_id[]" value="{{ $subject->id }}">
                    </td>
                    <td>
                        <input type="number" name="marks_obtained[]" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" name="total_marks[]" class="form-control" required>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Save Marks</button>
    </form>
</div>
@endsection
