<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // public function dashboard()
    // {
    //     return view('customers.dashboard');
    // }

    public function dashboard()
    {
        $customers = User::where('role', 'customer')->get();
        $bdes = User::where('role', 'bde')->get();
        return view('customers.dashboard', compact('customers', 'bdes'));
    }

    public function index()
    {
        $customers = User::where('role', 'customer')->get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create'); // Make sure the view exists
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    public function edit(User $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, User $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $customer->id,
        ]);

        $customer->update($request->only('name', 'email'));

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
