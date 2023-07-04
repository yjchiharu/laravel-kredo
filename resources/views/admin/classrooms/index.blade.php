@extends('layouts.app')

@section('title', 'Classes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.sidebar') 
            </div>
            <div class="col-9">
                <div class="row mb-3">
                    <div class="col text-start">
                        <h2 class="display-6 text-muted">All Classes</h2>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('admin.create') }}" class="btn btn-dark">
                            <i class="fa-solid fa-plus"></i> Create a Class
                        </a>
                        <a href="{{ route('admin.classroom.history') }}" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-clock-rotate-left"></i> All finished Classes
                        </a>
                    </div>
                </div>

                <div class="row">
                    @forelse ($all_classes as $class)
                        <div class="col-3 mb-4">
                            <div class="card h-100 shadow">
                                <div class="card-body">
                                    @if ($class->student_id)
                                        <div class="badge bg-success">Booked</div>
                                    @else
                                        <div class="badge bg-warning">Vacant</div>
                                    @endif

                                    <h2 class="h4 mb-0">{{ $class->course->title}}</h2>

                                    <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                                    <p class="mb-0"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;{{ $class->start_time }}</p>
                                    <p><i class="fa-solid fa-user-tie"></i>&nbsp;&nbsp;&nbsp;{{ $class->teacher->name }}</p>

                                    <p class="mb-0"><span class="text-muted">Student:</span><span class="fw-bold">
                                        {{ $class->student_id ? $class->student->name : '---' }}</span></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="lead fst-italic text-cemter">No classes found.</p>

                    @endforelse
                </div>
            {{ $all_classes->links() }}
            </div>
        </div>
    </div>

@endsection