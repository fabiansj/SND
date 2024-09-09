<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'pengguna'; 
    protected $primaryKey = 'pid';
    protected $fillable = ['username', 'password', 'nama', 'alamat', 'no_telp', 'role'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;

    protected $casts = [
        // 'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
