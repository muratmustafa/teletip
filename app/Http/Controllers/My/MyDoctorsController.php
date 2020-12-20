<?php

namespace App\Http\Controllers\My;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use Auth;
use Route;

class MyDoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctor::whereIn('id', function($query){

            $query->select('doctor_id')->from('appointments')->where('user_id', Auth::guard('web')->user()->id)->groupBy('doctor_id');

        })->latest('id')->paginate(10);

        return view('user.doctors.index',compact('doctors'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function show(Doctor $doctor)
    {
        return view('user.doctors.show',compact('doctor'));
    }
}
