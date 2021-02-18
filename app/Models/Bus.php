<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'buses';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string[]
     */
    protected $fillable = ['bus_reg_no','owner_id','category_id'];

}
