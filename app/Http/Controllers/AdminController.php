<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function admin()
    {
        $data = array 
        (
            'dataadmin'     => DB::table('users')->where('akses','admin')->get()
        );
        return view('admin',$data);
    }

    public function tambah()
    {
        $data = array
        (
            'dataadmin'   => DB::table('users')->where('akses','admin')->get(),
            'aksi'          => url('admin/submit')
        );
        return view('tambahadmin',$data);
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
            'username.unique' => 'username tidak boleh sama',
            'email.unique'    => 'email tidak boleh sama',
            'telepon.unique'  => 'nomor telepon tidak boleh sama',
            'password.regex'  => 'password minimal 6 karakter yang terdiri dari huruf kecil huruf kapital angka dan simbol',

        ]);

        // upload image
        $foto_user  = $request->file('foto_user');
        $foto_user->storeAs('/public/foto_user', $foto_user->hashName());

        $query =DB::table('users')->insert([
                'name'              => $request->name,
                'username'          => $request->username,
                'email'             => $request->email,
                'email_verified_at' => Carbon::now(),
                'akses'             => $request->akses,
                'foto_user'         => $foto_user->hashName(),
                'telepon'           => $request->telepon,
                'password'          => bcrypt($request->password),
                'status'            => $request->status,
            ]);

        if($query)
        {
            toast('Data Berhasil Ditambahkan','success');
            return redirect('admin');
        }

    }

    public function edit($id)
    {
        $data = array(
            'result' => DB::table('users')
                ->where('id', $id)
                ->get()
        );
        return view('editadmin', $data);
    }

    function update(Request $request)
    {
        $this->validate($request,[
            'foto_user' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // upload image
        $foto_user  = $request->file('foto_user');
        $foto_user->storeAs('/public/foto_user', $foto_user->hashName());

        $query =DB::table('users')->where('id', $request->id)->update([
                'name'              => $request->name,
                'username'          => $request->username,
                'email'             => $request->email,
                'akses'             => $request->akses,
                'foto_user'         => $foto_user->hashName(),
                // 'foto_user'         => $request->foto_user,
                'telepon'           => $request->telepon,
                // 'password'          => bcrypt($request->password),
            ]);

        if($query)
        {
            toast('Data Berhasil Diedit','success');
            return redirect('admin');
        }

    }

    public function delete($id)
    {
        $query = DB::table('users')->where('id',$id)->delete();

        if ($query)
        {
            toast('Data Berhasil Dihapus','success');
            return redirect('admin');
        }
    }

    public function status($id)
    {
        $admin = DB::table('users')
                ->where('id','=',$id)
                ->first();

        // cek user status
        if($admin->status == 'aktif')
        {
            $status = 'tidak aktif';
        }else{
            $status = 'aktif';
        }

        // update status
        $values = array('status' => $status);
        DB::table('users')->where('id','=',$id)->select('users.status')->update($values);

        toast('Status berhasil diperbaharui','success');
        return redirect('admin');
    }

    public function reset($id)
    {
        $values = array('password' => bcrypt('admin123'));
        $query = DB::table('users')->where('id','=',$id)->select('users.password')->update($values);


        toast('Password berhasil di reset','success');
        return redirect('admin');
    }


    public function sensor(Request $request)
    {
        $temperature = $request->input('temperature');
        $humidity = $request->input('humidity');
        $soilMoisture = $request->input('soilMoisture');
        
        // Simpan nilai temperature, humidity, dan soilMoisture ke database menggunakan model atau query yang sesuai
        DB::table('sensors')->insert([
            'temperature' => $temperature,
            'humidity' => $humidity,
            'soil_moisture' => $soilMoisture,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        return response()->json(['message' => 'Data saved']);
    }

    
}
