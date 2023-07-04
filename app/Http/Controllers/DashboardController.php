<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function dashboard()
    {
        $data = array
        (
            'posyandu'      => DB::table('posyandus')->count(),
            'kader'         => DB::table('users')->where('akses','kader')->count(),
            'balita'        => DB::table('balitas')->count(),
            'gizi'          => DB::table('gizis')->count(),
        );
        return view('dashboard', $data);
    }
}
