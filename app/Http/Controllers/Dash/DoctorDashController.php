<?php

namespace App\Http\Controllers\Dash;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Route;

class DoctorDashController extends Controller
{
    //HASTALARIM SAYFASI
    public function user_index()
    {
        $users = User::whereIn('id', function($query) {
            $query->select('user_id')->from('appointments')->where('doctor_id', Auth::guard('doctor')->user()->id)->groupBy('user_id');
        })->latest('id')->paginate(10);
        return view('doctor.users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    //HASTA GORUNTULEME
    public function user_show(Request $request, $id)
    {
        $user = User::find($id);
        $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->user()->id)->where('user_id', $user->id)->latest('id')->paginate(10);
        $files = File::where('user_id', $user->id)->latest('id')->paginate(10);
        return view('doctor.users.show',compact('user','appointments','files'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    //PROFIL SAYFASI
    public function profile_index()
    {
        $profile = Doctor::where('id', Auth::guard('doctor')->user()->id);
        return view('doctor.profile.index',compact('profile'));
    }

    //PROFIL GUNCELLEME
    public function profile_update(Request $request)
    {
        $request->validate([
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
    }

    //ANKET OLUSTURMA
    public function survey_index(Request $request, $id)
    {
        $user_id = Appointment::where('id', $id)->value('user_id');
        return view('doctor.appointments.survey.index',compact('user_id'));
    }
}
