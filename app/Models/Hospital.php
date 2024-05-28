<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_rumah_sakit',
        'alamat_rumah_sakit',
        'jumlah_kamar',
        'alamat_email',
        'password',
    ];

    public function rooms()
    {
        return $this->hasMany(RsRoom::class, 'hospital_id', 'id');
    }
    public function hospital($id) {
    }

}
