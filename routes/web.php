<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YouthController;
use App\Models\Youth;

Route::get('/', [YouthController::class, 'dashboard'])->name('dashboard');
Route::get('/database', [YouthController::class, 'database'])->name('database');
Route::get('/youths', [YouthController::class, 'index'])->name('youths.index');
Route::get('/youths/create', [YouthController::class, 'create'])->name('youths.create');
Route::resource('youths', YouthController::class);
// Route to store the new youth profile data (this is where the error is happening)
Route::post('/youths', [YouthController::class, 'store'])->name('youths.store');
Route::get('/youths/{youth}/edit', [YouthController::class, 'edit'])->name('youths.edit');
Route::put('/youths/{youth}', [YouthController::class, 'update'])->name('youths.update');
Route::delete('/youths/{youth}', [YouthController::class, 'destroy'])->name('youths.destroy');
Route::delete('/youths/{id}', [YouthController::class, 'destroy'])->name('youths.destroy');
Route::get('/create', [YouthController::class, 'create'])->name('create');

// Route to edit youth profile
Route::get('/youths/{id}/edit', [YouthController::class, 'edit'])->name('youths.edit');

// Route to update youth profile
Route::put('/youths/{id}', [YouthController::class, 'update'])->name('youths.update');
Route::get('/youths/{id}', [YouthController::class, 'show'])->name('youths.show');
Route::get('/youths/{id}', [YouthController::class, 'show']);
Route::get('/youths/{id}/edit', [YouthController::class, 'edit']);
Route::put('/youths/{id}', [YouthController::class, 'update']);



Route::get('/youths/{id}', function($id) {
    // Fetch the youth by id from the database
    $youth = Youth::find($id);
    
    // Return the youth details as JSON
    if ($youth) {
        return response()->json([
            'first_name' => $youth->first_name,
            'middle_name' => $youth->middle_name,
            'last_name' => $youth->last_name,
            'age' => \Carbon\Carbon::parse($youth->birth_date)->age,
            'sitio' => $youth->sitio,
            'highest_educational_attainment' => $youth->highest_educational_attainment,
            'email' => $youth->email,
            'contact_number' => $youth->contact_number,
            'sex' => $youth->sex,
            'civil_status' => $youth->civil_status,
            'work_status' => $youth->work_status,
            'registered_voter' => $youth->registered_voter,
        ]);
    } else {
        return response()->json(['error' => 'Youth not found'], 404);
    }
});



