<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminHospital extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'hospital_id',
        'username',
        'alamat_email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}


