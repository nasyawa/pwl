<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hobi extends Model
{
    use HasFactory;
    protected $table='hobi';
    protected $primary='id';

    protected $fillable = [
        'jenishobi', 
        'waktu' ];
}
