<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $primaryKey = 'VisitID';
    protected $fillable = [
        'PatientID',
        'VisitTypeID',
        'Phase',
        'VisitDate',
        'City',
        'IsReturnVisit',
        'ServiceOrSchoolName',
        'SchoolYear'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function visitType()
    {
        return $this->belongsTo(VisitType::class, 'VisitTypeID');
    }

    public function generalHearingQuestions()
    {
        return $this->hasOne(GeneralHearingQuestion::class, 'VisitID');
    }

    public function earFindings()
    {
        return $this->hasMany(EarFinding::class, 'VisitID');
    }

    // Add other relationships as needed
}