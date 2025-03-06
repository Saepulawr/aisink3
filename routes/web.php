<?php

use App\Http\Controllers\K3Controller;
use App\Http\Controllers\ProfileController;
use App\Models\K3;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [K3Controller::class, 'index']);
Route::get('/dashboard', [K3Controller::class, 'index'])->name("dashboard");


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [K3Controller::class, 'admin'])->name('admin');
    Route::post('/update', [K3Controller::class, 'update'])->name('admin.update');
});
Route::get('/api/k3', function () {
    $data = K3::latest()->first();
    return response()->json($data->toArray() + [
        'date_formated' => Carbon::parse(now())->format('d-m-Y'),
        'year' => Carbon::parse(now())->format('Y'),
    ]);
});
require __DIR__ . '/auth.php';
