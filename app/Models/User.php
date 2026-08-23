<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public const ROLE_ADMIN = 'admin';
    public const ROLE_CLIENT = 'client';

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
        'entries_submitted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'entries_submitted_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isClient(): bool
    {
        return $this->role === self::ROLE_CLIENT;
    }

    public function hasSubmittedEntries(): bool
    {
        return $this->entries_submitted_at !== null;
    }

    public function profile(){
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function fapa(){
        return $this->hasOne(FapaInternationalAwards::class, 'user_id', 'id');
    }

    public function exhibitionEntries(){
        return $this->hasMany(ExhibitionEntries::class);
    }

    public function impersonate($userId)
    {
        session(['impersonate' => $this->id]);
        auth()->loginUsingId($userId);
    }

    public function stopImpersonate()
    {
        if (session()->has('impersonate')) {
            $originalId = session('impersonate');
            auth()->loginUsingId($originalId);
            session()->forget('impersonate');
        }
    }
}
