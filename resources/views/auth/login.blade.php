@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card p-4 col-lg-5 shadow border-0 rounded-3">
                <div class="text-center mb-3">
                    <h2 class="text-danger text-decoration-underline fw-bold">Login</h2>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email:</label>
                        <input type="email" name="email" class="form-control border-secondary rounded-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password:</label>
                        <input type="password" name="password" class="form-control border-secondary rounded-2" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning w-50 text-light fw-bold rounded-3 shadow-sm"
                            style="transition: all 0.3s;">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection