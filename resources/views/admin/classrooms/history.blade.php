@extends('layouts.app')

@section('title', 'Classes history')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('admin.classroom') }}" class="fs-5 text-decoration-none" title="Back to Home">
                <i class="fa-solid fa-chevron-left"></i> Back</a>
        </div>

        <h2 class="display-6 text-muted">Full History</h2>

        <div class="row">
            <div class="col-6">
                <table class="table table-hover table-borderd table-sm align-middle">
                    <thead class="table-secondary text-secondary fw-bold">
                        <tr>
                            <td>DATE</td>
                            <td>TIME</td>
                            <td>TEACHER</td>
                            <td>STUDENT</td>
                            <td>COURSE</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($finished_classes as $class)
                            <tr>
                                <td>{{ $class->date }}</td>
                                <td>{{ $class->start_time }}</td>
                                <td>{{ $class->teacher->name }}</td>
                                <td>{{ $class->student->name }}</td>
                                <td>{{ $class->course->title }}</td>
                                <td class="text-center">
                                    <button type="button" class="border-0 bg-trasparent text-danger p-2" 
                                    data-bs-toggle="modal" data-bs-target="#delete-class-{{ $class->id }}" title="Delete forever">
                                    <i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            @include('admin.classrooms.modals.delete')
                        @empty
                            <tr>
                                <td colspan="4" class="lead fst-italic text-center">No classes found.</td>
                            </tr>
                        @endforelse    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


