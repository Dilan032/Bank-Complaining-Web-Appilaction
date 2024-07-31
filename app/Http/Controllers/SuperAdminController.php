<?php

namespace App\Http\Controllers;

use App\Models\Bank;
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
        // $administratorCount = User::where('user_type', 'administrator')->count();
        $activeAdministratorCount = User::where('status', 'active')
                                    ->where('user_type', 'administrator')
                                    ->count();
        $inactiveAdministratorCount = User::where('status', 'inactive')
                                    ->where('user_type', 'administrator')
                                    ->count();
        $activeUserCount = User::where('status', 'active')
                                    ->where('user_type', 'administrator')
                                    ->count();
        $inactiveUserCount = User::where('status', 'inactive')
                                    ->where('user_type', 'administrator')
                                    ->count();

        return view('superAdmin.users', 
        ['users' => $users, 'banks' => $banks,
        'activeAdministratorCount'=>$activeAdministratorCount, 'inactiveAdministratorCount'=>$inactiveAdministratorCount,
        'activeUserCount'=>$activeUserCount, 'inactiveUserCount'=>$inactiveUserCount]);
    } //end method

    public function ViewBanks(){
        $users = DB::table('users')->get();
        $banks = DB::table('banks')->get();
        $bankCount = Bank::count();
        $activeBankCount = Bank::where('status', 'active')->count();
        $inactiveBankCount = Bank::where('status', 'inactive')->count();

        return view('superAdmin.banks',
        [ 'users' => $users, 'banks' => $banks, 'bankCount' => $bankCount, 'activeBankCount' => $activeBankCount, 'inactiveBankCount' => $inactiveBankCount ]);
        
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
