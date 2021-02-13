<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusHolt extends Model
{
    use HasFactory;

    protected $fillable=['holt_name', 'location_cord'];

    protected $table = 'bus_holts';

    protected $primaryKey = 'id';

    public function routeHolts()
    {
        return $this->hasMany(RouteHolt::class, 'bus_holt_id', 'id');
    }
}
