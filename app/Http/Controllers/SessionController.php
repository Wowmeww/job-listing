<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {

        $fields = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required', Password::default()],
        ]);

        if (!Auth::attempt($fields)) throw ValidationException::withMessages([
            'email' => 'Credential have no match in our record.'
        ]);

        $request->session()->regenerate();
        return \redirect('/');
        // return back()->withErrors(['email' => 'Credential have no match in our record.']);
    }
    public function destroy()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect('/login');
    }
}
