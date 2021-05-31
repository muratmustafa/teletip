<?php

namespace App\Http\Controllers\Crud;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Route;

class UserCrudController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->paginate(10);

        return view('admin.users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'tckimlik' => 'required',
            'password' => 'required',
            'phone',
            'birthdate',
        ]);

        $request->merge([
            'password' => Hash::make($request->input('password')),
        ]);

        $user_id = User::where('tckimlik',$request->input('tckimlik'))->value('id');

        if(!empty($user_id))
            return back()->with('error','Hasta kaydı oluşturulamadı: Sistemde aynı T.C. kimlik numarasına sahip bir hasta mevcut.');

        User::create($request->all());

        return redirect()->route('admin.users.index')->with('success','Hasta başarıyla oluşturuldu.');
    }

    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required',
            'tckimlik' => 'required',
            'password',
            'phone',
            'birthdate',
        ]);

        if ($request->filled('password')) {
            $request->merge([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        $user_id = User::where('tckimlik',$request->input('tckimlik'))->value('id');

        if(!empty($user_id) && $user_id != $user->id)
            return back()->with('error','Hasta kaydı güncellenemedi: Sistemde aynı T.C. kimlik numarasına sahip bir hasta mevcut.');

        $user->update(array_filter($request->all()));

        return redirect()->route('admin.users.index')->with('success','Hasta başarıyla güncellendi.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success','Hasta başarıyla silindi.');
    }
}
