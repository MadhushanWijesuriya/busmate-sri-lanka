<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'owners';
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
    protected $fillable = ['name','address','contact_no'];
}
