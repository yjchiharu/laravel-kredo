@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">

        <div class="mb-5">
            <div class="row">
                <div class="col">
                    <h2 class="display-6 text-muted">Bookings</h2>
                </div>
                <div class="col text-end">
                    <a href="{{ route('teacher.history') }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-clock-rotate-left"></i> View Finished Bookings
                    </a>
                </div>
            </div>

            <div class="row">
                @forelse ($booked_classes as $class)
                    <div class="col-2 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <div class="badge bg-success">Booked</div>

                                <h3 class="h4 mb-0">{{ $class->course->title }}</h3>

                                <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                                <p><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;{{ $class->start_time }}</span>
                                <p class="mb-0"><span class="text-muted">Student:</span> <span class="fw-bold">{{ $class->student->name }}</span></p>

                                <div class="mt-3">
                                    <button type="button" class="btn btn-outline-success btn-sm w-100" data-bs-toggle="modal" data-bs-target="#finish-class-{{ $class->id }}">Done</button>
                                    @include('teachers.modals.finish-class')
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="lead fst-italic">No bookings found.</p>
                @endforelse
            </div>
        </div>

        <h2 class="display-6 text-muted">Vacant Classes</h2>
        <div class="row">
            @forelse ($my_classes as $class)
                <div class="col-2 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <div class="badge bg-warning">Vacant</div>

                            <h3 class="h4 mb-0">{{ $class->course->title }}</h3>

                            <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                            <p class="mb-0"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;{{ $class->start_time }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="lead fst-italic">No bookings found.</p>
            @endforelse
        </div>
    </div>
@endsection