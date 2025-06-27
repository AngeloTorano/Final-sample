<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // <-- IMPORTANT
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable // <-- IMPORTANT
{
    use HasFactory, Notifiable;

    protected $table = 'Users';
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'RoleID',
        'FirstName',
        'LastName',
        'Username',
        'PasswordHash',
        'PhoneNumber',
        'City',
        'Country'
    ];

    protected $hidden = [
        'PasswordHash',
        'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'Username';
    }

    public function getAuthPassword()
    {
        return $this->PasswordHash;
    }
}