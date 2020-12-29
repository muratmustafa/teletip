<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.home'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['msg' => 'E-posta adresiniz veya şifreniz hatalı.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin');
    }
}
