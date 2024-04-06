<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

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
}
