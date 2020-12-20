<?php

namespace App\Http\Controllers\My;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class MyAppointmentsController extends Controller
{
    public function index()
    {
        if (Auth::guard('doctor')->check()) {

            $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->user()->id)->latest('id')->paginate(10);
    
            return view('doctor.appointments.index',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 10);

        } else {

            $appointments = Appointment::where('user_id', Auth::guard('web')->user()->id)->latest('id')->paginate(10);
    
            return view('user.appointments.index',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 10);

        }
    }

    public function create()
    {
        if (Auth::guard('doctor')->check()) {

            return view('doctor.appointments.create');

        } else {

            return view('user.appointments.create');

        }
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {

            $request->validate([
                'doctor_id' => 'required',
                'user_id'   => 'required',
                'appt_date' => 'required',
                'appt_status',
                'appt_detail',
            ]);

            Appointment::create(array_merge($request->all(), ['room_name'     => sha1($request->input('doctor_id').$request->input('user_id').$request->input('appt_date'))],
                                                             ['room_password' => sha1($request->input('user_id').$request->input('doctor_id').$request->input('appt_date'))],
                                                             ['appt_status'   => 'Normal']));

        } else {

            $request->validate([
                'user_id'   => 'required',
                'appt_date' => 'required',
                'appt_status',
                'appt_detail',
            ]);

            Appointment::create(array_merge($request->all(), ['doctor_id'     => Auth::guard('doctor')->user()->id],
                                                             ['room_name'     => sha1((Auth::guard('doctor')->user()->id).$request->input('user_id').$request->input('appt_date'))],
                                                             ['room_password' => sha1($request->input('user_id').(Auth::guard('doctor')->user()->id).$request->input('appt_date'))],
                                                             ['appt_status'   => 'Normal']));

        }

        return redirect()->route('doctor.appointments.index')->with('success','Randevu başarıyla oluşturuldu.');
    }

    public function show(Appointment $appointment)
    {
        if (Auth::guard('admin')->check()) {

            return view('admin.appointments.show',compact('appointment'));

        } else if (Auth::guard('doctor')->check()) {

            return view('doctor.appointments.show',compact('appointment'));

        } else {

            return view('user.appointments.show',compact('appointment'));

        }
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit',compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        if (Auth::guard('admin')->check()) {

            $request->validate([
                'doctor_id' => 'required',
                'user_id'   => 'required',
                'appt_date' => 'required',
                'appt_status',
                'appt_detail',
            ]);

            $appointment->update(array_merge($request->all(), ['room_name'     => sha1($request->input('doctor_id').$request->input('user_id').$request->input('appt_date'))],
                                                              ['room_password' => sha1($request->input('user_id').$request->input('doctor_id').$request->input('appt_date'))]));

        } else {

            $request->validate([
                'user_id'   => 'required',
                'appt_date' => 'required',
                'appt_status',
                'appt_detail',
            ]);

            $appointment->update(array_merge($request->all(), ['room_name'     => sha1((Auth::guard('doctor')->user()->id).$request->input('user_id').$request->input('appt_date'))],
                                                              ['room_password' => sha1($request->input('user_id').(Auth::guard('doctor')->user()->id).$request->input('appt_date'))]));

        }

        return redirect()->route('doctor.appointments.index')->with('success','Randevu başarıyla güncellendi.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('doctor.appointments.index')->with('success','Randevu başarıyla silindi.');
    }
}
