<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function username()
    {
        return 'user';
    }

    public function login(Request $request)
    {
        $credentials = $request->only('user', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->route('takerscores.index'); // Redirect to the 'takerscores.index' route
        }
    
        return back()->withErrors([
            'user' => 'The provided credentials do not match our records.',
        ]);
    }    

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
