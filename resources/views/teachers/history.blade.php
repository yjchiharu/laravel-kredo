@extends('layouts.app')

@section('title', 'Bookings History')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('teacher.index') }}" class="fs-5 text-decoration-none" title="Back to Home"><i class="fa-solid fa-chevron-left"></i> Back</a>
        </div>

        <h2 class="display-6 text-muted">History</h2>

        <div class="row">
            <div class="col-6">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="table-secondary text-secondary fw-bold">
                        <tr>
                            <td>DATE</td>
                            <td>TIME</td>
                            <td>STUDENT</td>
                            <td>COURSE</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($finished_classes as $class)
                            <tr>
                                <td>{{ $class->date }}</td>
                                <td>{{ $class->start_time }}</td>
                                <td>{{ $class->student->name }}</td>
                                <td>{{ $class->course->title }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" title="Revert" data-bs-toggle="modal" data-bs-target="#revert-class-{{ $class->id }}"><i class="fa-solid fa-clock-rotate-left"></i></button>
                                </td>
                            </tr>
                            @include('teachers.modals.revert-class')
                        @empty
                            <tr>
                                <td colspan="4" class="lead fst-italic text-center">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- $finished_classes->links() --}}
            </div>
        </div>
    </div>
@endsection