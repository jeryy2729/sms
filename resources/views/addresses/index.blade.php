@extends('layouts.app')

@section('content')
<div class="container">
    <h3>All Addresses</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Owner Type</th>
                <th>Owner Name</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($addresses as $address)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ class_basename($address->addressable_type) }}</td>
<td>{{ $address->addressable?->user?->name ?? 'N/A' }}</td>
                <td>{{ $address->street }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->state }}</td>
                <td>{{ $address->postal_code }}</td>
                <td>{{ $address->country }}</td>
                <td>
                    <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
