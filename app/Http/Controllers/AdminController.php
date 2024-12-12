<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 0)->count();
        $totalDoctors = User::where('role', 1)->count();

        return view('admin.index', compact('totalUsers', 'totalDoctors'));
    }
}
