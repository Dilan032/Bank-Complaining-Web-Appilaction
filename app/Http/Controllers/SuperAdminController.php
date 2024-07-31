<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('superAdmin.users');
    } //end method

    public function ViewBanks(){
        return view('superAdmin.banks');
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
