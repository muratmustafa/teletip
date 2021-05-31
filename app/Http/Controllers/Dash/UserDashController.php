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

class UserDashController extends Controller
{
    //DOKTORLARIM SAYFASI
    public function doctor_index()
    {
        $doctors = Doctor::whereIn('id', function($query) {
            $query->select('doctor_id')->from('appointments')->where('user_id', Auth::guard('user')->user()->id)->groupBy('doctor_id');
        })->latest('id')->paginate(10);
        return view('user.doctors.index',compact('doctors'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    //DOKTOR GORUNTULEME
    public function doctor_show(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        return view('user.doctors.show',compact('doctor'));
    }

    //PROFIL SAYFASI
    public function profile_index()
    {
        $profile = User::where('id', Auth::guard('user')->user()->id);
        return view('user.profile.index',compact('profile'));
    }

    //PROFIL GUNCELLEME
    public function profile_update(Request $request)
    {
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

    //RAPORLARIM SAYFASI
    public function report_index()
    {
        $files = File::where('user_id', Auth::guard('user')->user()->id)->latest('id')->paginate(10);
        return view('user.reports.index',compact('files'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
