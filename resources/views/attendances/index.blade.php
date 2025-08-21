@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Classes</h2>
<div class="row">
    @foreach($classes as $class)
        @foreach($class->sections as $section)
            <div class="col-md-4 mb-3">
                <a href="{{ route('attendances.class', [$class->id, $section->id]) }}" class="text-decoration-none">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $class->name }} - {{ $section->name }}</h5>
                            <p class="card-text">Click to view attendance sheet</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @endforeach
</div>

</div>
@endsection
