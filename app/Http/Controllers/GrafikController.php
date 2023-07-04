<?php

namespace App\Http\Controllers;

use App\Charts\BeratBadanChart;
use App\Charts\GiziChart;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function grafik(GiziChart $GiziChart)
    {
        $data = array 
        (
            'GiziChart'     => $GiziChart->build()
        );
        return view('grafikberat', $data);
    }
}
