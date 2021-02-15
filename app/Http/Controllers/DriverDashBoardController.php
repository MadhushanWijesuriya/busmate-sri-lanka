<?php


namespace App\Http\Controllers;


use App\Models\BusHolt;
use Illuminate\Http\Request;

class DriverDashBoardController
{
    public function index()
    {
        $holt_names=BusHolt::all();
        return view('dashboard',compact('holt_names'));
    }

    public function getRouteDirection(Request $request)
    {

        $data=['start' => $request['start_holt'],
            'end' => $request['end_holt']
            ];
        return json_encode($request);
    }

}
