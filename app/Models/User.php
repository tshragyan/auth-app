<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * @property int id
 * @property string name
 * @property string email
 * @property int email_verified_at
 * @property string password
 * @property bool is_admin
 * @property string secret_key
 * @property string remember_token
 * @property int created_at
 * @property int updated_at
  */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const USERS_LIST_TABLE_PROPERTIES = [
        'id',
        'name',
        'email',
        'secret_key'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'secret_key',
        'is_admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
