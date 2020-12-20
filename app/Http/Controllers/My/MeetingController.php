<?php

namespace App\Http\Controllers\My;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Route;

class MeetingController extends Controller
{
    public function index(Appointment $appointment)
    {
        if (Auth::guard('doctor')->check()) {

            return view('doctor.appointments.meeting.index',compact('appointment'));

        } else {

            return view('user.appointments.meeting.index',compact('appointment'));

        }
    }
}
