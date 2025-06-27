<!-- resources/views/visits/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Record Visit for {{ $patient->FirstName }} {{ $patient->Surname }}</h2>
    <form method="POST" action="{{ route('visits.store', $patient) }}">
        @csrf

        <div class="card mb-4">
            <div class="card-header">Visit Information</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="VisitTypeID">Visit Type*</label>
                            <select class="form-control" id="VisitTypeID" name="VisitTypeID" required>
                                @foreach($visitTypes as $type)
                                    <option value="{{ $type->VisitTypeID }}">{{ $type->Type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Phase">Phase*</label>
                            <select class="form-control" id="Phase" name="Phase" required>
                                <option value="Phase 1">Phase 1 - Registration</option>
                                <option value="Phase 2">Phase 2 - Fitting</option>
                                <option value="Phase 3">Phase 3 - Follow-up</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="VisitDate">Visit Date*</label>
                            <input type="date" class="form-control" id="VisitDate" name="VisitDate" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="City">City*</label>
                            <input type="text" class="form-control" id="City" name="City" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="IsReturnVisit">Is this a return visit?*</label>
                    <select class="form-control" id="IsReturnVisit" name="IsReturnVisit" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ServiceOrSchoolName">Service/School Name</label>
                    <input type="text" class="form-control" id="ServiceOrSchoolName" name="ServiceOrSchoolName">
                </div>

                <div class="form-group">
                    <label for="SchoolYear">School Year (if applicable)</label>
                    <select class="form-control" id="SchoolYear" name="SchoolYear">
                        <option value="">N/A</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="Patient Unreachable">Patient Unreachable</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">B. General Hearing Questions</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="HasHearingLoss">Do you have a hearing loss?*</label>
                    <select class="form-control" id="HasHearingLoss" name="HasHearingLoss" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="UsesSignLanguage">Do you use sign language?*</label>
                    <select class="form-control" id="UsesSignLanguage" name="UsesSignLanguage" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="UsesSpeech">Do you use speech?*</label>
                    <select class="form-control" id="UsesSpeech" name="UsesSpeech" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="HearingLossCause">Hearing Loss Cause</label>
                    <select class="form-control" id="HearingLossCause" name="HearingLossCause">
                        <option value="">Select Cause</option>
                        <option value="Medication">Medication</option>
                        <option value="Meningitis">Meningitis</option>
                        <option value="Aging">Aging</option>
                        <option value="Ear Infection">Ear Infection</option>
                        <option value="HIV">HIV</option>
                        <option value="Tuberculosis">Tuberculosis</option>
                        <option value="Malaria">Malaria</option>
                        <option value="Trauma">Trauma</option>
                        <option value="Birth">Birth</option>
                        <option value="Other">Other</option>
                        <option value="Unknown">Unknown</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="HasTinnitus">Have you experienced tinnitus?*</label>
                    <select class="form-control" id="HasTinnitus" name="HasTinnitus" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="HasEarPain">Do you have ear pain?*</label>
                    <select class="form-control" id="HasEarPain" name="HasEarPain" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="AdultSatisfactionLevel">How satisfied are you with your hearing? (Adults only)</label>
                    <select class="form-control" id="AdultSatisfactionLevel" name="AdultSatisfactionLevel">
                        <option value="">N/A</option>
                        <option value="Unsatisfied">Unsatisfied</option>
                        <option value="Undecided">Undecided</option>
                        <option value="Satisfied">Satisfied</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="RepeatsInConversation">Do you ask people to repeat themselves?</label>
                    <select class="form-control" id="RepeatsInConversation" name="RepeatsInConversation">
                        <option value="">N/A</option>
                        <option value="No">No</option>
                        <option value="Sometimes">Sometimes</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">G. 1B. OTOSCOPY Findings</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Left Ear</h5>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Left_Wax" name="Left_Wax" value="1">
                                <label class="form-check-label" for="Left_Wax">Wax Present</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Left_Infection" name="Left_Infection" value="1">
                                <label class="form-check-label" for="Left_Infection">Infection</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Left_Tinnitus" name="Left_Tinnitus" value="1">
                                <label class="form-check-label" for="Left_Tinnitus">Tinnitus</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Left_Atresia" name="Left_Atresia" value="1">
                                <label class="form-check-label" for="Left_Atresia">Atresia</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Left_Perforation" name="Left_Perforation" value="1">
                                <label class="form-check-label" for="Left_Perforation">Perforation</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Left_OtherFinding">Other Finding</label>
                            <input type="text" class="form-control" id="Left_OtherFinding" name="Left_OtherFinding">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Left_ClearForImpression" name="Left_ClearForImpression" value="1">
                                <label class="form-check-label" for="Left_ClearForImpression">Clear for Impression</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Left_ClearForFitting" name="Left_ClearForFitting" value="1">
                                <label class="form-check-label" for="Left_ClearForFitting">Clear for Fitting</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Left_MedicalRecommendation" name="Left_MedicalRecommendation" value="1">
                                <label class="form-check-label" for="Left_MedicalRecommendation">Medical Recommendation</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Left_Medication">Medication Given</label>
                            <select class="form-control" id="Left_Medication" name="Left_Medication">
                                <option value="">None</option>
                                <option value="Antibiotic">Antibiotic</option>
                                <option value="Analgesic">Analgesic</option>
                                <option value="Antiseptic">Antiseptic</option>
                                <option value="Antifungal">Antifungal</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5>Right Ear</h5>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Right_Wax" name="Right_Wax" value="1">
                                <label class="form-check-label" for="Right_Wax">Wax Present</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Right_Infection" name="Right_Infection" value="1">
                                <label class="form-check-label" for="Right_Infection">Infection</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Right_Tinnitus" name="Right_Tinnitus" value="1">
                                <label class="form-check-label" for="Right_Tinnitus">Tinnitus</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Right_Atresia" name="Right_Atresia" value="1">
                                <label class="form-check-label" for="Right_Atresia">Atresia</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Right_Perforation" name="Right_Perforation" value="1">
                                <label class="form-check-label" for="Right_Perforation">Perforation</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Right_OtherFinding">Other Finding</label>
                            <input type="text" class="form-control" id="Right_OtherFinding" name="Right_OtherFinding">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Right_ClearForImpression" name="Right_ClearForImpression" value="1">
                                <label class="form-check-label" for="Right_ClearForImpression">Clear for Impression</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Right_ClearForFitting" name="Right_ClearForFitting" value="1">
                                <label class="form-check-label" for="Right_ClearForFitting">Clear for Fitting</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Right_MedicalRecommendation" name="Right_MedicalRecommendation" value="1">
                                <label class="form-check-label" for="Right_MedicalRecommendation">Medical Recommendation</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Right_Medication">Medication Given</label>
                            <select class="form-control" id="Right_Medication" name="Right_Medication">
                                <option value="">None</option>
                                <option value="Antibiotic">Antibiotic</option>
                                <option value="Analgesic">Analgesic</option>
                                <option value="Antiseptic">Antiseptic</option>
                                <option value="Antifungal">Antifungal</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Visit Information</button>
    </form>
</div>
@endsection