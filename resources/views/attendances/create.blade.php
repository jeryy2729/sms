@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mark Attendance</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('attendances.store') }}">
        @csrf
<input type="hidden" name="class_id" id="class_id_hidden">
<input type="hidden" name="section_id" id="section_id_hidden">
<select id="class_section" class="form-select" required>
    <option value="">-- Select Class & Section --</option>
    @foreach($classes as $class)
        @foreach($class->sections as $section)
            <option value="{{ $class->id }}_{{ $section->id }}">
                {{ $class->name }} - {{ $section->name }}
            </option>
        @endforeach
    @endforeach
</select>


        <table class="table table-bordered" id="studentsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                {{-- Students will be loaded via AJAX --}}
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Save Attendance</button>
    </form>
</div>

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#class_section').on('change', function () {
        let value = $(this).val(); // e.g., "1_2"
        if (!value) return;

        let [classId, sectionId] = value.split('_');

        $('#class_id_hidden').val(classId);
        $('#section_id_hidden').val(sectionId);

        // AJAX to load students
        $.ajax({
            url: `/get-students/${classId}/${sectionId}`,
            type: 'GET',
            dataType: 'json',
            success: function(students) {
                $('#studentsTable tbody').empty();
                if (students.length === 0) {
                    $('#studentsTable tbody').append(
                        '<tr><td colspan="3" class="text-center">No students found</td></tr>'
                    );
                } else {
                    $.each(students, function(index, student) {
                        $('#studentsTable tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${student.user ? student.user.name : 'N/A'}</td>
                                <td>
                                    <select name="attendance[${student.id}]" class="form-select">
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="leave">Leave</option>
                                    </select>
                                </td>
                            </tr>
                        `);
                    });
                }
            }
        });
    });
});


</script>
@endsection
