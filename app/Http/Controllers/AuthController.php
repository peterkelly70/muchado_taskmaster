<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            if (Hash::check($credentials['password'], $user->password)) {
                // The passwords match...
                $msg="The passwords match.";
            } else {
                // The passwords do not match...
                $msg="The passwords do not match.";
            }
        } else {
            $msg="No user found with email " . $credentials['email'];
        }
        

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        else {
            return back()->withErrors([
                'login_error' => 'The provided credentials are incorrect. Please try again.',
                'Credentials' => $credentials,
                'User' => $user ? ['id' => $user->id, 'email' => $user->email] : null,
                'Messge' => $msg
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}