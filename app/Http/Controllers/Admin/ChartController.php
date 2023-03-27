<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function appointments()
    {
        $monthlyCounts = Appointment::select(
            DB::raw('EXTRACT(MONTH FROM created_at) as month'), 
            DB::raw('COUNT(1)')
        )->groupBy('month')->get()->toArray();

        $counts = array_fill(0, 12, 0);
        foreach ($monthlyCounts as $monthlyCount) {
            $index = $monthlyCount['month']-1;
            $counts[$index] = $monthlyCount['count'];
        }
        //dd($counts);
        return view ('charts.appointments', compact('counts'));
    }
}
