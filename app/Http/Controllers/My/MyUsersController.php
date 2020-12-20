<?php

namespace App\Http\Controllers\My;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use Auth;
use Route;

class MyUsersController extends Controller
{
    public function index()
    {
        $users = User::whereIn('id', function($query){

            $query->select('user_id')->from('appointments')->where('doctor_id', Auth::guard('doctor')->user()->id)->groupBy('user_id');

        })->latest('id')->paginate(10);

        return view('doctor.users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function show(User $user)
    {
        return view('doctor.users.show',compact('user'));
    }
}
