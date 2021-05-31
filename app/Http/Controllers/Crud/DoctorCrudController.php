<?php

namespace App\Http\Controllers\Crud;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Route;

class DoctorCrudController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest('id')->paginate(10);

        return view('admin.doctors.index',compact('doctors'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'branch',
        ]);

        $request->merge([
            'password' => Hash::make($request->input('password')),
        ]);

        $doctor_id = Doctor::where('email',$request->input('email'))->value('id');

        if(!empty($doctor_id))
            return back()->with('error','Doktor kaydı oluşturulamadı: Sistemde aynı e-posta adresine sahip bir doktor mevcut.');

        Doctor::create($request->all());

        return redirect()->route('admin.doctors.index')->with('success','Doktor başarıyla oluşturuldu.');
    }

    public function show(Doctor $doctor)
    {
        return view('admin.doctors.show',compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit',compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password',
            'branch',
        ]);

        if ($request->filled('password')) {
            $request->merge([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        $doctor_id = Doctor::where('email',$request->input('email'))->value('id');

        if(!empty($doctor_id) && $doctor_id != $doctor->id)
            return back()->with('error','Doktor kaydı güncellenemedi: Sistemde aynı e-posta adresine sahip bir doktor mevcut.');

        $doctor->update(array_filter($request->all()));

        return redirect()->route('admin.doctors.index')->with('success','Doktor başarıyla güncellendi.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success','Doktor başarıyla silindi.');
    }
}
