<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Visit;
use App\Models\VisitType;
use App\Models\GeneralHearingQuestion;
use App\Models\EarFinding;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function create(Patient $patient)
    {
        $visitTypes = VisitType::all();
        return view('visits.create', compact('patient', 'visitTypes'));
    }

    public function store(Request $request, Patient $patient)
    {
        // Validate visit data
        $validatedVisit = $request->validate([
            'VisitTypeID' => 'required|exists:VisitTypes,VisitTypeID',
            'Phase' => 'required|in:Phase 1,Phase 2,Phase 3',
            'VisitDate' => 'required|date',
            'City' => 'required|string|max:100',
            'IsReturnVisit' => 'required|boolean',
            'ServiceOrSchoolName' => 'nullable|string|max:150',
            'SchoolYear' => 'nullable|in:1st,2nd,3rd,Patient Unreachable',
        ]);

        // Add patient ID to visit data
        $validatedVisit['PatientID'] = $patient->PatientID;

        // Create visit
        $visit = Visit::create($validatedVisit);

        // Validate general hearing questions
        $validatedHearing = $request->validate([
            'HasHearingLoss' => 'required|boolean',
            'UsesSignLanguage' => 'required|boolean',
            'UsesSpeech' => 'required|boolean',
            'HearingLossCause' => 'nullable|in:Medication,Meningitis,Aging,Ear Infection,HIV,Tuberculosis,Malaria,Trauma,Birth,Other,Unknown',
            'HasTinnitus' => 'required|boolean',
            'HasEarPain' => 'required|boolean',
            'AdultSatisfactionLevel' => 'nullable|in:Unsatisfied,Undecided,Satisfied',
            'RepeatsInConversation' => 'nullable|in:No,Sometimes,Yes',
        ]);

        // Add visit and patient IDs to hearing data
        $validatedHearing['VisitID'] = $visit->VisitID;
        $validatedHearing['PatientID'] = $patient->PatientID;

        // Create general hearing record
        GeneralHearingQuestion::create($validatedHearing);

        // Process ear findings (left and right)
        $this->processEarFindings($request, $visit);

        return redirect()->route('patients.show', $patient->PatientID)
                         ->with('success', 'Visit recorded successfully!');
    }

    protected function processEarFindings(Request $request, Visit $visit)
    {
        $sides = ['Left', 'Right'];
        
        foreach ($sides as $side) {
            $validatedFinding = $request->validate([
                "{$side}_Wax" => 'required|boolean',
                "{$side}_Infection" => 'required|boolean',
                "{$side}_Tinnitus" => 'required|boolean',
                "{$side}_Atresia" => 'required|boolean',
                "{$side}_Perforation" => 'required|boolean',
                "{$side}_OtherFinding" => 'nullable|string|max:255',
                "{$side}_ClearForImpression" => 'required|boolean',
                "{$side}_ClearForFitting" => 'required|boolean',
                "{$side}_MedicalRecommendation" => 'required|boolean',
                "{$side}_Medication" => 'nullable|in:Antibiotic,Analgesic,Antiseptic,Antifungal',
            ]);

            $formattedFinding = [
                'VisitID' => $visit->VisitID,
                'Side' => $side,
                'Wax' => $validatedFinding["{$side}_Wax"],
                'Infection' => $validatedFinding["{$side}_Infection"],
                'Tinnitus' => $validatedFinding["{$side}_Tinnitus"],
                'Atresia' => $validatedFinding["{$side}_Atresia"],
                'Perforation' => $validatedFinding["{$side}_Perforation"],
                'OtherFinding' => $validatedFinding["{$side}_OtherFinding"],
                'ClearForImpression' => $validatedFinding["{$side}_ClearForImpression"],
                'ClearForFitting' => $validatedFinding["{$side}_ClearForFitting"],
                'MedicalRecommendation' => $validatedFinding["{$side}_MedicalRecommendation"],
                'Medication' => $validatedFinding["{$side}_Medication"],
            ];

            EarFinding::create($formattedFinding);
        }
    }
}