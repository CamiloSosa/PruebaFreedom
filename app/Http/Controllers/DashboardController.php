<?php

namespace App\Http\Controllers;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Corral;
use Illuminate\Http\Request;
use App\Charts\AnimalsByCorral;

class DashboardController extends Controller
{
    /**
     * show the dashboard
     */
    public function index(AnimalsByCorral $chart){

        $header = 'Dashboard';
        $chart = $chart->build();
        
        return view('dashboard', compact('chart', 'header'));
    }
}
