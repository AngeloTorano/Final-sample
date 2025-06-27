<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarFinding extends Model
{
    use HasFactory;

    protected $primaryKey = 'FindingID';
    protected $fillable = [
        'VisitID',
        'Side',
        'Wax',
        'Infection',
        'Tinnitus',
        'Atresia',
        'Perforation',
        'OtherFinding',
        'ClearForImpression',
        'ClearForFitting',
        'MedicalRecommendation',
        'Medication'
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class, 'VisitID');
    }
}