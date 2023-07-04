@extends('layouts.app')

@section('title', 'Classes History')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{  route('student.index') }}" class="fs-5 text-decoration-none" title="Back to Home">
                <i class="fa-solid fa-chevron-left"></i> Back</a>
        </div>
        
        <h2 class="display-6 text-muted">History</h2>

        <div class="row">
            <div class="col-6">
                <table class="table table-hover table-border table-sm">
                    <thead>
                        <tr>
                            <td>DATE</td>
                            <td>TIME</td>
                            <td>COURSE</td>
                            <td>TEACHER</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($finished_classes as $class)
                        <tr>
                            <td>{{ $class->date }}</td>
                            <td>{{ $class->start_time }}</td>
                            <td>{{ $class->course->title }}</td>
                            <td>{{ $class->teacher->name }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="lead fst-italic text-center">No classes found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- $finished_classes->link() --}}
            </div>
        </div>
    </div>
@endsection