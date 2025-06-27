<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


// Public routes (login)
Route::get('/', function () {
    return view('login');
})->name('login.form');

Route::post('/', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    $user = User::where('Username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->PasswordHash)) {
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }
    return back()->withErrors([
        'username' => 'Invalid credentials',
    ]);
})->name('login.submit');

// Protected routes (only accessible if logged in)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'Logged out successfully');
    })->name('logout');

    Route::get('/hearing-form', function () {
        return view('phase1_form');
    })->name('hearing.form');

    Route::get('/hearing-form2', function () {
        return view('phase2_form');
    })->name('hearing.form2');

    Route::get('/hearing-form3', function () {
        return view('phase3_form');
    })->name('hearing.form3');
});

