<?php

namespace App\Http\Controllers\My;

use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class MyReportsController extends Controller
{
    public function index()
    {
        $files = File::where('user_id', Auth::guard('user')->user()->id)->latest('id')->paginate(10);

        return view('user.reports.index',compact('files'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
