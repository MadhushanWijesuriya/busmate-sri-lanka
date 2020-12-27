<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GoogleMaps\GoogleMaps;


class GoogleMapController extends Controller
{

    public function index()
    {
//        $data= (new \GoogleMaps\GoogleMaps)->load('geocoding')
//            ->setParam (['address' =>'santa cruz'])
//            ->get();
//        dd($data);
        return view('map');
    }
}
