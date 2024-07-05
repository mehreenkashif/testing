<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/paypal-payment', function () {
    return view('paypalTesting');
});

Route::get('/success', function () {
    return 'success';
});
Route::get('/cancel', function () {
    return 'cancel';
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

  // source={{ uri: `http://192.168.1.48:8000/paypal-payment?amount=${amount}` }}
//   <Text>{`Loading: http://192.168.1.48:8000/paypal-payment?amount=${amount}`}</Text>