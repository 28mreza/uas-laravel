<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class KaderController extends Controller
{
    public function kader()
    {
        $data = array 
        (
            'datakader'     => DB::table('kaders')
                            ->join('posyandus','kaders.idposyandu','=','posyandus.idposyandu')
                            ->join('users','kaders.emailkader','=','users.email')
                            ->select('kaders.*','posyandus.namaposyandu','users.*')
                            ->get()
        );
        return view('kader',$data);
    }

    public function tambah()
    {
        $data = array
        (
            'datakader'     => DB::table('users')->where('akses','kader')->get(),
            'posyandu'      => DB::table('posyandus')->get(),
            'aksi'          => url('kader/submit')
        );
        return view('tambahkader',$data);
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
                        'email_verified_at' => Carbon::now(),
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
            toast('Data Berhasil Ditambahkan','success');
            return redirect('kader');
        }

    }

    public function edit($id)
    {
        $data = array
        (
            'result'            => DB::table('kaders')
                                ->join('posyandus','kaders.idposyandu','=','posyandus.idposyandu')
                                ->join('users','kaders.emailkader','=','users.email')
                                ->where('idkader',$id)
                                ->get()
        );
        return view('editkader',$data);
    }

    function update(Request $request)
    {
        $this->validate($request,[
            'foto_user' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // upload image
        $foto_user  = $request->file('foto_user');
        $foto_user->storeAs('/public/foto_user', $foto_user->hashName());

        $query_user =DB::table('users')->where('email', $request->email)->update([
                    'name'              => $request->name,
                    'username'          => $request->username,
                    'email'             => $request->email,
                    'email_verified_at' => Carbon::now(),
                    'akses'             => $request->akses,
                    'foto_user'         => $foto_user->hashName(),
                    'telepon'           => $request->telepon,
                    // 'password'          => bcrypt($request->password),
                ]);
        $query_kader=DB::table('kaders')->where('emailkader', $request->email)->update([
                    'idposyandu'        => $request->idposyandu,
                    'emailkader'        => $request->email,
                    'pendidikankader'   => $request->pendidikankader,
                    'alamatkader'       => $request->alamatkader,
            ]);

            toast('Data Berhasil Diedit','success');
            return redirect('kader');

    }

    public function delete($email)
    {
        $query_user = DB::table('users')->where('email',$email)->delete();
        $query_kader = DB::table('kaders')->where('emailkader',$email)->delete();

        if ($query_user && $query_kader)
        {
            return redirect('kader');
        }
    }

    public function status($id)
    {
        $kader = DB::table('kaders')
                ->where('idkader','=',$id)
                ->join('users','kaders.emailkader','=','users.email')
                ->select('kaders.*','users.status')
                ->first();

        // cek user status
        if($kader->status == 'aktif')
        {
            $status = 'tidak aktif';
        }else{
            $status = 'aktif';
        }

        // update status
        $values = array('status' => $status);
        DB::table('kaders')->where('idkader','=',$id)->join('users','kaders.emailkader','=','users.email')->select('kaders.*','users.status')->update($values);

        toast('Status berhasil diperbaharui','success');
        return redirect('kader');
    }

    public function reset($id)
    {
        $values = bcrypt('kader123');
        $query  = DB::table('kaders')
                ->join('users','kaders.emailkader','=','users.email')
                ->where('idkader',$id)
                ->update([
                'password'=> $values
        ]);


    if($query){
        toast('Password berhasil di reset','success');
        return redirect('kader');
    }else{
        echo 'gagal';
    }
    }
}
