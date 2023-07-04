<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummernoteController extends Controller
{
    public function summernote()
    {
        $data = array 
        (
            'summernote'     => DB::table('summernotes')->get()
        );
        return view('summernote',$data);
    }

    public function tambah()
    {
        $data = array
        (
            'summernote'     => DB::table('summernotes')->get(),
            'aksi'          => url('summernote/submit')
        );
        return view('tambahsummernote',$data);
    }

    function submit(Request $request)
    {
        $query =DB::table('summernotes')->insert([
                'judul'              => $request->judul,
                'deskripsi'          => $request->deskripsi,
            ]);

        if($query)
        {
            toast('Postingan Berhasil Diunggah','success');
            return redirect('summernote');
        }

    }
}
