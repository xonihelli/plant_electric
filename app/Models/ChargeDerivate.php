<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeDerivate extends Model
{
    use HasFactory;

    /**
     * Summary of table
     * @var string
     */
    protected $table = 'charge_derivates';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'id',
        'electric_charge_id',
        'name_technical',
        'name',
        'kw',
        'a',
    ];

    /*-------------------------------- RELACIONES ------------------------------*/

    /**
     * Summary of electricCharge
     * @return mixed
     */
    public function electricCharge()
    {
        return $this->belongsTo(ElectricCharge::class);
    }

    /**
     * Summary of chargeSubDerivate
     * @return mixed
     */
    public function chargeSubDerivate()
    {
        return $this->hasMany(ChargeSubDerivate::class);
    }
    /*------------------------------------------------------------------------*/
}
