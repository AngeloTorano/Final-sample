<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralHearingQuestion extends Model
{
    use HasFactory;

    protected $primaryKey = 'QuestionID';
    protected $fillable = [
        'PatientID',
        'VisitID',
        'HasHearingLoss',
        'UsesSignLanguage',
        'UsesSpeech',
        'HearingLossCause',
        'HasTinnitus',
        'HasEarPain',
        'AdultSatisfactionLevel',
        'RepeatsInConversation'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class, 'VisitID');
    }
}