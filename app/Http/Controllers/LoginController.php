<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {

        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'role_type'=>1])) {
            return redirect()->route('admin.dashboard');
        }elseif(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'role_type'=>2])) {
            return redirect()->route('employeedashboard');
        }else {
            return redirect()->back()->with('failed', 'Invalid Credentials');
        }
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_type' => 2,
        ]);

        return redirect()->route('login')->with('failed', 'Invalid Credentials');


    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
