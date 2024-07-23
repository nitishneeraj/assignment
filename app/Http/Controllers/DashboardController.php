<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        
        return view('products.index', ['products' => User::latest()->paginate(7)]);
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/'); // Redirect to desired location after logout
    }
}