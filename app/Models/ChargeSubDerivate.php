<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ChargeSubDerivate extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Summary of table
     * @var string
     */
    protected $table = 'charge_sub_derivates';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'id',
        'charge_derivate_id',
        'name',
        'kw',
        'a',
        'brand',
        'model',
        'capacity',
        'location',
        'lightning_discharge',
        'surge'
    ];

    /*-------------------------------- RELACIONES ------------------------------*/
    /**
     * Summary of chargeDerivate
     * @return mixed
     */
    public function chargeDerivate()
    {
        return $this->belongsTo(ChargeDerivate::class);
    }
    /*------------------------------------------------------------------------*/
}
