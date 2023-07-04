<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosyanduController extends Controller
{
    public function posyandu()
    {
        $data = array(
            'dataposyandu' => DB::table('posyandus')->get()
        );
        return view('posyandu', $data);
    }

    public function tambah()
    {
        $data_posyandu  = DB::table('posyandus')->get();

        $data = array
        (
            'dataposyandu'  => $data_posyandu,
            'aksi'          => url('posyandu/submit')
        );
        return view('tambahposyandu',$data);
    }

    function submit(Request $request)
    {
        $this->validate($request,[
            'namaposyandu'          => 'required|unique:posyandus,namaposyandu',
            'alamatposyandu'        => 'required|unique:posyandus,alamatposyandu',
            'teleponposyandu'       => 'required|numeric|unique:posyandus,teleponposyandu',

        ],
        [
            'namaposyandu.unique'   => 'nama posyandu tidak boleh sama',
            'alamatposyandu.unique' => 'alamat posyandu tidak boleh sama',
            'teleponposyandu.unique'=> 'nomor telepon tidak boleh sama',

        ]);
        $query =DB::table('posyandus')->insert([
                'namaposyandu'            => $request->namaposyandu,
                'alamatposyandu'          => $request->alamatposyandu,
                'teleponposyandu'         => $request->teleponposyandu,
            ]);

        if($query)
        {
            toast('Data Berhasil Ditambahkan','success');
            return redirect('posyandu');
        }

    }

    public function edit($id)
    {
        $data = array
        (
            'result'       => DB::table('posyandus')->where('idposyandu',$id)->get()
        );
        return view('editposyandu',$data);
    }

    function update(Request $request)
    {
        $query =DB::table('posyandus')->where('idposyandu', $request->id)->update([
                'namaposyandu'            => $request->namaposyandu,
                'alamatposyandu'          => $request->alamatposyandu,
                'teleponposyandu'         => $request->teleponposyandu,
            ]);

        if($query)
        {
            toast('Data Berhasil Diedit','success');
            return redirect('posyandu');
        }

    }

    public function delete($id)
    {
        $query = DB::table('posyandus')->where('idposyandu',$id)->delete();

        if ($query)
        {
            toast('Data Berhasil Dihapus','success');
            return redirect('posyandu');
        }
    }

    public function tambahdetail($id)
    {
        $data_posyandu  = DB::table('posyandus')->where('idposyandu', $id)->get();
        $data_kader     = DB::table('users')->where('akses', 'kader')->get();

        $data = array
        (
            'dataposyandu'  => $data_posyandu,
            'datakader'     => $data_kader,
            'aksi'          => url('detailposyandu/submit')
        );
        return view('tambahdetailposyandu',$data);
    }

    function submitdetail(Request $request)
    {
        $query  = DB::table('detail_posyandus')->insert([
            'idposyandu'    => $request->idposyandu,
            'id'            => $request->id,
        ]);

        if($query)
        {
            toast('Detail Posyandu Ditambahkan','success');
            return redirect('posyandu');
        }
    }

    public function detail($id)
    {
        $data_posyandu  = DB::table('posyandus')->where('idposyandu', $id)->get();
        $data_kader     = DB::table('users')->where('akses', 'kader')->get();
        $data_detail    = DB::table('detail_posyandus')->where('detail_posyandus.idposyandu', $id)
                        ->join('posyandus','detail_posyandus.idposyandu', 'posyandus.idposyandu')                
                        ->join('users','detail_posyandus.id', 'users.id')
                        ->get();

        $data = array
        (
            'dataposyandu'  => $data_posyandu,
            'datakader'     => $data_kader,
            'detailposyandu' => $data_detail,
        );
        return view('detailposyandu',$data);
    }




}
