<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RsRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_id',
        'kelas_kamar',
        'jumlah_kamar_terisi',
        'jumlah_kamar_kosong',
        'usia',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}
