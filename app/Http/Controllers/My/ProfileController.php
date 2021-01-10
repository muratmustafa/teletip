<?php

namespace App\Http\Controllers\My;

use App\Models\Doctor;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Route;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            $profile = Doctor::where('id', Auth::guard('doctor')->user()->id);

            return view('doctor.profile.index',compact('profile'));

        } else if (Auth::guard('user')->check()) {

            $profile = User::where('id', Auth::guard('user')->user()->id);

            return view('user.profile.index',compact('profile'));

        }
    }

    public function update(Request $request)
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            $request->validate([
                'name'   => 'required',
                'email'  => 'required|email|unique:doctors,email,'.Auth::guard('doctor')->user()->id,
                'password',
                'branch',
            ]);

            $doctor = Doctor::find(Auth::guard('doctor')->user()->id);

            if ($request->filled('password')) {
                $request->merge([
                    'password' => Hash::make($request->input('password')),
                ]);
            }

            $doctor->update(array_filter($request->all()));

            return redirect()->route('doctor.profile.index')->with('success','Profil başarıyla güncellendi.');

        } else if (Auth::guard('user')->check()) {

            $request->validate([
                'password',
                'phone',
                'birthdate',
            ]);

            $user = User::find(Auth::guard('user')->user()->id);

            if ($request->filled('password')) {
                $request->merge([
                    'password' => Hash::make($request->input('password')),
                ]);
            }

            $user->update(array_filter($request->all()));

            return redirect()->route('user.profile.index')->with('success','Profil başarıyla güncellendi.');

        }
    }
}
