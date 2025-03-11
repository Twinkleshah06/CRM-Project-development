@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="">Add Customer</h4>
        <form method="POST" action="{{ route('customers.store') }}">
            @csrf
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Confirm Password:</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Customer</button>
        </form>
    </div>
@endsection