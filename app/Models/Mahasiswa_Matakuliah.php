<?php

namespace App\Models;

use App\Http\Controllers\MataKuliahController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_matakuliah';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id', 'id');
    }
}
