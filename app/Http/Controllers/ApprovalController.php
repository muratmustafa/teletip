<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Approval;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class ApprovalController extends Controller
{
    public function index()
    {
        $approvals = Approval::latest('id')->paginate(10);

        return view('user.appointments.approval.index',compact('approvals'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function stepOne(Request $request, $id)
    {
        $today = date("Y-m-d");
        $appt_date = Appointment::where('id', $id)->value('appt_date');
        $appt_date = \Carbon\Carbon::parse($appt_date)->format('Y-m-d');
        $appt_status = Appointment::where('id', $id)->value('appt_status');

        if ($appt_date !== $today || $appt_status !== "Normal")
            return back()->with('error','Görüşmeye katılamazsınız.');

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

        return redirect()->route('user.approval.step.last',$id);
    }

    public function stepLast(Request $request, $id)
    {
        $room_id = Approval::where('room_id',$id)->value('id');

        if(empty($room_id))
            return redirect()->route('user.approval.step.one',$id);

        $room_name = Appointment::where('id',$id)->value('room_name');

        return view('user.appointments.approval.step-last',compact('id','room_name'));
    }
}
