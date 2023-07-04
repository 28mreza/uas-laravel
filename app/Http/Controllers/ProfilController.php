<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function profil()
    {
        return view('profil');
    }

    public function edit()
    {
        return view('editprofil');
    }

    public function update(Request $request)
    {
        auth()->user()->update([
            'name'          =>$request->name,
            'username'      =>$request->username,
            'telepon'       =>$request->telepon,
            'password'      =>bcrypt($request->password),
        ]);
        toast('Profil berhasil diedit','success');
        return redirect('profil');
    }
}
