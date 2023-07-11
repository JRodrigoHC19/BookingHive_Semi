<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Foto;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{

    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/fotos'), $fileName);
            
            
            $foto = new Foto;
            $foto->nombre = $fileName;
            $foto->email = auth()->user()->email;
            $foto->save();


            return redirect()->back();
        }
        
        return 'No se seleccionó ninguna foto';
    }
}




        