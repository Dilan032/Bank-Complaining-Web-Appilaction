<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $userBankId = Auth::user()->bank_id;
        //this $bank variable used for user registration model, for get bank list
        $banks = DB::table('banks')
                ->where('id', $userBankId)
                ->get();
        $users = DB::table('users')
                ->get();

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
