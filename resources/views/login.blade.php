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
<body class="font-sans bg-gray-100 min-h-screen flex flex-col">
    <!-- Top Colorful Banner -->
    <div class="w-full h-80 bg-cover bg-center" style="background-image: url('{{ asset('images/banner.jpg') }}');">
        <div class="flex flex-col items-center justify-center h-full bg-black/30 mb-4">
            <img src="{{ asset('images/starkeyLogo.png') }}" alt="Logo" class="h-50 mb-4 px-4">
        </div>
    </div>

    <!-- Centered Login Box -->
    <div class="flex-1 flex flex-col items-center justify-center -mt-30" style="background-image: url('{{ asset('images/continent.png') }}'); background-size: cover;">
        <div class="bg-white h-200 rounded-2xl shadow-xl w-full max-w-md mx-auto p-8">
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Login</h2>
                    <p class="text-gray-600 text-sm text-center mb-6">Please enter your credentials to continue.</p>
                </div>
                <div class="mb-4">
                    <input type="text" name="username" placeholder="Username" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required />
                </div>
                <div class="mb-2">
                    <input type="password" name="password" placeholder="Password" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required />
                </div>
                <div class="mb-4 text-right">
                    <a href="#" class="text-blue-700 text-sm underline">Forgot your password?</a>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-gray-800 to-gray-900 text-white rounded py-2 font-semibold hover:from-gray-900 hover:to-gray-800 transition">
                    LOGIN
                </button>
            </form>
        </div>
    </div>
</body>
</html>