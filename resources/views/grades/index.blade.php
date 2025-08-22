@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Grades</h2>
    <a href="{{ route('grades.create') }}" class="btn btn-primary mb-3">Add Grade</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Grade</th>
                <th>Marks Range</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
            <tr>
                <td>{{ $grade->name }}</td>
                <td>{{ $grade->mark_from }} - {{ $grade->mark_to }}</td>
                <td>{{ $grade->remarks }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
