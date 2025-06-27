<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hearing Screening Form</title>
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
</head>
<body class="bg-starkey-gray font-sans">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-starkey-blue uppercase tracking-wide">Starkey Hearing Foundation</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mt-2">Hearing Screening Registration</h2>
        </div>

        <div class="mb-4">
            <div class="w-full bg-starkey-lightblue rounded-full h-3 overflow-hidden">
                <div id="progressBar" class="bg-starkey-blue h-3 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
            <div class="flex justify-between text-xs text-starkey-blue font-semibold mt-1">
                <span>Registration</span>
                <span>General</span>
                <span>Ear</span>
                <span>Screening</span>
                <span>Impressions</span>
                <span>QC</span>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/hearing-form" class="space-y-6">
            @csrf

            <!-- Registration Section -->
            <div id="section1" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">Phase 1: Registration</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Phase 1 Date</label>
                        <input type="date" name="phase1_date" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">City</label>
                        <input type="text" name="phase1_city" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Surname</label>
                        <input type="text" name="surname" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">First Name</label>
                        <input type="text" name="first_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Region/District</label>
                        <input type="text" name="region" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">City/Village</label>
                        <input type="text" name="city_village" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Gender</label>
                        <select name="gender" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Date of Birth</label>
                        <input type="date" name="dob" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Age</label>
                        <input type="number" name="age" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Mobile Number</label>
                        <input type="text" name="mobile_number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Alternative Number</label>
                        <input type="text" name="alternative_number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                </div>

                <div class="text-center mt-6">
                    <button type="button" onclick="showSection('section2')" class="bg-starkey-blue hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Next
                    </button>
                </div>
            </div>

            <!-- Hearing Screening Questions -->
            <div id="section2" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue hidden">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">General Questions</h3>
                
                @php
                    $yesNo = ['Yes' => 'Yes', 'No' => 'No', 'Undecided' => 'Undecided', 'A little' => 'A little', 'Sometimes' => 'Sometimes'];
                @endphp

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">1. Do you have a hearing loss?</label>
                        <select name="hearing_loss" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            @foreach($yesNo as $key => $value) <option value="{{ $key }}">{{ $value }}</option> @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">2. Do you use sign language?</label>
                        <select name="sign_language" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            @foreach($yesNo as $key => $value) <option value="{{ $key }}">{{ $value }}</option> @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">3. Do you use speech?</label>
                        <select name="use_speech" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            @foreach($yesNo as $key => $value) <option value="{{ $key }}">{{ $value }}</option> @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">4. Hearing loss cause</label>
                        <input type="text" name="hearing_loss_cause" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">5. Do you experience a ringing sensation in your ear?</label>
                        <select name="ringing_ear" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            @foreach($yesNo as $key => $value) <option value="{{ $key }}">{{ $value }}</option> @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">6. Do you have pain in your ear?</label>
                        <select name="ear_pain" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            @foreach($yesNo as $key => $value) <option value="{{ $key }}">{{ $value }}</option> @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-blue-900 font-large mb-2 mt-5"><strong>For Patient 18 or Older</strong></label>
                        <label class="block text-gray-700 font-medium mb-1">7. How satisfied are you with your hearing?</label>
                        <select name="satisfied_hearing" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            <option value="Unsatisfied">Unsatisfied</option>
                            <option value="Undecided">Undecided</option>
                            <option value="Satisfied">Satisfied</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">8. Do you ask people to repeat themselves or speak louder?</label>
                        <select name="repeat_themselves" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            @foreach($yesNo as $key => $value) <option value="{{ $key }}">{{ $value }}</option> @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 mt-5">Employment Status</label>
                        <select name="employment_status" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            <option>Employed</option>
                            <option>Self Employed</option>
                            <option>Not Employed</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Highest Level of Education Attained</label>
                        <select name="education_attained" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            <option>None</option>
                            <option>Primary</option>
                            <option>Secondary</option>
                            <option>Post Secondary</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Are you currently a student?</label>
                        <select name="is_student" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">School Name</label>
                        <input type="text" name="school_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">School Phone Number</label>
                        <input type="text" name="school_phone" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
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

            <!-- Otoscopy Section -->
            <div id="section3" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue hidden">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">2A. Ear Screening</h3>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Ears Clear for Impressions</label>
                    <select name="ears_clear" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <h3 class="text-xl font-bold text-starkey-blue mb-4">2B. Otoscopy</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Wax</label>
                        <select name="wax" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="">None</option>
                            <option value="Left">Left</option>
                            <option value="Right">Right</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Infection</label>
                        <select name="infection" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="">None</option>
                            <option value="Left">Left</option>
                            <option value="Right">Right</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Perforation</label>
                        <select name="perforation" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="">None</option>
                            <option value="Left">Left</option>
                            <option value="Right">Right</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Tinnitus</label>
                        <select name="tinnitus" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="">None</option>
                            <option value="Left">Left</option>
                            <option value="Right">Right</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Implant</label>
                        <select name="implant" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="">None</option>
                            <option value="Left">Left</option>
                            <option value="Right">Right</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Other</label>
                        <input type="text" name="otoscopy_other" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Medical Recommendation</label>
                        <select name="medical_recommendation" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="None">None</option>
                            <option value="Left">Left</option>
                            <option value="Right">Right</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Medication Given</label>
                        <select name="medication_given" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="None">None</option>
                            <option value="Analgesic">Analgesic</option>
                            <option value="Antiseptic">Antiseptic</option>
                            <option value="Antifungal">Antifungal</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Ears Clear for Impressions (Post-Otoscopy)</label>
                    <select name="ears_clear_post" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                        <option value="">None</option>
                        <option value="Left">Left</option>
                        <option value="Right">Right</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Otoscopy Comments</label>
                    <textarea name="otoscopy_comments" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
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

            <!-- Hearing Screening Section -->
            <div id="section4" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue hidden">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">3. Hearing Screening</h3>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Screening Method</label>
                    <select name="screening_method" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                        <option value="Audiogram">Audiogram</option>
                        <option value="WAV Voice Test">WAV Voice Test</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Left Ear</label>
                        <select name="left_ear_screening" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Right Ear</label>
                        <select name="right_ear_screening" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option>
                        </select>
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

            <!-- Ear Impressions Section -->
            <div id="section5" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue hidden">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">5. Ear Impressions</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Left Ear</label>
                        <select name="left_ear_impression" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="Collected">Collected</option>
                            <option value="Not Collected">Not Collected</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Right Ear</label>
                        <select name="right_ear_impression" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="Collected">Collected</option>
                            <option value="Not Collected">Not Collected</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Ear Impression Comments</label>
                    <textarea name="ear_impression_comments" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="showSection('section4')" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Previous
                    </button>
                    <button type="button" onclick="showSection('section6')" class="bg-starkey-blue hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Next
                    </button>
                </div>
            </div>

            <!-- Final Quality Control Section -->
            <div id="section6" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue hidden">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">6. Final Quality Control</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Ears inspected and collected?</label>
                        <select name="quality_control_checked" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">SHF ID Number and ID Card Given?</label>
                        <select name="shf_id_given" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="showSection('section5')" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
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
        // Section order
        const sectionOrder = [
            'section1',
            'section2',
            'section3',
            'section4',
            'section5',
            'section6'
        ];

        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('div[id^="section"]').forEach(section => {
                section.classList.add('hidden');
            });

            // Show the selected section
            document.getElementById(sectionId).classList.remove('hidden');

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