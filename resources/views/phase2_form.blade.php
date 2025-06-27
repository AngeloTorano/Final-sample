<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hearing Screening Form - Phase 2</title>
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
            <h2 class="text-2xl font-semibold text-gray-700 mt-2">Phase 2 - Hearing Aid Fitting</h2>
            
            <!-- Progress Bar (same as phase 1) -->
            <div class="mb-4">
                <div class="w-full bg-starkey-lightblue rounded-full h-3 overflow-hidden">
                    <div id="progressBar" class="bg-starkey-blue h-3 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
                <div class="flex justify-between text-xs text-starkey-blue font-semibold mt-1">
                    <span>Registration</span>
                    <span>Fitting</span>
                    <span>Quality Check</span>
                    <span>Counseling</span>
                    <span>Final QC</span>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/hearing-form2" class="space-y-6" id="multiStepForm">
            @csrf
            
            <!-- Section 1: Registration -->
            <div id="section1" class="form-section active bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">1. Phase 2: Registration</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Phase 2 Date</label>
                        <input type="date" name="phase2_date" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Phase 2 City</label>
                        <input type="text" name="phase2_city" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Patient Type</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="patient_type" value="Registered Phase 1" class="text-starkey-blue focus:ring-starkey-blue" checked>
                            <span class="ml-2">Registered Phase 1</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="patient_type" value="No Earmolds" class="text-starkey-blue focus:ring-starkey-blue">
                            <span class="ml-2">No Earmolds</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="patient_type" value="Walk-in" class="text-starkey-blue focus:ring-starkey-blue">
                            <span class="ml-2">Walk-in</span>
                        </label>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <button type="button" onclick="showSection('section2')" class="bg-starkey-blue hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Next
                    </button>
                </div>
            </div>

            <!-- Section 2: Hearing Aid Fitting -->
            <div id="section2" class="form-section bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">4A. Hearing Aid Fitting</h3>
                
                <div class="overflow-x-auto mb-4">
                    <table class="w-full border text-sm text-left">
                        <thead>
                            <tr class="bg-starkey-lightblue">
                                <th class="p-3 border font-semibold text-starkey-blue">Ear</th>
                                <th class="p-3 border font-semibold text-starkey-blue">Results</th>
                                <th class="p-3 border font-semibold text-starkey-blue">Power Level</th>
                                <th class="p-3 border font-semibold text-starkey-blue">Volume</th>
                                <th class="p-3 border font-semibold text-starkey-blue">Battery</th>
                                <th class="p-3 border font-semibold text-starkey-blue">Earmold</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (['Left', 'Right'] as $side)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border font-medium">{{ $side }}</td>
                                <td class="p-3 border"><input type="text" name="{{ strtolower($side) }}_result" class="w-full px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-starkey-blue"></td>
                                <td class="p-3 border"><input type="text" name="{{ strtolower($side) }}_power_level" class="w-full px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-starkey-blue"></td>
                                <td class="p-3 border"><input type="text" name="{{ strtolower($side) }}_volume" class="w-full px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-starkey-blue"></td>
                                <td class="p-3 border">
                                    <div class="flex flex-col space-y-1">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="{{ strtolower($side) }}_battery" value="13" class="text-starkey-blue focus:ring-starkey-blue">
                                            <span class="ml-1">13</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="{{ strtolower($side) }}_battery" value="675" class="text-starkey-blue focus:ring-starkey-blue">
                                            <span class="ml-1">675</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="p-3 border"><input type="text" name="{{ strtolower($side) }}_earmold" class="w-full px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-starkey-blue"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Number of Hearing Aids Fit</label>
                        <select name="hearing_aids_fit" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Special Device</label>
                        <div class="space-y-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="special_device_bone" value="Bone Conductor" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">Bone Conductor</span>
                            </label>
                            <label class="inline-flex items-center block">
                                <input type="checkbox" name="special_device_body" value="Body Aid" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">Body Aid</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Hearing Type/Response</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        @foreach(['Normal Hearing', 'Distortion', 'Recruitment', 'No Response', 'Other'] as $type)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="hearing_type[]" value="{{ $type }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">{{ $type }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Fitting Comments</label>
                    <textarea name="fitting_comments" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
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

            <!-- Section 3: Fitting Quality Control -->
            <div id="section3" class="form-section bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">4B. Fitting Quality Control</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Patient Clear for Counseling</label>
                        <select name="clear_for_counseling" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Device Function Check</label>
                        <div class="space-y-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="device_check_sound" value="Sound Quality Good" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">Sound Quality Good</span>
                            </label>
                            <label class="inline-flex items-center block">
                                <input type="checkbox" name="device_check_fit" value="Proper Fit" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">Proper Fit</span>
                            </label>
                            <label class="inline-flex items-center block">
                                <input type="checkbox" name="device_check_comfort" value="Comfortable" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">Comfortable</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Quality Control Comments</label>
                        <textarea name="qc_comments" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
                    </div>
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

            <!-- Section 4: Counseling -->
            <div id="section4" class="form-section bg-white rounded-lg shadow-md p-6 border-l-4 border-starkey-blue">
                <h3 class="text-xl font-bold text-starkey-blue mb-4">5. Counseling</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Counseling Completed</label>
                        <div class="space-y-3">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="counseling_completed" value="Completed" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">Patient completed counseling</span>
                            </label>
                            <label class="inline-flex items-center block">
                                <input type="checkbox" name="aftercare_info" value="Provided" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">Received AfterCare information</span>
                            </label>
                            <label class="inline-flex items-center block">
                                <input type="checkbox" name="student_ambassador" value="Ambassador" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                <span class="ml-2">Trained as Student Ambassador</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Topics Covered</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            @foreach(['Device Use', 'Battery Replacement', 'Maintenance', 'Troubleshooting', 'Follow-up'] as $topic)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="topics_covered[]" value="{{ $topic }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                    <span class="ml-2">{{ $topic }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Counseling Comments</label>
                        <textarea name="counseling_comments" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
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
                <h3 class="text-xl font-bold text-starkey-blue mb-4">6. Final Quality Control</h3>
                
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Number of Batteries Provided</label>
                            <input type="number" name="batteries_provided" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Battery Type</label>
                            <select name="battery_type" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue">
                                <option value="13">13</option>
                                <option value="675">675</option>
                                <option value="AA">AA</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Accessories Provided</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            @foreach(['Cleaning Tool', 'Dry Kit', 'Carrying Case', 'Extra Domes', 'Other'] as $accessory)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="accessories[]" value="{{ $accessory }}" class="text-starkey-blue focus:ring-starkey-blue rounded">
                                    <span class="ml-2">{{ $accessory }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">(if under 18, parent signs) <br> Are you satisfied with your hearing aids?</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="hearing_aid_satisfaction" value="Yes" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">Yes</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="hearing_aid_satisfaction" value="No" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">No</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="hearing_aid_satisfaction" value="Undecided" class="text-starkey-blue focus:ring-starkey-blue">
                                <span class="ml-2">Undecided</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Follow-up Plan</label>
                        <textarea name="followup_plan" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Final Comments</label>
                        <textarea name="final_comments" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-starkey-blue"></textarea>
                    </div>
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
        // Section order for phase 2
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