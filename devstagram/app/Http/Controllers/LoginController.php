<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("Auth.login");

    }
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar iniciar sesión
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); // Prevenir ataques de sesión fijada
            return redirect()->route('dashboard')->with('success', 'Has iniciado sesión con éxito.');
        } else {
            return back()->with('error_message','Las credenciales no coinciden con nuestros registros.');
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('principal')->with('success', 'Has cerrado sesión.');
    }
    
}
