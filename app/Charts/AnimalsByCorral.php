<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Corral;

class AnimalsByCorral
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $corrals = Corral::withCount('animals')->get();
        $data = [];
        foreach($corrals as $corral){
            $data[] = $corral->animals_count;
        }
        return $this->chart->barChart()
            ->setTitle('Animals by corrals')
            ->addData('Animals', $data)
            ->setXAxis($corrals->pluck('id')->toArray());
    }
}
