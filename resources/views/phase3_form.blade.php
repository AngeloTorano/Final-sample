<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phase 3 - AfterCare Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        starkey: {
                            blue: '#0056b3',
                            lightblue: '#e6f0fa',
                            accent: '#ff8c00',
                            gray: '#f8f9fa'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .progress-bar {
            height: 6px;
            background-color: #e6f0fa;
            margin-bottom: 20px;
            border-radius: 3px;
            overflow: hidden;
        }
        .progress {
            height: 100%;
            background-color: #0056b3;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body class="bg-starkey-gray font-sans">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-starkey-blue uppercase tracking-wide">Starkey Hearing Foundation</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mt-2">Phase 3 - AfterCare</h2>
            
            <div class="mb-4">
            <div class="w-full bg-starkey-lightblue rounded-full h-3 overflow-hidden">
                <div id="progressBar" class="bg-starkey-blue h-3 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
            <div class="flex justify-between text-xs text-starkey-blue font-semibold mt-1">
                <span>Registration</span>
                <span>Ear Screening</span>
                <span>Assessment</span>
                <span>Services</span>
                <span>Final QC</span>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/hearing-form3" class="space-y-6" id="multiStepForm">
            @csrf

            <!-- Section 1: Registration -->
            <div id="section1" class="form-section active bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">1. Registration</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Country</label>
                        <input type="text" name="country" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Phase 3 AfterCare City</label>
                        <input type="text" name="aftercare_city" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Date</label>
                        <input type="date" name="aftercare_date" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Surname</label>
                        <input type="text" name="surname" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Gender / DOB / Age</label>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <input type="radio" name="gender" value="Male" class="text-starkey-blue focus:ring-starkey-blue">
                                <span>Male</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="radio" name="gender" value="Female" class="text-starkey-blue focus:ring-starkey-blue">
                                <span>Female</span>
                            </div>
                            <input type="date" name="dob" class="px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-starkey-blue">
                            <input type="number" name="age" placeholder="Age" class="w-20 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-starkey-blue">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Mobile Phone Number</label>
                    <input type="text" name="mobile_number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Type of AfterCare</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach (['Service Center', 'School', 'Phone', '1st Call', '2nd Call', '3rd Call', 'Patient Unreachable'] as $type)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="aftercare_type[]" value="{{ $type }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">{{ $type }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Service Center / School Name</label>
                        <input type="text" name="service_center_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Highest Level of Education Attained</label>
                        <select name="education_level" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option>None</option>
                            <option>Primary</option>
                            <option>Secondary</option>
                            <option>Post Secondary</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Return Visit?</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="return_visit" value="Yes" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">Yes</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="return_visit" value="No" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Employment Status</label>
                        <div class="flex flex-wrap gap-4">
                            @foreach (['Employed', 'Self-Employed', 'Not Employed'] as $status)
                                <label class="inline-flex items-center">
                                    <input type="radio" name="employment_status" value="{{ $status }}" class="text-starkey-blue focus:ring-starkey-blue">
                                    <span class="ml-1">{{ $status }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700 font-medium mb-2">Are you having a problem with your hearing aids and/or earmolds?</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="hearing_aid_problem" value="Yes" class="text-starkey-blue focus:ring-starkey-blue">
                            <span class="ml-2">Yes</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="hearing_aid_problem" value="No" class="text-starkey-blue focus:ring-starkey-blue">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <button type="button" onclick="showSection('section2')" class="bg-starkey-blue hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Next
                    </button>
                </div>
            </div>

            <!-- Section 2: Ear Screening -->
            <div id="section2" class="form-section bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">2. Ear Screening - Otoscopy</h3>
                
                <div class="flex flex-wrap gap-6 mb-4">
                    @foreach (['Wax', 'Infection', 'Perforation', 'Other'] as $issue)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="otoscopy_issues[]" value="{{ $issue }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                            <span class="ml-2">{{ $issue }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Medical Recommendation</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="medical_recommendation" value="Left" class="text-starkey-blue focus:ring-starkey-blue">
                            <span class="ml-2">Left</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="medical_recommendation" value="Right" class="text-starkey-blue focus:ring-starkey-blue">
                            <span class="ml-2">Right</span>
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Medication Given</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach (['Antibiotic', 'Analgesic', 'Antiseptic', 'Antifungal'] as $med)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="medication_given[]" value="{{ $med }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">{{ $med }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Ears Clear for Assessment?</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="ears_clear" value="Yes" class="text-starkey-blue focus:ring-starkey-blue">
                            <span class="ml-2">Yes</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="ears_clear" value="No" class="text-starkey-blue focus:ring-starkey-blue">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Comments</label>
                    <textarea name="otoscopy_comments" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="showSection('section1')" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Previous
                    </button>
                    <button type="button" onclick="showSection('section3')" class="bg-starkey-blue hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Next
                    </button>
                </div>
            </div>

            <!-- Section 3: Aftercare Assessment -->
            <div id="section3" class="form-section bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">3. Aftercare Assessment</h3>
                
                <h4 class="text-lg font-semibold text-gray-700 mb-2">Evaluation - Hearing Aid</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4">
                    @foreach ([
                        'Aid is Dead or Broken', 
                        'Aid has Internal Feedback',
                        'Aid Needs Power Change Needed',
                        'Aid Was Lost or Stolen',
                        'No Problem with Hearing Aid'
                    ] as $item)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="hearing_aid_eval[]" value="{{ $item }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                            <span class="ml-2">{{ $item }}</span>
                        </label>
                    @endforeach
                </div>

                <h4 class="text-lg font-semibold text-gray-700 mb-2">Evaluation - Earmold</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ([
                        'Discomfort/Too Tight',
                        'Too Loose',
                        'Damaged or Tubing Cracked',
                        'Lost or Stolen',
                        'No Problem with Earmold'
                    ] as $item)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="earmold_eval[]" value="{{ $item }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                            <span class="ml-2">{{ $item }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="showSection('section2')" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Previous
                    </button>
                    <button type="button" onclick="showSection('section4')" class="bg-starkey-blue hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Next
                    </button>
                </div>
            </div>

            <!-- Section 4: Services Completed -->
            <div id="section4" class="form-section bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">3B. Services Completed</h3>
                
                <h4 class="text-lg font-semibold text-gray-700 mb-2">LEFT/RIGHT: Hearing Aid</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4">
                    @foreach ([
                        'Tested with WFA Fitting Method',
                        'Sent to SHF',
                        'Refit with New Hearing Aid',
                        'Not Benefiting'
                    ] as $item)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="hearing_aid_service[]" value="{{ $item }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                            <span class="ml-2">{{ $item }}</span>
                        </label>
                    @endforeach
                </div>

                <h4 class="text-lg font-semibold text-gray-700 mb-2">Earmold</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4">
                    @foreach ([
                        'Refitted or Unplugged',
                        'Modified Earmold',
                        'Fit Stock Earmold',
                        'Fit Custom Earmold'
                    ] as $item)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="earmold_service[]" value="{{ $item }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                            <span class="ml-2">{{ $item }}</span>
                        </label>
                    @endforeach
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">General Services</label>
                    <div class="flex flex-wrap items-center gap-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="counseling" class="text-starkey-blue focus:ring-starkey-blue rounded">
                            <span class="ml-2">Counseling</span>
                        </label>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-700 font-medium">Batteries Provided:</span>
                            <input type="number" name="batteries_provided" class="w-16 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-starkey-blue">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="battery_type" value="13" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">13</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="battery_type" value="675" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">675</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="showSection('section3')" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Previous
                    </button>
                    <button type="button" onclick="showSection('section5')" class="bg-starkey-blue hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Next
                    </button>
                </div>
            </div>

            <!-- Section 5: Final Quality Control -->
            <div id="section5" class="form-section bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">4. Final Quality Control</h3>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">1. Satisfaction</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach(['Unsatisfied', 'Undecided', 'Satisfied'] as $response)
                            <label class="inline-flex items-center">
                                <input type="radio" name="satisfaction" value="{{ $response }}" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">{{ $response }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">2. Do you ask people to repeat themselves?</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach(['No', 'Sometimes', 'Yes'] as $repeat)
                            <label class="inline-flex items-center">
                                <input type="radio" name="repeat_question" value="{{ $repeat }}" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">{{ $repeat }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Patient Signature</label>
                    <input type="text" name="signature" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Notes from SHF</label>
                    <textarea name="shf_notes" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="showSection('section4')" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Previous
                    </button>
                    <button type="submit" class="bg-starkey-blue hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Submit Form
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Section order for phase 3
        const sectionOrder = [
            'section1',
            'section2',
            'section3',
            'section4',
            'section5'
        ];

        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active');
            });

            // Show the selected section
            document.getElementById(sectionId).classList.add('active');

            // Update progress bar
            updateProgressBar(sectionId);

            // Scroll to the top of the section
            document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
        }

        function updateProgressBar(sectionId) {
            const idx = sectionOrder.indexOf(sectionId);
            const percent = ((idx) / (sectionOrder.length - 1)) * 100;
            document.getElementById('progressBar').style.width = percent + '%';
        }

        // Show the first section and set progress bar on load
        document.addEventListener('DOMContentLoaded', function() {
            showSection('section1');
        });
    </script>
</body>
</html>