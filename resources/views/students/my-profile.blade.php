@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Profile</h2>

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            Student Profile
        </div>
        <div class="card-body">

            @auth
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

                {{-- Check if user has a student profile --}}
                 @if(auth()->user()->student)
    <p><strong>Roll Number:</strong> {{ auth()->user()->student->roll_no ?? 'N/A' }}</p>
    <p><strong>Class:</strong> {{ auth()->user()->student->schoolClass->name ?? 'N/A' }}</p>
    <p><strong>Section:</strong> {{ auth()->user()->student->section->name ?? 'N/A' }}</p>
                @else
                    <div class="alert alert-warning mt-3">
                        No student profile linked to this account.
                    </div>
                @endif
            @else
                <div class="alert alert-warning">
                    You must be logged in to view your profile.
                </div>
            @endauth

        </div>
    </div>
</div>
@endsection
