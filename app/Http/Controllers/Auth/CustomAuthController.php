<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:project,terminal')->except(['logout']);
    }

    public function loginForm()
    {
        return view('auth.sign-in');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string|max:100',
            'password' => 'required|string|min:6'
        ]);
        //$credentials['password'] = Hash::make($credentials['password']);


        if ($this->loginProject($credentials) || $this->loginTerminal($credentials)) {
            return redirect()->intended(route('home'));
        }

        return redirect()->back()
            ->withInput(['login'])
            ->withErrors(['login' => 'Incorrect Login or Password']);
    }

    public function logout()
    {
        //
    }

    protected function redirectTo(): string
    {
        return route('home');
    }

    protected function loginProject(array $credentials): bool
    {
        return Auth::guard('project')->attempt($credentials, true);
    }

    protected function loginTerminal(array $credentials): bool
    {
        if (Auth::guard('terminal')->attempt($credentials, true)) {
            return Auth::guard('terminal')->user()->signedIn();
        }
        return false;
    }
}
