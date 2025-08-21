@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Profile</h2>

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            Student Profile
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

            {{-- If you have a relation from User -> Student --}}
            @if(auth()->user()->student)
                <p><strong>Roll Number:</strong> {{ auth()->user()->student->roll_number ?? 'N/A' }}</p>
                <p><strong>Class:</strong> {{ auth()->user()->student->class_name ?? 'N/A' }}</p>
                <p><strong>Section:</strong> {{ auth()->user()->student->section_name ?? 'N/A' }}</p>

                <h5 class="mt-4">Enrolled Courses:</h5>
                <ul>
                    @forelse(auth()->user()->student->courses ?? [] as $course)
                        <li>{{ $course->name }}</li>
                    @empty
                        <li>No courses enrolled</li>
                    @endforelse
                </ul>
            @else
                <div class="alert alert-warning mt-3">
                    No student profile linked to this account.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
