@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>

    <table class="table table-bordered mt-3">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
