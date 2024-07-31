<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function superadminDashbord(){
        return view('superAdmin.superAdminDashbord');
    } //end method

    public function ViewMessages(){
        return view('superAdmin.messages');
    } //end method

    public function ViewAnnouncements(){
        return view('superAdmin.announcements');
    } //end method

    public function ViewUsers(){
        $users = DB::table('users')->get();
        $banks = DB::table('banks')->get();
        $administratorCount = User::whereNotNull('bank_id')
                            ->where('user_type', 'administrator')
                            ->count();
        $userCount = User::whereNotNull('bank_id')
                            ->where('user_type', 'user')
                            ->count();

        return view('superAdmin.users', ['users' => $users, 'banks' => $banks,'administratorCount' => $administratorCount, 'userCount' => $userCount]);
    } //end method

    public function ViewBanks(){
        $users = DB::table('users')->get();
        $banks = DB::table('banks')->get();
        $bankCount = User::whereNotNull('id')
                            ->count();

        return view('superAdmin.banks',['users' => $users, 'banks' => $banks, 'bankCount' => $bankCount]);
    } //end method


    // [super admin] for logout
    public function superAdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }//end method

}
