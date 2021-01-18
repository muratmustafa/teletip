<?php

namespace App\Http\Controllers\My;

use App\Models\Approval;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class ApprovalController extends Controller
{
    public function index()
    {
        $approvals = Approval::all();

        return view('user.appointments.approval.index',compact('approvals'));
    }

    public function stepOne(Request $request, $id)
    {
        $today = date("Y-m-d");
        $appt_date = \App\Models\Appointment::where('id', $id)->value('appt_date');
        $appt_status = \App\Models\Appointment::where('id', $id)->value('appt_status');
        $appt_date = \Carbon\Carbon::parse($appt_date)->format('Y-m-d');

        if (!($appt_date === $today) || !($appt_status === "Normal"))
            return redirect()->route('user.appointments.index');

        $approval = $request->session()->get('approval');

        return view('user.appointments.approval.step-one',compact('approval','id'));
    }

    public function postStepOne(Request $request, $id)
    {
        $validatedData = $request->validate([
            'parent_degree'          => 'required|string',
            'parent_name'            => 'required|string',
            'parent_approval'        => 'required|boolean',
            'other_parent_degree'    => 'nullable|string',
            'other_parent_name'      => 'nullable|string',
            'other_parent_approval'  => 'nullable|boolean',
        ]);

        if(empty($validatedData['other_parent_approval']))
            $validatedData['other_parent_approval'] = '0';

        if(empty($request->session()->get('approval'))){
            $approval = new Approval();
            $approval->fill($validatedData);
            $request->session()->put('approval', $approval);
        }else{
            $approval = $request->session()->get('approval');
            $approval->fill($validatedData);
            $request->session()->put('approval', $approval);
        }

        return redirect()->route('user.approval.step.two',$id);
    }

    public function stepTwo(Request $request, $id)
    {
        if(empty($request->session()->get('approval')))
            return redirect()->route('user.approval.step.one',$id);

        $approval = $request->session()->get('approval');

        return view('user.appointments.approval.step-two',compact('approval','id'));
    }

    public function postStepTwo(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_approval'   => 'nullable|boolean',
        ]);

        if(empty($validatedData['user_approval']))
            $validatedData['user_approval'] = '0';

        $approval = $request->session()->get('approval');
        $approval->fill($validatedData);
        $request->session()->put('approval', $approval);

        return redirect()->route('user.approval.step.three',$id);
    }

    public function stepThree(Request $request, $id)
    {
        if(empty($request->session()->get('approval')))
            return redirect()->route('user.approval.step.one',$id);

        $approval = $request->session()->get('approval');

        return view('user.appointments.approval.step-three',compact('approval','id'));
    }

    public function postStepThree(Request $request, $id)
    {
        $approval = $request->session()->get('approval');
        $approval = Approval::updateOrCreate(['room_id' => $id], $approval->toArray());

        $request->session()->forget('approval');

        $room_name = \App\Models\Appointment::where('id', $id)->value('room_name');

        return redirect()->away('https://metabolizmateletip.ankara.edu.tr:44444/'.$room_name);
    }
}
