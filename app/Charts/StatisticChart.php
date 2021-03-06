<?php

namespace App\Charts;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Barryvdh\Debugbar\Facades\Debugbar;

class StatisticChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Gets current year
        $currentYear = date('Y');

        // Retrieves data from database
        $credits = DB::table('cashout_customers')
            ->selectRaw('sum(tax_credits) as tax_credits, monthname(cashout_date) AS month_name')
            ->whereYear('cashout_date','=', $currentYear)
            ->groupByRaw('2')
            ->orderBy('cashout_date', 'ASC')
            ->get();

        $month = [];
        $bet_credits = [];

        // Seperates the data in 2 different arrays
        foreach($credits as $kv) {
            array_push($month, $kv->month_name);
            array_push($bet_credits, $kv->tax_credits);
        }

        // Return the chart with data that has been seperated
        return $this->chart->lineChart()
            ->setTitle('Inkomen per maand van '.$currentYear)
            ->addData('Inkomen', $bet_credits)
            ->setXAxis($month);
    }
}
