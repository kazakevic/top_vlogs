<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ChartsDataController extends Controller
{
    public function channelsData()
    {
        $data = DB::table('channels')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as month"), DB::raw('count(*) as channels'))
            ->groupBy('month')
            ->get();
        return $data;
    }
    public function usersData()
    {
        $data = DB::table('users')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"), DB::raw('count(*) as users'))
            ->groupBy('date')
            ->get();
        return $data;
    }
}
