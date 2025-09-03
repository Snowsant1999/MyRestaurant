@extends('layout.auth')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
            <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; max-height: auto; height: 100%; border-radius: 15px;">
                <h4 class="mb-3 text-center">Login</h4>
                <form action="{{ route('loginUser') }}" method="post">
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
                    <div class="text-center mt-4">
                        <p style="size: 5px;">
                            Don't have an account?
                            <a href="{{route('register')}}">Sign here!</a>
                        </p>
                        <p>
                            Or you want to login as 
                            <a href="{{ route('admin') }}">Admin?</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection