<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'MediEase') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans bg-[#2c3e50] min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-black shadow-lg flex flex-col py-8 px-4 min-h-screen">
        <div class="mb-8 flex items-center justify-center">
            <img src="{{ asset('images/starkeyLogo.png') }}" alt="Logo" class="h-12">
        </div>
        
        <!-- Welcome Message -->
        <div class="px-4 py-2 mb-6 text-white text-center">
            Welcome, {{ auth()->user()->FirstName }}!
        </div>
        
        <nav class="flex flex-col gap-3">
            <a href="#" class="py-2 px-4 rounded hover:bg-gray-800 text-white font-medium transition">Find Patient</a>
            <a href="#" class="py-2 px-4 rounded hover:bg-gray-800 text-white font-medium transition">Country Profile</a>
            <a href="#" class="py-2 px-4 rounded hover:bg-gray-800 text-white font-medium transition">Territories</a>
            <a href="#" class="py-2 px-4 rounded hover:bg-gray-800 text-white font-medium transition">Missions Docs</a>
            <a href="#" class="py-2 px-4 rounded hover:bg-gray-800 text-white font-medium transition">Report</a>
            <a href="#" class="py-2 px-4 rounded hover:bg-gray-800 text-white font-medium transition">Add Patient</a>
        </nav>
        
        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit" class="w-full py-2 px-4 text-left text-white hover:bg-gray-800 rounded transition">
                Logout
            </button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col py-8 px-4">
        <!-- Dashboard Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-white">Dashboard</h1>
            <div class="text-white">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-4xl text-sky-500 font-bold">410,198</div>
                <div class="text-gray-600">Patients Served</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-4xl text-sky-500 font-bold">348,647</div>
                <div class="text-gray-600">Patients Fitted</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-4xl text-sky-500 font-bold">655,177</div>
                <div class="text-gray-600">Hearing Aids Fitted</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-4xl text-sky-500 font-bold">69</div>
                <div class="text-gray-600">Mission Countries</div>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="bg-white rounded-lg shadow-lg flex-1 flex flex-col">
            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold">Global Mission Coverage</h2>
            </div>
            <div class="flex-1 p-4 flex items-center justify-center">
                <img src="{{ asset('images/map-sample.png') }}" alt="World Map" class="w-full h-auto max-h-[500px] object-contain rounded">
            </div>
        </div>
    </main>
</body>
</html>