<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->getDashboardData();
        for ($i = 0; $i < 10; $i ++) {
            $data[$i] = $data[$i] ?? 0;
        }
        ksort($data);
        return view('dashboard.index', compact('data'));
    }

    public function getDashboardData()
    {
        $data = Word::select('status',\DB::raw('count(*) as count'))->where('status', '<', 10)
            ->groupBy('status')->pluck('count', 'status')->toArray();
        return $data;
    }
}
