<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/error', function () {
    return view('404');
})->name('404');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::controller(SuperAdminController::class)->group(function () {
    Route::get('/superAdmin/dashbord', 'superAdminDashbord')->name('superAdmin.dashbord');
    Route::get('/superAdmin/messages', 'ViewMessages')->name('superAdmin.messages.view');
    Route::get('/superAdmin/announcements', 'ViewAnnouncements')->name('superAdmin.announcements.view');
    Route::get('/superAdmin/users', 'ViewUsers')->name('superAdmin.users.view');
    Route::get('/superAdmin/banks', 'ViewBanks')->name('superAdmin.banks.view');
    
    Route::get('/superAdmin/logout', 'superAdminLogout')->name('superAdmin.logout');
});


Route::controller(BankController::class)->group(function () {
    Route::post('/superAdmin/banks', 'RegisterBank')->name('RegisterBank.save');
    Route::get('/superAdmin/banks', 'showBankDetails')->name('superAdmin.banks.view');

});



