@extends('layouts.app')

@section('title', 'Student')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col text-end">
            <a href="{{ route('student.history') }}" class="btn btn-outline-secondary">
                <i class="fa-solid fa-clock-rotate-left"></i> View finished Classes
            </a>
        </div>
    </div>
    {{-- MY CLASSES --}}
    <div class="row">
        <div class="col text-start mb-5">
            <h2 class="display-6 text-muted">Booked</h2>

            <div class="row">
                @forelse ($my_classes as $class)
                    <div class="col-2 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body position-relative">
                                <div class="badge bg-success">Booked</div>

                                <h3 class="h4 mb-0">{{ $class->course->title}}</h3>

                                <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                                <p class="mb-0"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;{{ $class->start_time }}</p>
                                <p class="mb-0"><button type="button" class="text-muted border-0 bg-transparent p-0" data-bs-toggle="modal"
                                    data-bs-target="#cancel-booking-{{ $class->id }}"><i class="fa-solid fa-ban"></i>&nbsp;&nbsp;&nbsp;Cancel</button></p>

                            </div>
                            
                        </div>
                    </div>
                    @include('students.modals.cancel-booking')  
                @empty
                    <p class="lead fst-italic text-cemter">You can book any available casses below.</p>

                @endforelse
        </div>
    </div>

    <div class="row">   
        <div class="col text-start">
            <h2 class="display-6 text-muted">Available Classes</h2>

            <div class="row">
                @forelse ($available_classes as $class)
                    <div class="col-2 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body position-relative">
                                    <div class="badge bg-warning">Vacant</div>

                                <h2 class="h4 mb-0">{{ $class->course->title}}</h2>

                                <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                                <p class="mb-0"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;{{ $class->start_time }}</p>

                                <form action="{{ route('student.save-booking', $class->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="btn btn-outline-success text-muted">Book this class</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="lead fst-italic text-cemter">No Available classes.</p>

                @endforelse
            </div>
        </div> 
    </div>   
</div>
    
@endsection