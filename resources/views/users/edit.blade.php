@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password (leave blank if not changing)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
            </select>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
