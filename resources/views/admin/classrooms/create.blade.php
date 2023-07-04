@extends('layouts.app')

@section('title', 'Create Class')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            @include('admin.sidebar')
        </div>
        <div class="col-9">
            <h2 class="display-6 text-muted mb-3">Create Classes</h2>

            <div class="bg-white p-5 rounded shadow">
                <div class="col-6">
                    <form action="{{ route('admin.classroom.store') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="course" class="form-label text-muted">Course</label>
                            <select name="course" id="course" class="form-select" autofocus>
                                <option value="" hidden>Select a course</option>
                                @foreach ($all_courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach 
                            </select>
                            @error('course')
                                <div class="text-danger xsmall">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="date" class="form-label text-muted">Date</label>
                                <input type="date" name="date" id="date" class="form-control" min="{{ date('Y-m-d') }}" value="{{ old('date') }}">
                                @error('date')
                                    <div class="text-danger xsmall">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="start-time" class="form-label tet-muted">Start Time (PHT)</label>
                                <select name="start_time" id="start-time" class="form-select">
                                    <optgroup label="Morning">
                                        <option value="" hidden>--:--</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                    </optgroup>   
                                    <optgroup label="Afternoon">
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                    </optgroup>     
                                </select>
                                @error('start_time')
                                    <div class="text-danger xsmall">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="teacher" class="form-label tet-muted">Teacher</label>
                            <select name="teacher" id="teacher" class="form-select" autofocus>
                                <option value="" hidden>Select a teacher</option>
                                @foreach ($all_teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher')
                                <div class="text-danger xsmall">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-floppy-disk"></i>Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection