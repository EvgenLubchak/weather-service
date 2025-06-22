<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'temperature_celsius',
        'timestamp',
    ];

    protected $casts = [
        'timestamp' => 'datetime',
    ];
}
