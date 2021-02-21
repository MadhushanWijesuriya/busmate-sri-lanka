<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteCategory extends Model
{
    use HasFactory;

    public $incrementing = true;

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    protected $table = 'route_categories';

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
