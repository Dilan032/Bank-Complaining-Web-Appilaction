<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{
    public function index(){
        return view('administrator.administratorDashbord');
    } 
    public function messages(){
        return view('administrator.message');
    } 
    public function announcements(){
        return view('administrator.Announcements');
    } 
    public function users(){
        //this $bank variable used for user registration model, for get bank list
        $banks = DB::table('banks')->get();
        $users = DB::table('users')->get();

        return view('administrator.users', ['banks' => $banks, 'users'=> $users ]);
    } 
    
    // [administrator ] for logout
     public function administratorLogout(Request $request): RedirectResponse
     {
         Auth::guard('web')->logout();
 
         $request->session()->invalidate();
 
         $request->session()->regenerateToken();
 
         return redirect('/login');
     }//end method
}
