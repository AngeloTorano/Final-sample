<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'RoleID';
    protected $fillable = [
        'RoleName',
    ];

    // If you want to define relationship with users
    public function users()
    {
        return $this->hasMany(User::class, 'RoleID');
    }
}