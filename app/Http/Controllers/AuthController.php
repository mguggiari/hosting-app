<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.formLogin');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return redirect()->route('auth.formLogin')
                ->with('message', 'Los datos ingresados son incorrectos')
                ->with('type', 'danger')
                ->withInput();
        }

        $request->session()->regenerate();
        
        if (auth()->user()->role === 'user') {
            return redirect()->route('home')
                ->with('message', 'Bienvenido ' . auth()->user()->username)
                ->with('type', 'success');
        }

        if (auth()->user()->role === 'admin') {
            return redirect()->route('dashboardPosts')
                ->with('message', 'Bienvenido ' . auth()->user()->username)
                ->with('type', 'success');
        }


       
    }

    public function processLogout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('message', 'Sesión cerrada correctamente')
            ->with('type', 'success');
    }

    public function formRegister()
    {
        return view('auth.formRegister');
    }

    
}
