<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Modulo1Controller extends Controller
{
    public function store(Request $request)
    {
        $ruta = '';
        $filenametostore = '';
       
        if($request->hasfile('myfile')){
            $filenamewithext = $request->file('myfile')->getClientOriginalName();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $ext = $request->file('myfile')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$ext;
            $ruta = $request->file('myfile')->move('storage/archivo/', $filenametostore);
        } else {
            $filenametostore = 'noimage.jpg';
        }

        $form_data = $request;
        return response()->json($filename,200);
    }

}
