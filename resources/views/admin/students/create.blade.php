@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('admin.sidebar') 
        </div>
        <div class="col-9">
            <h2 class="display-6 text-muted mb-3">Create Student</h2>

            <div class="bg-white p-5 rounded border border shadow">
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('admin.student.store') }}" method="post">
                            @csrf
    
                            <div class="mb-3">
                                <label for="name" class="form-label text-muted">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="email" class="form-label text-muted">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="password" class="form-label text-muted">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="form-label text-muted">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
    
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary text-dark"><i class="fa-solid fa-floppy-disk"></i> Save
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