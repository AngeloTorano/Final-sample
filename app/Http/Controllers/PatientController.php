<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\EducationEmployment;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        // Validate patient data
        $validatedPatient = $request->validate([
            'FirstName' => 'required|string|max:100',
            'Surname' => 'required|string|max:100',
            'Gender' => 'required|in:Male,Female',
            'DOB' => 'required|date',
            'MobileNumber' => 'required|string|max:20',
            'AlternativeNumber' => 'nullable|string|max:20',
            'CityOrVillage' => 'required|string|max:100',
            'RegionOrDistrict' => 'required|string|max:100',
        ]);

        // Create patient
        $patient = Patient::create($validatedPatient);

        // Validate education/employment data
        $validatedEducation = $request->validate([
            'IsCurrentlyInSchool' => 'required|boolean',
            'SchoolName' => 'nullable|string|max:150',
            'SchoolPhone' => 'nullable|string|max:30',
            'HighestEducation' => 'required|in:None,Primary,Secondary,Post Secondary',
            'EmploymentStatus' => 'required|in:Employed,Self Employed,Not Employed',
        ]);

        // Add patient ID to education data
        $validatedEducation['PatientID'] = $patient->PatientID;

        // Create education/employment record
        EducationEmployment::create($validatedEducation);

        return redirect()->route('visits.create', ['patient' => $patient->PatientID])
                         ->with('success', 'Patient registered successfully!');
    }

    public function index()
    {
        $patients = Patient::with('educationEmployment')->paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function show(Patient $patient)
    {
        $patient->load('educationEmployment', 'visits');
        return view('patients.show', compact('patient'));
    }
}