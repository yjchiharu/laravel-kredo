@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.sidebar') 
            </div>
            <div class="col-9">
                <div class="row mb-3">
                    <div class="col text-start">
                        <h2 class="display-6 text-muted">All Students</h2>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('admin.student.create') }}" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Create a Student
                        </a>
                    </div>
                </div>

                <table class="table table-hover align-middle bg-white shadow">
                    <thead class="table-primary small fw-bold text-secondary">
                        <tr>
                            <td></td>
                            <td>NAME</td>
                            <td>EMAIL</td>
                            <td>CLASSES</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_students as $student)
                        <tr>
                            <td>
                                <i class="fa-regular fa-user d-block text-cneter icon-md"></i>
                            </td>
                            <td>{{ ucfirst($student->name)}}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->studentClasses->count() }}</td>
                            <td>
                                @if ($student->trashed())
                                    <button class="border-0 bg-transparent text-secondary icon-sm" title="Activate" 
                                    data-bs-toggle="modal" data-bs-target="#activate-student-{{ $student->id }}">
                                    <i class="fa-solid fa-toggle-off"></i></button>
                                @else
                                    <button class="border-0 bg-transparent text-primary icon-sm" title="Deactive"
                                    data-bs-toggle="modal" data-bs-target="#deactivate-student-{{ $student->id }}">
                                    <i class="fa-solid fa-toggle-on"></i></button>
                                @endif
                                    
                                <button class="border-0 bg-transparent text-primary icon-sm" title="Destory"
                                data-bs-toggle="modal" data-bs-target="#destroy-student-{{ $student->id }}"><i class="fa-solid fa-trash"></i></button>

                            </td>
                        </tr>
                        @include('admin.students.modals.actions') 
                        @include('admin.students.modals.delete')

                        @endforeach   
                    </tbody>
                </table>
                {{ $all_students->links() }}

            </div>    
        </div>
    </div>

@endsection