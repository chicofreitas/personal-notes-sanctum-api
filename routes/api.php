<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['api-session'])->group(function () {
    
    Route::post('/login', function (Request $request) {
    
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return ['Status' => '200', 'data' => ['log' => 'Authenticated']];
        }
    
        return ['Status' => '401', 'data' => ['log' => 'Unauthorized']];
    });

    Route::get('/logout', function (Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return ['Message' => 'You are logged out.'];
    });
 
    Route::get('/get-token', function (Request $request) {
        $user = Auth::user();

        $token = $user->createToken('notes-token');

        return ['Your personal Token' => $token->plainTextToken, 'Message' => "Copy this token, and use it as a bearer token."];
    });

    Route::get('/logged', function () {
        return ['Message' => Auth::user() !== NULL];
    });

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notes', [NoteController::class, 'index'])->middleware('auth:sanctum');
