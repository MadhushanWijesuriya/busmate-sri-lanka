<?php


namespace App\Http\Controllers;


use App\Models\Root;

class DriverRouteController extends Controller
{
    public function index()
    {
        // If the Content-Type and Accept headers are set to 'application/json',
        // this will return a JSON structure. This will be cleaned up later.
        return Root::all();
    }
}
