<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitType extends Model
{
    use HasFactory;

    protected $primaryKey = 'VisitTypeID';
    protected $fillable = ['Type'];

    public function visits()
    {
        return $this->hasMany(Visit::class, 'VisitTypeID');
    }
}