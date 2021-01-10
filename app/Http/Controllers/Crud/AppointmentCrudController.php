<?php

namespace App\Http\Controllers\Crud;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
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
        $request->validate([
            'doctor_email' => 'required',
            'user_tc'      => 'required',
            'appt_date'    => 'required',
            'appt_detail',
        ]);

        $doctor_id = Doctor::where('email',$request->input('doctor_email'))->value('id');
        $user_id = User::where('tckimlik',$request->input('user_tc'))->value('id');

        if(empty($user_id) || empty($doctor_id))
            return back()->with('error','Randevu oluşturulamadı: Doktor veya hasta bulunamadı.');

        Appointment::create(array_merge($request->all(), ['doctor_id'     => $doctor_id],
                                                         ['user_id'       => $user_id],
                                                         ['room_name'     => sha1($doctor_id.$user_id.$request->input('appt_date'))],
                                                         ['room_password' => sha1($user_id.$doctor_id.$request->input('appt_date'))],
                                                         ['appt_status'   => 'Normal']));

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
        $request->validate([
            'doctor_email' => 'required',
            'user_tc'   => 'required',
            'appt_date' => 'required',
            'appt_status',
            'appt_detail',
        ]);

        $doctor_id = Doctor::where('email',$request->input('doctor_email'))->value('id');
        $user_id = User::where('tckimlik',$request->input('user_tc'))->value('id');

        if(empty($user_id) || empty($doctor_id))
            return back()->with('error','Randevu oluşturulamadı: Doktor veya hasta bulunamadı.');

        $appointment->update(array_merge($request->all(), ['doctor_id'     => $doctor_id],
                                                          ['user_id'       => $user_id],
                                                          ['room_name'     => sha1($doctor_id.$user_id.$request->input('appt_date'))],
                                                          ['room_password' => sha1($user_id.$doctor_id.$request->input('appt_date'))]));

        return redirect()->route('admin.appointments.index')->with('success','Randevu başarıyla güncellendi.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success','Randevu başarıyla silindi.');
    }
}
