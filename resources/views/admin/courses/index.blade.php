@extends('layouts.app')

@section('title', 'Courses')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.sidebar') 
            </div>
            <div class="col-9">
                <div class="row mb-3">
                    <div class="col text-start">
                        <h2 class="display-6 text-muted">All Courses</h2>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('admin.course.create') }}" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i> Create a Course
                        </a>
                    </div>
                </div>

                <table class="table table-hover align-middle bg-white shadow">
                    <thead class="table-success small fw-bold text-secondary">
                        <tr>
                            <td class="text-center">TITLE</td>
                            <td>CLASEES</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_courses as $course)
                        <tr>
                            <td class="text-center">{{ ucfirst($course->title)}}</td>
                            <td>{{ $course->classroom->count() }}</td>
                            <td><button class="border-0 bg-transparent text-success icon-sm" title="Destory"
                                data-bs-toggle="modal" data-bs-target="#destroy-course-{{ $course->id }}"><i class="fa-solid fa-trash"></i></button>

                            </td>
                        </tr>
                        {{--  @include('admin.courses.modals.delete')--}}

                        @endforeach   
                    </tbody>
                </table>
                {{ $all_courses->links() }}

            </div>    
        </div>
    </div>

@endsection