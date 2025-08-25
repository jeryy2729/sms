@extends('layouts.app')

@section('content')
<div class="container">
    @php
        $owner = $address->addressable;
    @endphp

    <h3>Edit Address for {{ class_basename($address->addressable_type) }}: <strong>{{ $owner->name ?? 'N/A' }}</strong></h3>

    <form action="{{ route('addresses.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Street</label>
            <input type="text" name="street" class="form-control" value="{{ $address->street }}" required>
        </div>
        <div class="mb-3">
            <label>City</label>
            <input type="text" name="city" class="form-control" value="{{ $address->city }}" required>
        </div>
        <div class="mb-3">
            <label>State</label>
            <input type="text" name="state" class="form-control" value="{{ $address->state }}" required>
        </div>
        <div class="mb-3">
            <label>Postal Code</label>
            <input type="text" name="postal_code" class="form-control" value="{{ $address->postal_code }}" required>
        </div>
        <div class="mb-3">
            <label>Country</label>
            <input type="text" name="country" class="form-control" value="{{ $address->country }}" required>
        </div>

        <button class="btn btn-primary">Update Address</button>
        <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
