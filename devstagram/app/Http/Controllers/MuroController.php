<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuroController extends Controller
{
    public function index() {
        if (!Auth::check()) {
            return redirect()->route('principal')->with('error', 'Debes iniciar sesión para acceder al muro.');
        }
        // Renderizar la vista del muro
        return view('Auth.muro');
    }
}
