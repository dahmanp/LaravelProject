<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/jobs');
    }
//DELETE ACCOUNT SHOW THIS FUTURE ME
    public function destroy()
    {
        $attributes = request()->validate([
            'password' => ['required']
        ]);

        if (! Hash::check($attributes['password'], Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => 'The provided password does not match our records.'
            ]);
        }

        $user = Auth::user();

        Auth::logout();
        $user->delete();

        return redirect('/');
    }
}
