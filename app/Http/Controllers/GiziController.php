<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class GiziController extends Controller
{
    public function hasil()
    {
        $datagizi = DB::table('gizis')
                    ->join('balitas','gizis.idbalita','=','balitas.idbalita')
                    ->select('gizis.*','balitas.namabalita')
                    ->get();
        
        $data = array
        (
            'gizi'  => $datagizi
        );
        return view('hasiltimbangan',$data);
    }

    public function delete($id)
    {
        $query = DB::table('gizis')->where('idgizi',$id)->delete();

        if ($query)
        {
            toast('Data Berhasil Dihapus','success');
            return redirect('hasiltimbangan');
        }
    }

    public function tambahdetail($id)
    {
        $data_balita  = DB::table('balitas')->where('idbalita', $id)->get();
        $jeniskelamin = DB::table('balitas')->where('idbalita', $id)->value('jeniskelamin');


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
            'jk'            => $jeniskelamin,
            'tinggi'        => $tinggi,

            'aksi'          => url('detailbalita/submit')
        );
        return view('tambahdetailbalita',$data);
    }

    function submitdetail(Request $request, $id)
    {
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

        $tb=(double)$request->tinggi;
        $bb=(double)$request->berat;
        $umur=$request->umur;
        $jk=$request->jeniskelamin;
        // $nobalita=$request->input("no_balita");
        // $tahun=Session::get('tahun');
        // $bulan=Session::get('bulan');

        $tinggibadan = number_format($tb, 1);
        $sub_tinggi = substr($tinggibadan, -1);
        $sub_tinggi1 = substr($tinggibadan, -2);
        if ($sub_tinggi == 5 or $sub_tinggi == 0) {
            $hasil = $tb;

        } else if ($sub_tinggi < 5 and $sub_tinggi > 0) {
            $hasil = $tb - $sub_tinggi1;
        } else if ($sub_tinggi > 5 and $sub_tinggi <= 9) {
            $hasil = $tb + (1 - $sub_tinggi1);
        }
        $tb2 = $hasil;
        $mintiga = -3;
        $mintiga = number_format($mintiga, 0);
        $tiga = 3;
        $tiga = number_format($tiga, 0);
        $mindua = -2;
        $mindua = number_format($mindua, 0);
        $dua = 2;
        $dua = number_format($dua, 0);
        // $dataketerangan=$this->cekketerangan($kbm,$bulan,$tahun,$nobalita,$umur,$bb);
        // if($dataketerangan==null){
        //     $keterangan='TD';
        // }else{
        //     $keterangan=$dataketerangan;
        // }
        if ($jk == 'laki-laki') {
            $bbu=DB::table('bbu_laki')->where('umur',$umur)->first();
            $tbu=DB::table('tbu_laki')->where('umur',$umur)->first();
            $bbtbtel=DB::table('bbtb_laki')->where('pjg_tg_badan',$tb2)->first();
            $bbtbber=DB::table('bbtb_laki')->where('pjg_tg_badan',$tb2)->first();
            //menghitung bbu
            if ($bbu) {
                //ambil nilai-nilai range
                $median = $bbu->median;
                $sd1 = $bbu->sd1;
                $sd2 = $bbu->sd2;
                $sd3 = $bbu->sd3;
                $min1sd = $bbu->min1sd;
                $min2sd = $bbu->min2sd;
                $min3sd = $bbu->min3sd;


                //mengecek status bu
                if ($bb <= $min3sd) {
                    $statusbbul = 'Berat Badan Sangat Kurang';
                } else if (($bb > $min3sd) AND ($bb <= $min2sd)) {
                    $statusbbul = 'Berat Badan Kurang';
                } else if (($bb > $min2sd) AND ($bb <= $sd2)) {
                    $statusbbul = 'Berat Badan Normal';
                } else if ($bb > $sd2) {
                    $statusbbul = 'Resiko Berat Badan Lebih';
                } else {
                    $statusbbul = 'error';
                }
            } else {
                $statusbbul = 'Data bbU Tidak Ada';
            }
            //menghitung tbu
            if ($tbu) {
                $tmedian = $tbu->median;
                $tsd1 = $tbu->sd1;
                $tsd2 = $tbu->sd2;
                $tsd3 = $tbu->sd3;
                $tmin1sd = $tbu->min1sd;
                $tmin2sd = $tbu->min2sd;
                $tmin3sd = $tbu->min3sd;
            
            
                //mengecek status tbu
                if ($tb <= $tmin3sd) {
                    $statustbul = 'Sangat Pendek';
                } else if (($tb > $tmin3sd) AND ($tb <= $tmin2sd)) {
                    $statustbul = 'Pendek';
                } else if (($tb > $tmin2sd) AND ($tb <= $tsd2)) {
                    $statustbul = 'Normal';
                } else if ($tb > $tsd2) {
                    $statustbul = 'Tinggi';
                } else {
                    $statustbul = 'error';
                }
            } else {
                $statustbul = 'Data TBU Tidak Ada';
            }

            //menghitung bbtb
            if ($umur >= 0 and $umur <= 24) {
                if ($bbtbtel) {
                    $tlmedian = $bbtbtel->median;
                    $tlsd1 = $bbtbtel->sd1;
                    $tlsd2 = $bbtbtel->sd2;
                    $tlsd3 = $bbtbtel->sd3;
                    $tlmin1sd = $bbtbtel->min1sd;
                    $tlmin2sd = $bbtbtel->min2sd;
                    $tlmin3sd = $bbtbtel->min3sd;
            
            
                    //mengecek status bbtb
                    if ($bb <= $tlmin3sd) {
                        $statusbbtbl = 'Gizi Buruk';
                    } else if (($bb > $tlmin3sd) AND ($bb <= $tlmin2sd)) {
                        $statusbbtbl = 'Gizi Kurang';
                    } else if (($bb > $tlmin2sd) AND ($bb <= $tlsd1)) {
                        $statusbbtbl = 'Gizi Baik';
                    } else if (($bb > $tlsd1) and ($bb <= $tlsd2)) {
                        $statusbbtbl = 'Berisiko Gizi Lebih';
                    }else if (($bb > $tlsd2) and ($bb <= $tlsd3)) {
                        $statusbbtbl = 'Gizi Lebih';
                    }else if ($bb > $tlsd3) {
                        $statusbbtbl = 'Obesitas';
                    } else {
                        $statusbbtbl = 'error';
                    }
                } else {
                    $statusbbtbl = 'Data bbTB Tidak Ada';
                }
            } else if ($umur >= 25 and $umur <= 60) {
                if ($bbtbber) {
                    $tlmedian = $bbtbber->median;
                    $tlsd1 = $bbtbber->sd1;
                    $tlsd2 = $bbtbber->sd2;
                    $tlsd3 = $bbtbber->sd3;
                    $tlmin1sd = $bbtbber->min1sd;
                    $tlmin2sd = $bbtbber->min2sd;
                    $tlmin3sd = $bbtbber->min3sd;


                    //mengecek status bbtb
                    if ($bb <= $tlmin3sd) {
                        $statusbbtbl = 'Gizi Buruk';
                    } else if (($bb > $tlmin3sd) AND ($bb <= $tlmin2sd)) {
                        $statusbbtbl = 'Gizi Kurang';
                    } else if (($bb > $tlmin2sd) AND ($bb <= $tlsd1)) {
                        $statusbbtbl = 'Gizi Baik';
                    } else if (($bb > $tlsd1) and ($bb <= $tlsd2)) {
                        $statusbbtbl = 'Berisiko Gizi Lebih';
                    }else if (($bb > $tlsd2) and ($bb <= $tlsd3)) {
                        $statusbbtbl = 'Gizi Lebih';
                    }else if ($bb > $tlsd3) {
                        $statusbbtbl = 'Obesitas';
                    } else {
                        $statusbbtbl = 'error';
                    }
                } else {
                    $statusbbtbl = 'Data bbTB Tidak Ada';
                }
            }
        } else if ($jk == 'perempuan') {

            $bbu=DB::table('bbu_perempuan')->where('umur', $umur)->first();
            $tbu=DB::table('tbu_perempuan')->where('umur', $umur)->first();
            $bbtbtel=DB::table('bbtb_perempuan')->where("pjg_tg_badan",$tb2)->first();
            $bbtbber=DB::table('bbtb_perempuan')->where("pjg_tg_badan",$tb2)->first();
            //menghitung bbu
            if ($bbu) {
                //ambil nilai-nilai range
                $median = $bbu->median;
                $sd1 = $bbu->sd1;
                $sd2 = $bbu->sd2;
                $sd3 = $bbu->sd3;
                $min1sd = $bbu->min1sd;
                $min2sd = $bbu->min2sd;
                $min3sd = $bbu->min3sd;


                //mengecek status bu
                if ($bb <= $min3sd) {
                    $statusbbul = 'Berat Badan Sangat Kurang';
                } else if (($bb > $min3sd) AND ($bb <= $min2sd)) {
                    $statusbbul = 'Berat Badan Kurang';
                } else if (($bb > $min2sd) AND ($bb <= $sd2)) {
                    $statusbbul = 'Berat Badan Normal';
                } else if ($bb > $sd2) {
                    $statusbbul = 'Resiko Berat Badan Lebih';
                } else {
                    $statusbbul = 'error';
                }
            } else {
                $statusbbul = 'Data bbU Tidak Ada';
            }

            //menghitung tbu
            if ($tbu) {
                $tmedian = $tbu->median;
                $tsd1 = $tbu->sd1;
                $tsd2 = $tbu->sd2;
                $tsd3 = $tbu->sd3;
                $tmin1sd = $tbu->min1sd;
                $tmin2sd = $tbu->min2sd;
                $tmin3sd = $tbu->min3sd;


                //mengecek status tbu
                if ($tb <= $tmin3sd) {
                    $statustbul = 'Sangat Pendek';
                } else if (($tb > $tmin3sd) AND ($tb <= $tmin2sd)) {
                    $statustbul = 'Pendek';
                } else if (($tb > $tmin2sd) AND ($tb <= $tsd2)) {
                    $statustbul = 'Normal';
                } else if ($tb > $tsd2) {
                    $statustbul = 'Tinggi';
                } else {
                    $statustbul = 'error';
                }
            } else {
                $statustbul = 'Data TBU Tidak Ada';
            }

            //menghitung bbtb
            if ($umur >= 0 and $umur <= 24) {
                if ($bbtbtel) {
                    $tlmedian = $bbtbtel->median;
                    $tlsd1 = $bbtbtel->sd1;
                    $tlsd2 = $bbtbtel->sd2;
                    $tlsd3 = $bbtbtel->sd3;
                    $tlmin1sd = $bbtbtel->min1sd;
                    $tlmin2sd = $bbtbtel->min2sd;
                    $tlmin3sd = $bbtbtel->min3sd;


                    //mengecek status bbtb
                    if ($bb <= $tlmin3sd) {
                        $statusbbtbl = 'Gizi Buruk';
                    } else if (($bb > $tlmin3sd) AND ($bb <= $tlmin2sd)) {
                        $statusbbtbl = 'Gizi Kurang';
                    } else if (($bb > $tlmin2sd) AND ($bb <= $tlsd1)) {
                        $statusbbtbl = 'Gizi Baik';
                    } else if (($bb > $tlsd1) and ($bb <= $tlsd2)) {
                        $statusbbtbl = 'Berisiko Gizi Lebih';
                    }else if (($bb > $tlsd2) and ($bb <= $tlsd3)) {
                        $statusbbtbl = 'Gizi Lebih';
                    }else if ($bb > $tlsd3) {
                        $statusbbtbl = 'Obesitas';
                    } else {
                        $statusbbtbl = 'error';
                    }

                } else {
                    $statusbbtbl = 'Data bbTB Tidak Ada';
                }
            } else if ($umur >= 25 and $umur <= 60) {
                if ($bbtbber) {
                    $tlmedian = $bbtbber->median;
                    $tlsd1 = $bbtbber->sd1;
                    $tlsd2 = $bbtbber->sd2;
                    $tlsd3 = $bbtbber->sd3;
                    $tlmin1sd = $bbtbber->min1sd;
                    $tlmin2sd = $bbtbber->min2sd;
                    $tlmin3sd = $bbtbber->min3sd;


                    //mengecek status bbtb
                    if ($bb <= $tlmin3sd) {
                        $statusbbtbl = 'Gizi Buruk';
                    } else if (($bb > $tlmin3sd) AND ($bb <= $tlmin2sd)) {
                        $statusbbtbl = 'Gizi Kurang';
                    } else if (($bb > $tlmin2sd) AND ($bb <= $tlsd1)) {
                        $statusbbtbl = 'Gizi Baik';
                    } else if (($bb > $tlsd1) and ($bb <= $tlsd2)) {
                        $statusbbtbl = 'Berisiko Gizi Lebih';
                    }else if (($bb > $tlsd2) and ($bb <= $tlsd3)) {
                        $statusbbtbl = 'Gizi Lebih';
                    }else if ($bb > $tlsd3) {
                        $statusbbtbl = 'Obesitas';
                    } else {
                        $statusbbtbl = 'error';
                    }
                } else {
                    $statusbbtbl = 'Data bbTB Tidak Ada';
                }
            }


        } else {
            $bb = '0';
            $tb = '0';
            $statusbbul = '0';
            $statustbul = '0';
            $statusbbtbl = '0';

        }

        $query  = DB::table('gizis')->insert([
            'idbalita'          => $request->idbalita,
            // 'tanggaltimbang'    => Carbon::createFromFormat('d/m/Y', $request->tanggaltimbang)->format('Y-m-d'),
            'tanggaltimbang'    => $tanggaltimbang,
            'tinggibadan'       => $tb,
            'beratbadan'        => $bb,
            'statusbb'          => $statusbbul,
            'statustb'          => $statustbul,
            'status'            => $statusbbtbl,
        ]);

        if($query)
        {
            toast('Detail Balita Ditambahkan','success');
            return redirect('balita');
        }
    }
}
