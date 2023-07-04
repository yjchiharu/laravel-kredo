@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.sidebar') 
            </div>
            <div class="col-9">
                <div class="row mb-3">
                    <div class="col text-start">
                        <h2 class="display-6 text-muted">All Teachers</h2>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('admin.teacher.create') }}" class="btn btn-info">
                            <i class="fa-solid fa-plus"></i> Create a Teacher
                        </a>
                    </div>
                </div>

                <table class="table table-hover align-middle bg-white shadow">
                    <thead class="table-info small fw-bold text-secondary">
                        <tr>
                            <td></td>
                            <td>NAME</td>
                            <td>EMAIL</td>
                            <td>CLASSES</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_teachers as $teacher)
                        <tr>
                            <td>
                                <i class="fa solid fa-user-tie d-block text-cneter icon-md"></i>
                            </td>
                            <td>{{ ucfirst($teacher->name) }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{-- $teacher->teacherClasses->count() --}}</td>
                            <td>
                                @if ($teacher->trashed())
                                    <button class="border-0 bg-transparent text-secondary icon-sm" title="Activate" 
                                    data-bs-toggle="modal" data-bs-target="#activate-teacher-{{ $teacher->id }}">
                                    <i class="fa-solid fa-toggle-off"></i></button>
                                @else
                                    <button class="border-0 bg-transparent text-primary icon-sm" title="Deactive"
                                    data-bs-toggle="modal" data-bs-target="#deactivate-teacher-{{ $teacher->id }}">
                                    <i class="fa-solid fa-toggle-on"></i></button>
                                @endif

                                <button class="border-0 bg-transparent text-primary icon-sm" title="Destroy"
                                data-bs-toggle="modal" data-bs-target="#destroy-teacher-{{ $teacher->id }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                            @include('admin.teachers.modals.actions') 
                            @include('admin.teachers.modals.delete')
                        @endforeach     
                    </tbody>
                </table>
                {{ $all_teachers->links() }}

            </div>    
        </div>
    </div>

@endsection