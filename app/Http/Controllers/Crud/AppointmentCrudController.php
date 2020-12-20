<?php

namespace App\Http\Controllers\Crud;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class AppointmentCrudController extends Controller
{
    public function index()
    {
        $appointments = Appointment::latest('id')->paginate(10);

        return view('admin.appointments.index',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('admin.appointments.create');
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

        return redirect()->route('admin.appointments.index')->with('success','Randevu başarıyla oluşturuldu.');
    }

    public function show(Appointment $appointment)
    {
        return view('admin.appointments.show',compact('appointment'));
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

        return redirect()->route('admin.appointments.index')->with('success','Randevu başarıyla güncellendi.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success','Randevu başarıyla silindi.');
    }
}
