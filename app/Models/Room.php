<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //cuartos electricos
    use HasFactory, SoftDeletes;

    /**
     * Summary of table
     * @var string
     */
    protected $table = 'rooms';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /*-------------------------------- RELACIONES ------------------------------*/
    public function electricCharges()
    {
        return $this->hasMany(ElectricCharge::class);
    }
    /*------------------------------------------------------------------------*/
}
