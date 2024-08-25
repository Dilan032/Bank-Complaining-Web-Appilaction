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



Route::get('/user/inactive',function(){
    return view('inactiveUserError');
});



Route::controller(SuperAdminController::class)->group(function () {
    Route::get('/superAdmin/dashbord', 'superAdminDashbord')->name('superAdmin.dashbord');
    Route::get('/superAdmin/messages', 'ViewMessages')->name('superAdmin.messages.view');
    Route::get('/superAdmin/messages/{id}', 'ViewOneMessages')->name('superAdmin.one.messages.view');
    Route::put('/superAdmin/messages/ProblemResolvedOrNot/{id}', 'ProblemResolvedOrNot')->name('superAdmin.problem.resolved.or.not');

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
    Route::get('/user/Message/{mid}', 'showOneMessage')->name('oneMessageForUser.show');
    // Route::get('/administrator/user/Message', 'onebankAllMessage')->name('oneMessage.show');
    // Route::get('/user/Message/{mid}', 'onebankAllMessage')->name('oneMessage.show');
    
})->middleware('auth');


Route::controller(UserController::class)->group(function () {
    Route::get('/user/userDashbord', 'index')->name('user.index');
    // Route::get('/profile/changePassword', 'changePassword')->name('user.changePassword');
    Route::post('/superAdmin/users', 'RegisterUsers')->name('RegisterUser.save');
    Route::post('/administrator/users', 'RegisterUsers')->name('RegisterUser.save');
    //for administrator
    Route::delete('/user/delete/{id}', 'deleteUser')->name('user.delete');

    Route::delete('/superAdmin/users/{id}', 'deleteUserForAdmin')->name('user.delete.for.admin');

    Route::get('/user/details/{id}', 'oneUserDetailsForAdministrator')->name('user.details');
    Route::put('/user/details/update/{id}', 'UsersUpdate')->name('user.details.update'); 
    //for super admin
    Route::get('/superAdmin/user/details/{id}', 'oneUserDetailsForSuperAdmin')->name('superAdmin.user.details'); 

    
    //for user
    Route::get('/user/logout', 'userLogout')->name('user.logout');
    
})->middleware('auth');


Route::controller(AdministratorController::class)->group(function () {
    Route::get('/administrator/dashboard', 'index')->name('administrator.index');
    Route::get('/administrator/messages', 'messages')->name('administrator.messages');
    Route::post('/administrator/messages/save', 'SaveMessageAdminisrator')->name('administrator.messages.save');

    Route::get('/administrator/Message/{mid}', 'showOneMessage')->name('oneMessageForAdministrator.show');
    Route::put('/administrator/Message/conform/{mid}', 'ConformMessage')->name('administrator.conform.message');
    Route::put('/administrator/Message/reject/{mid}', 'RejectMessage')->name('administrator.reject.message');
    Route::get('/administrator/announcements', 'announcements')->name('administrator.announcements');
    Route::get('/administrator/users', 'users')->name('administrator.users');
    Route::get('/administrator/logout', 'administratorLogout')->name('administrator.logout');

})->middleware('auth');



