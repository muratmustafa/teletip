<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class UserLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.user_login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'tckimlik' => 'required|string|max:11',
            'password' => 'required|string'
        ]);

        if (Auth::guard('user')->attempt(['tckimlik' => $request->tckimlik, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('user.home'));
        }

        return redirect()->back()->withInput($request->only('tckimlik', 'remember'))->withErrors(['msg' => 'T.C. kimlik numaranız veya şifreniz hatalı.']);
    }

    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect('/login');
    }
}
