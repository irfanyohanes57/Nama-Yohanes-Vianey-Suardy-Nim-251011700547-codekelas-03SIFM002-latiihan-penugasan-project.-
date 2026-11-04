<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }

        return view('login');
    }

    // Proses login (username + password)
    public function actionLogin(Request $request)
    {
        $kredensial = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'required' => ':attribute wajib diisi.',
        ], [
            'username' => 'Username',
            'password' => 'Password',
        ]);

        if (Auth::attempt($kredensial, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Hanya akun admin yang boleh masuk
            if (Auth::user()->role !== 'admin') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors(['username' => 'Akun ini bukan admin.'])->onlyInput('username');
            }

            return redirect()->intended(route('admin.index'));
        }

        return back()->withErrors(['username' => 'Username atau password salah.'])->onlyInput('username');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('sukses', 'Anda berhasil logout.');
    }
}
