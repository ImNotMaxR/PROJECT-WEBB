<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['name', 'email', 'password', 'role'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

     public function isAdmin()
     {
         return $this->admin === 1; 
     }
     

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}