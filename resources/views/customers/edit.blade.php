@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Customer</h2>
    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
        @csrf
        @method('PUT') <!-- Required for updating -->

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>
@endsection
