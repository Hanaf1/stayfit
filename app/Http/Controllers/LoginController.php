<?php

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->regenerateToken(); // Add this line

            return $this->redirectBasedOnRole();
        }

        return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Example: Redirect based on user role after login
    protected function redirectBasedOnRole()
    {


        switch (Auth::user()->role) {
            case 0:
                $dashboard = 'users';
                break;
            case 1:
                $dashboard = 'doctor';
                break;
            case 2:
                $dashboard = 'admin';
                break;
            default:
                $dashboard = 'users'; // Set default to 'user'
                break;
        }

        return redirect()->intended($dashboard);
    }
}
