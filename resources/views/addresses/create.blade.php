@extends('layouts.app')

@section('content')
<div class="container">
    @php
        $user = null;
        switch($type) {
            case 'student':
                $user = \App\Models\Student::find($userId);
                break;
            case 'teacher':
                $user = \App\Models\Teacher::find($userId);
                break;
            case 'admin':
                $user = \App\Models\Admin::find($userId);
                break;
        }
    @endphp

    @if($user)
        <h3>Add Address for {{ ucfirst($type) }}: <strong>{{ $user->name }}</strong></h3>
    @else
        <h3>Add Address</h3>
        <div class="alert alert-warning">User not found!</div>
    @endif

    <form action="{{ route('addresses.store') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">
        <input type="hidden" name="user_id" value="{{ $userId }}">

        <div class="mb-3">
            <label>Street</label>
            <input type="text" name="street" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>City</label>
            <input type="text" name="city" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>State</label>
            <input type="text" name="state" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Postal Code</label>
            <input type="text" name="postal_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Country</label>
            <input type="text" name="country" class="form-control" required>
        </div>

        <button class="btn btn-primary">Save Address</button>
        <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
