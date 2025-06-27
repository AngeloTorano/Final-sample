<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationEmployment extends Model
{
    use HasFactory;

    protected $primaryKey = 'EEID';
    protected $fillable = [
        'PatientID',
        'IsCurrentlyInSchool',
        'SchoolName',
        'SchoolPhone',
        'HighestEducation',
        'EmploymentStatus'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }
}