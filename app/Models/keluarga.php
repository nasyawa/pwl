<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluarga extends Model
{
    use HasFactory;
    protected $table='keluarga';

    protected $fillable = [
        'nama'
    ];
}
