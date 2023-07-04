<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class GiziChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $balita = DB::table('gizis')
                ->join('balitas','gizis.idbalita','=','balitas.idbalita')
                ->select('gizis.*','balitas.*')
                ->get();
        $statuslaki = [
            $balita->where('status', 'Kurang Gizi')->where('jeniskelamin', 'laki-laki')->count(),
            $balita->where('status', 'Normal')->where('jeniskelamin', 'laki-laki')->count(),
            $balita->where('status', 'Obesitas')->where('jeniskelamin', 'laki-laki')->count(),
        ];
        $statuscewe = [
            $balita->where('status', 'Kurang Gizi')->where('jeniskelamin', 'perempuan')->count(),
            $balita->where('status', 'Normal')->where('jeniskelamin', 'perempuan')->count(),
            $balita->where('status', 'Obesitas')->where('jeniskelamin', 'perempuan')->count(),
        ];
        return $this->chart->barChart()
            // ->setTitle('San Francisco vs Boston.')
            // ->setSubtitle('Wins during season 2021.')
            ->addData('Laki-Laki', $statuslaki)
            ->addData('Perempuan', $statuscewe)
            ->setColors(['#435ebe', '#ff6384'])
            // ->addData('Boston', $status)
            ->setXAxis(['Kurang Gizi','Normal','Obesitas']);
    }
}
