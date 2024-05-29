<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminHospital extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'hospital_id',
        'username',
        'alamat_email',
        'password',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}
