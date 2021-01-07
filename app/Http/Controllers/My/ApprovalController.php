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
        $approval = $request->session()->get('approval');

        return view('user.appointments.approval.step-two',compact('approval','id'));
    }

    public function postStepTwo(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_approval'   => 'nullable|boolean',
        ]);

        $approval = $request->session()->get('approval');
        $approval->fill($validatedData);
        $request->session()->put('approval', $approval);

        return redirect()->route('user.approval.step.three',$id);
    }

    public function stepThree(Request $request, $id)
    {
        $approval = $request->session()->get('approval');

        return view('user.appointments.approval.step-three',compact('approval','id'));
    }

    public function postStepThree(Request $request, $id)
    {
        $approval = $request->session()->get('approval');
        $approval->fill(['room_id' => $id]);
        $approval->save();

        $request->session()->forget('approval');

        $room_name = \App\Models\Appointment::where('id', $id)->value('room_name');

        return redirect()->away('https://metabolizmateletip.ankara.edu.tr:90/'.$room_name);
    }
}
