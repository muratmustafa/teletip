<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class DoctorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:doctor')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.doctor_login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('doctor.home'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['msg' => 'E-posta adresiniz veya şifreniz hatalı.']);
    }

    public function logout()
    {
        Auth::guard('doctor')->logout();

        return redirect('/doctor');
    }
}
