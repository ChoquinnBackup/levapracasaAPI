<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Setar cookie para reconexão automática (opcional)
            if ($request->filled('remember')) {
                $cookie = Cookie::make('user_id', Auth::id(), 43200); // 30 dias
                return redirect()->intended('/dashboard')->withCookie($cookie);
            }
            
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Limpar cookie de reconexão
        return redirect('/')->withCookie(Cookie::forget('user_id'));
    }
}
