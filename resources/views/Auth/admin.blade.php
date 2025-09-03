@extends('layout.auth')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
            <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; max-height: auto; height: 100%; border-radius: 15px;">
                <h4 class="mb-3 text-center">Admin Login</h4>
                <form action="{{ route('loginAdmin') }}" method="post" enctype="">
                    @csrf
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Insert Your Username" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Insert Your Password" value="{{ old('password') }}" required>
                    </div>
                    <button class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection