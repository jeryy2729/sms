@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Promote Students</h2>
    <form action="{{ route('enrollments.promote') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>From Class</label>
            <select name="from_class_id" class="form-control" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>To Class</label>
            <select name="to_class_id" class="form-control" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Academic Year</label>
            <input type="text" name="academic_year" class="form-control" placeholder="2025" required>
        </div>

        <button type="submit" class="btn btn-primary">Promote</button>
    </form>
</div>
@endsection
