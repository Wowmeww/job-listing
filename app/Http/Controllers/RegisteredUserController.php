<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() {
        return \view('auth.register');
    }
    public function store(Request $request) {
        $userAttributes = $request->validate([
            'name' => ['required', 'max:254'],
            'email' => ['required', 'email', 'unique:users,email', 'lowercase', 'max:254'],
            'password' => ['required', 'confirmed', Password::default()]
        ]);
        $employerAttributes = $request->validate([
            'employer' => ['nullable', 'max:254'],
            'logo' => ['nullable', 'file', File::image()],
        ]);

        $user = User::create($userAttributes);
        $logPath = $request->logo->store('logos');

        Employer::create([
            'name' => $employerAttributes['employer'],
            'logo' => $logPath,
            'user_id' => $user->id
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
