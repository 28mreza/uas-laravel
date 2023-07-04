<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register()
    {
        $data = array
        (
            'datakader'     => DB::table('users')->where('akses','kader')->get(),
            'posyandu'      => DB::table('posyandus')->get(),
            'aksi'          => url('registrasi/submit')
        );
        return view('auth.register',$data);
    }

    function submit(Request $request)
    {
        $this->validate($request,[
            'foto_user' => 'required|image|mimes:png,jpg,jpeg',
            'username'  => 'required|unique:users,username',
            'email'     => 'required|unique:users,email',
            'telepon'   => 'required|numeric|unique:users,telepon',
            'password'  => 'required|min:6|regex:/^(?=.*[a-zA-Z])(?=.*\d)/',
        ],
        [
            'username.unique'   => 'username tidak boleh sama',
            'email.unique'      => 'email tidak boleh sama',
            'emailkader.unique' => 'email tidak boleh sama',
            'telepon.unique'    => 'nomor telepon tidak boleh sama',
            'password.regex'    => 'password minimal 6 karakter yang terdiri dari huruf kecil huruf kapital angka dan simbol',
        ]);

        // upload image
        $foto_user  = $request->file('foto_user');
        $foto_user->storeAs('/public/foto_user', $foto_user->hashName());
        $query_user     =DB::table('users')->insert([
                        'name'              => $request->name, 
                        'username'          => $request->username,
                        'email'             => $request->email,
                        'akses'             => $request->akses,
                        'foto_user'         => $foto_user->hashName(),
                        'telepon'           => $request->telepon,
                        'password'          => bcrypt($request->password),
                        'status'            => $request->status,
            ]);
        $query_kader    =DB::table('kaders')->insert([
                        'idposyandu'        => $request->idposyandu,
                        'emailkader'        => $request->email,
                        'pendidikankader'   => $request->pendidikankader,
                        'alamatkader'       => $request->alamatkader,
            ]);

        if($query_user && $query_kader)
        {
            return redirect('login');
        }

    }
}
