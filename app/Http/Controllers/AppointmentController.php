<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class AppointmentController extends Controller
{
    public function index()
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->user()->id)->latest('id')->paginate(10);

            return view('doctor.appointments.index',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 10);

        } else if (Auth::guard('user')->check()) {

            $appointments = Appointment::where('user_id', Auth::guard('user')->user()->id)->latest('id')->paginate(10);

            return view('user.appointments.index',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 10);

        }
    }

    public function create()
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            return view('doctor.appointments.create');

        }
    }

    public function store(Request $request)
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            $request->validate([
                'user_tc'   => 'required',
                'appt_date' => 'required',
                'appt_detail',
            ]);

            $doctor_id = Auth::guard('doctor')->user()->id;
            $user_id = User::where('tckimlik',$request->input('user_tc'))->value('id');

            if(empty($user_id))
                return back()->with('error','Randevu oluşturulamadı: Hasta bulunamadı.');

            $room_name = sha1($doctor_id.$user_id.$request->input('appt_date'));
            $room_password = sha1($user_id.$doctor_id.$request->input('appt_date'));

            if(!empty(Appointment::where('room_name',$room_name)->value('id')))
                return back()->with('error','Randevu oluşturulamadı: Sistemde böyle bir randevu mevcut.');

            Appointment::create(array_merge($request->all(), ['user_id'       => $user_id],
                                                             ['doctor_id'     => $doctor_id],
                                                             ['room_name'     => $room_name],
                                                             ['room_password' => $room_password],
                                                             ['appt_status'   => 'Normal']));

            return redirect()->route('doctor.appointments.index')->with('success','Randevu başarıyla oluşturuldu.');

        }
    }

    public function show(Appointment $appointment)
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            return view('doctor.appointments.show',compact('appointment'));

        } else if (Auth::guard('user')->check()) {

            return view('user.appointments.show',compact('appointment'));

        }
    }

    public function edit(Appointment $appointment)
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            return view('doctor.appointments.edit',compact('appointment'));

        }
    }

    public function update(Request $request, Appointment $appointment)
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            $request->validate([
                'user_tc'   => 'required',
                'appt_date' => 'required',
                'appt_status',
                'appt_detail',
            ]);

            $doctor_id = Auth::guard('doctor')->user()->id;
            $user_id = User::where('tckimlik',$request->input('user_tc'))->value('id');

            if(empty($user_id))
                return back()->with('error','Randevu oluşturulamadı: Hasta bulunamadı.');

            $room_name = sha1($doctor_id.$user_id.$request->input('appt_date'));
            $room_password = sha1($user_id.$doctor_id.$request->input('appt_date'));

            if(!empty(Appointment::where('room_name',$room_name)->value('id')) && Appointment::where('room_name',$room_name)->value('id') != $appointment->id)
                return back()->with('error','Randevu oluşturulamadı: Sistemde böyle bir randevu mevcut.');

            $appointment->update(array_merge($request->all(), ['user_id'       => $user_id],
                                                              ['doctor_id'     => $doctor_id],
                                                              ['room_name'     => $room_name],
                                                              ['room_password' => $room_password]));

            return redirect()->route('doctor.appointments.index')->with('success','Randevu başarıyla güncellendi.');
        }
    }

    public function destroy(Appointment $appointment)
    {
        if (Auth::guard('doctor')->check() && \Request::is('doctor/*')) {

            $appointment->delete();

            return redirect()->route('doctor.appointments.index')->with('success','Randevu başarıyla silindi.');

        }
    }
}
