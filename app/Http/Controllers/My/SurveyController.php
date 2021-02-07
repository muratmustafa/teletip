<?php

namespace App\Http\Controllers\My;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class SurveyController extends Controller
{
    public function index($id)
    {
        $user_id = \App\Models\Appointment::where('id', $id)->value('user_id');

        return view('doctor.appointments.survey.index',compact('user_id'));
    }
}
