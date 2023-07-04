<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SensorController extends Controller
{
    public function getTinggi()
    {
        $tinggi = DB::table('sensors')->value('tinggi');
        return response()->json($tinggi);
    }

    public function getBerat()
    {
        $berat = DB::table('sensors')->value('berat');
        return response()->json($berat);
    }

    // public function updateSensor(Request $request)
    // {
    //     Session::start();
    //     $tinggi = $request->input('tinggi');
    //     $berat = $request->input('berat');

    //     // Lakukan operasi yang diperlukan dengan data yang diterima

    //     // Contoh: Update data di database menggunakan Query Builder
    //     DB::table('sensors')->update(['tinggi' => $tinggi, 'berat' => $berat]);

    //     // Kirim respon sukses ke Arduino
    //     return response()->json(['success' => true]);
    // }

    public function simpansensor()
    {
        DB::table('sensors')->update(['tinggi' => request()->nilaitinggi, 'berat' => request()->nilaiberat]);
    }
}
