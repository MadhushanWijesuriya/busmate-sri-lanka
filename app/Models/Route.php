<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable=['name','start_point','end_point'];

    protected $table = 'routes';

    protected $primaryKey = 'id';

    public function routeHolts()
    {
        return $this->hasMany(RouteHolt::class, 'route_id', 'id');
    }
}
