<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function index() {
        return view('Auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|min:8',
            'last_name' => 'required|max:50',
            'repeat_password' => 'required|same:password',
            'phone' => 'nullable|unique:users|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
        ]);

            // Crear el usuario en la base de datos
        $user = User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
            'last_name' => $request->last_name,
            'phone' => $request->phone,    
        ]);

        // Autentificación 1
        Auth::login($user);

        // Retornar una respuesta o redirigir
        return redirect()->route('dashboard')->with('success', 'Usuario registrado con éxito.');
    }
}