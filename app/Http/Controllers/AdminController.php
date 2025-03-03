<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $customers = User::where('role', 'customer')->get();
        $bdes = User::where('role', 'bde')->get();
        return view('admin.dashboard', compact('customers', 'bdes'));
    }
}
