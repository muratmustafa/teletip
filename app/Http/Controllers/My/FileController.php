<?php

namespace App\Http\Controllers\My;

use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class FileController extends Controller
{
    public function upload(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'file' => 'required|mimes:doc,docx,pdf|max:5120',
        ]);

        $fileName = date('YmdHis').'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        $file = new File();
        $file->fill($validatedData);
        $file->file_name = $fileName;
        $file->user_id = $id;

        $file->save();

        return back()
            ->with('success','Dosya başarıyla yüklendi.');
    }
}
