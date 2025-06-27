<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'PatientID';
    protected $fillable = [
        'FirstName',
        'Surname',
        'Gender',
        'DOB',
        'MobileNumber',
        'AlternativeNumber',
        'CityOrVillage',
        'RegionOrDistrict'
    ];

    public function educationEmployment()
    {
        return $this->hasOne(EducationEmployment::class, 'PatientID');
    }

    public function visits()
    {
        return $this->hasMany(Visit::class, 'PatientID');
    }
}