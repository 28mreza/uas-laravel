<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BalitaController extends Controller
{
    // balita
    public function balita()
    {
        if(Auth::check() && Auth::user()->akses == 'admin')
        {
            $balita         = DB::table('balitas')
                            ->join('posyandus','balitas.idposyandu','=','posyandus.idposyandu')
                            ->select('balitas.*','posyandus.namaposyandu')
                            ->get();
        }
        else
        {
            $balita         = DB::table('balitas')->where('emailkader', Auth::user()->email)
                            ->join('posyandus','balitas.idposyandu','=','posyandus.idposyandu')
                            ->join('kaders','balitas.idposyandu','=','kaders.idposyandu')
                            ->select('balitas.*','posyandus.namaposyandu','kaders.emailkader', DB::raw("DATE_FORMAT(tanggallahir, '%d %M %Y') AS tanggal_lahir"))
                            ->get();
        }

        $data = array 
        (
            'databalita'     => $balita
        );
        return view('balita',$data);
    }

    public function tambah()
    {
        $data_posyandu   = DB::table('posyandus')
                        ->join('kaders', 'posyandus.idposyandu', '=', 'kaders.idposyandu')
                        ->where('kaders.emailkader', Auth::user()->email)
                        ->select('posyandus.*')
                        ->get();
        $data_balita    = DB::table('balitas')->get();

        $data = array
        (
            'dataposyandu'  => $data_posyandu,
            'databalita'    => $data_balita,
            'aksi'          => url('balita/submit')
        );
        return view('tambahbalita',$data);
    }

    function submit(Request $request)
    {
        $this->validate($request,[
            'namaibu'       => 'required',
            'nikibu'        => 'required|unique:balitas,nikibu',
            'alamatibu'     => 'required',
            'namaayah'      => 'required',
            'nikayah'       => 'required|unique:balitas,nikayah',
            'alamatayah'    => 'required',
            'namabalita'    => 'required',
            'tanggallahir'  => 'required|date',
            'jeniskelamin'  => 'required',
            'statusasi'     => 'required',
            'beratlahir'    => 'required|numeric',
            'tinggilahir'   => 'required|numeric',
            'statussosial'  => 'required',
            'alamatbalita'  => 'required',

        ],
        [
            'namaibu.required'      => 'nama ibu harus diisi',
            'nikibu.unique'         => 'NIK ibu tidak boleh sama',
            'alamatibu.required'    => 'alamat ibu harus diisi',
            'namaayah.required'     => 'nama ayah harus diisi',
            'nikayah.unique'        => 'NIK ayah tidak boleh sama',
            'alamatayah.required'   => 'alamat ayah harus diisi',
            'namabalita.required'   => 'nama balita harus diisi',
            'tanggallahir.date'     => 'tanggal lahir harus diisi',
            'jeniskelamin.required' => 'jenis kelamin harus diisi',
            'statusasi.required'    => 'status asi harus diisi',
            'beratlahir.required'   => 'berat lahir harus diisi',
            'tinggilahir.required'  => 'panjang lahir harus diisi',
            'statussosial.required' => 'status sosial harus diisi',
            'alamatbalita.required' => 'alamat balita harus diisi',

        ]);

        $query =DB::table('balitas')->insert([
                'idposyandu'        => $request->idposyandu,
                'namaibu'           => $request->namaibu,
                'nikibu'            => $request->nikibu,
                'alamatibu'         => $request->alamatibu,
                'namaayah'          => $request->namaayah,
                'nikayah'           => $request->nikayah,
                'alamatayah'        => $request->alamatayah,
                'namabalita'        => $request->namabalita,
                'tanggallahir'      => Carbon::createFromFormat('d/m/Y', $request->tanggallahir)->format('Y-m-d'),
                'jeniskelamin'      => $request->jeniskelamin,
                'statusasi'         => $request->statusasi,
                'beratlahir'        => (double)$request->beratlahir,
                'tinggilahir'       => (double)$request->tinggilahir,
                'statussosial'      => $request->statussosial,
                'alamatbalita'      => $request->alamatbalita,
            ]);

        if($query)
        {
            toast('Data Berhasil Ditambahkan','success');
            return redirect('balita');
        }

    }

    public function edit($id)
    {
        $data = array
        (
            'result'       => DB::table('balitas')
                                ->where('idbalita',$id)
                                ->get(),
            'posyandu'     => DB::table('posyandus')->get()
        );
        return view('editbalita',$data);
    }

    function update(Request $request)
    {
        $query =DB::table('balitas')->where('idbalita', $request->id)->update([
            'idposyandu'        => $request->idposyandu,
            'namaibu'           => $request->namaibu,
            'nikibu'            => $request->nikibu,
            'alamatibu'         => $request->alamatibu,
            'namaayah'          => $request->namaayah,
            'nikayah'           => $request->nikayah,
            'alamatayah'        => $request->alamatayah,
            'namabalita'        => $request->namabalita,
            'tanggallahir'      => $request->tanggallahir,
            'jeniskelamin'      => $request->jeniskelamin,
            'statusasi'         => $request->statusasi,
            'beratlahir'        => (double)$request->beratlahir,
            'tinggilahir'       => (double)$request->tinggilahir,
            'statussosial'      => $request->statussosial,
            'alamatbalita'      => $request->alamatbalita,
            ]);

        if($query)
        {
            toast('Data Berhasil Diedit','success');
            return redirect('balita');
        }

    }

    public function delete($id)
    {
        $query = DB::table('balitas')->where('idbalita',$id)->delete();

        if ($query)
        {
            toast('Data Berhasil Dihapus','success');
            return redirect('balita');
        }
    }

    public function tambahdetail($id)
    {
        $data_balita  = DB::table('balitas')->where('idbalita', $id)->get();

        $balita = DB::table('balitas')->select('tanggallahir')->where('idbalita', $id)->get();
        $tanggalLahir = $balita->first()->tanggallahir;

        $carbonTanggal = Carbon::createFromFormat('Y-m-d', $tanggalLahir);

        $data_umur = $carbonTanggal->age;
        $data_hari = $carbonTanggal->englishDayOfWeek;
        $data_bulan = $carbonTanggal->diffInMonths(Carbon::now());
        $data_tahun = $carbonTanggal->year;

        // datasensor
        $tinggi = DB::table('sensors')->value('tinggi');


        $data = array
        (
            'databalita'    => $data_balita,
            'umur'          => $data_bulan,
            'tinggi'        => $tinggi,

            'aksi'          => url('detailbalita/submit')
        );
        return view('tambahdetailbalita',$data);
    }

    function submitdetail(Request $request, $id)
    {

        // $bulan = $request->input('bulan');
        
        // // Periksa apakah bulan saat ini sama dengan bulan yang diinputkan
        // if (date('n') == $bulan) {
        //     // Lakukan aksi yang diinginkan jika bulan saat ini sama dengan bulan yang diinputkan
        //     $tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggaltimbang)->format('Y-m-d');
        // } else {
        //     // Lakukan aksi jika bulan saat ini tidak sama dengan bulan yang diinputkan
        //     Alert::warning('Bulan yang diinputkan bukan bulan saat ini.')->persistent(true);
        //     return redirect()->back();
        // }
        $tanggaltimbang = now()->format('Y-m-d');
        $existingInput = DB::table('gizis')
                        ->where('idbalita', $id)
                        ->where('tanggaltimbang', $tanggaltimbang)
                        ->exists();
        
        if ($existingInput) {
            Alert::error('Error', 'Inputan untuk balita ini pada bulan ini sudah ada.')
                ->persistent(true)
                ->autoClose(5000);
            return redirect()->back();
        }



        // =====================================
        $umur   = $request->umur;
        // $tinggi = $request->tinggibadan;
        // $berat  = $request->beratbadan;
        $tinggi = $request->input('tinggi');
        $berat = $request->input('berat');

        // Panggil fungsi untuk menghitung status gizi
        $statusGizi = hitungStatusGizi($umur, $berat, $tinggi);

        $query  = DB::table('gizis')->insert([
            'idbalita'          => $request->idbalita,
            // 'tanggaltimbang'    => Carbon::createFromFormat('d/m/Y', $request->tanggaltimbang)->format('Y-m-d'),
            'tanggaltimbang'    => $tanggaltimbang,
            'tinggibadan'       => (double)$tinggi,
            'beratbadan'        => (double)$berat,
            'status'            => $statusGizi,
        ]);

        if($query)
        {
            toast('Detail Balita Ditambahkan','success');
            return redirect('balita');
        }
    }

    public function detail($id)
    {
        $datagizi = DB::table('gizis')->where('gizis.idbalita', $id)
                    ->join('balitas','gizis.idbalita','=','balitas.idbalita')
                    ->select('gizis.*','balitas.namabalita')
                    ->get();
        
        $data = array
        (
            'gizi'  => $datagizi
        );
        return view('detailbalita',$data);
    }

    public function updateSensor(Request $request)
    {
        if ($request->has('tinggi')) {
            $tinggi = $request->input('tinggi');

            // DB::table('sensors')->update(['tinggi' => $tinggi]);

            // Jika ingin menggunakan metode INSERT jika data belum ada sebelumnya
            DB::table('sensors')->insert(['tinggi' => $tinggi]);

            return redirect()->back(); // Mengarahkan pengguna kembali ke halaman sebelumnya
        }
    }
}
