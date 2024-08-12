<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\MesageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
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



// Route::get('/user/dashboard',function(){
//     return view('user.userDashbord');
// });



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

});

Route::controller(mailController::class)->group(function () {
    Route::get('/sendEmail', 'sendEmail')->name('sendEmail');

});

Route::controller(MesageController::class)->group(function (){
    Route::post('/user/userDashbord', 'SaveMessage')->name('message.save');
    Route::get('/user/Message/{mid}', 'showOneMessage')->name('oneMessage.show');
    
})->middleware('auth');


Route::controller(UserController::class)->group(function () {
    Route::get('/user/userDashbord', 'index')->name('user.index');
    Route::post('/superAdmin/users', 'RegisterUsers')->name('RegisterUser.save');
    Route::post('/administrator/users', 'RegisterUsers')->name('RegisterUser.save');
    Route::delete('/user/delete/{id}', 'deleteUser')->name('user.delete');
    Route::get('/user/edit/{id}', 'oneUserDetails')->name('user.details'); 
    Route::get('/user/logout', 'userLogout')->name('user.logout');
    
})->middleware('auth');


Route::controller(AdministratorController::class)->group(function () {
    Route::get('/administrator/dashboard', 'index')->name('administrator.index');
    Route::get('/administrator/messages', 'messages')->name('administrator.messages');
    Route::get('/administrator/announcements', 'announcements')->name('administrator.announcements');
    Route::get('/administrator/users', 'users')->name('administrator.users');
    Route::get('/administrator/logout', 'administratorLogout')->name('administrator.logout');

})->middleware('auth');



