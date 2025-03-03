@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Admin Dashboard</h2>

        <h3>Customers List</h3>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <!-- <h3>BDE List</h3>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            @foreach ($bdes as $bde)
                <tr>
                    <td>{{ $bde->name }}</td>
                    <td>{{ $bde->email }}</td>
                    <td>
                        <a href="{{ route('bdes.edit', $bde->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('bdes.destroy', $bde->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table> -->

        <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
        <!-- <a href="{{ route('bdes.create') }}" class="btn btn-primary">Add BDE</a> -->

  
    </div>
@endsection