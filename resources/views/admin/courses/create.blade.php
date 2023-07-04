@extends('layouts.app')

@section('title', 'Create Course')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('admin.sidebar') 
        </div>
        <div class="col-9">
            <h2 class="display-6 text-muted mb-3">Create Course</h2>

            <div class="bg-white p-5 rounded border border shadow">
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('admin.course.store') }}" method="post">
                            @csrf
    
                            <div class="mb-3">
                                <label for="title" class="form-label text-muted">Tiltle</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
    
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success text-dark"><i class="fa-solid fa-floppy-disk"></i> Save
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection