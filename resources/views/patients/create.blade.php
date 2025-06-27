<!-- resources/views/patients/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Register New Patient - Phase 1</h2>
    <form method="POST" action="{{ route('patients.store') }}">
        @csrf

        <div class="card mb-4">
            <div class="card-header">A. Patient Information</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="FirstName">First Name*</label>
                            <input type="text" class="form-control" id="FirstName" name="FirstName" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Surname">Surname*</label>
                            <input type="text" class="form-control" id="Surname" name="Surname" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Gender">Gender*</label>
                            <select class="form-control" id="Gender" name="Gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="DOB">Date of Birth*</label>
                            <input type="date" class="form-control" id="DOB" name="DOB" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="MobileNumber">Mobile Number*</label>
                            <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="AlternativeNumber">Alternative Number</label>
                            <input type="text" class="form-control" id="AlternativeNumber" name="AlternativeNumber">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RegionOrDistrict">Region/District*</label>
                            <input type="text" class="form-control" id="RegionOrDistrict" name="RegionOrDistrict" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="CityOrVillage">City/Village*</label>
                            <input type="text" class="form-control" id="CityOrVillage" name="CityOrVillage" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">E. Socio-Economic Information</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="EmploymentStatus">Employment Status*</label>
                    <select class="form-control" id="EmploymentStatus" name="EmploymentStatus" required>
                        <option value="">Select Status</option>
                        <option value="Employed">Employed</option>
                        <option value="Self Employed">Self Employed</option>
                        <option value="Not Employed">Not Employed</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="HighestEducation">Highest Level of Education Attained*</label>
                    <select class="form-control" id="HighestEducation" name="HighestEducation" required>
                        <option value="">Select Education Level</option>
                        <option value="None">None</option>
                        <option value="Primary">Primary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="Post Secondary">Post Secondary</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="IsCurrentlyInSchool">Currently in School?*</label>
                    <select class="form-control" id="IsCurrentlyInSchool" name="IsCurrentlyInSchool" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group" id="schoolNameGroup">
                    <label for="SchoolName">School Name</label>
                    <input type="text" class="form-control" id="SchoolName" name="SchoolName">
                </div>

                <div class="form-group" id="schoolPhoneGroup">
                    <label for="SchoolPhone">School Phone Number</label>
                    <input type="text" class="form-control" id="SchoolPhone" name="SchoolPhone">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Patient Information</button>
    </form>
</div>

<script>
    // Show/hide school fields based on selection
    document.getElementById('IsCurrentlyInSchool').addEventListener('change', function() {
        const schoolFields = document.getElementById('schoolNameGroup');
        const phoneFields = document.getElementById('schoolPhoneGroup');
        
        if (this.value === '1') {
            schoolFields.style.display = 'block';
            phoneFields.style.display = 'block';
        } else {
            schoolFields.style.display = 'none';
            phoneFields.style.display = 'none';
        }
    });

    // Trigger change event on page load
    document.getElementById('IsCurrentlyInSchool').dispatchEvent(new Event('change'));
</script>
@endsection