<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(){
        $userid = Auth::id();
        $bankList = DB::table('banks')
                            ->orderBy('created_at', 'DESC')
                            ->get();
        $messages =Message::with('user')
                            ->where('user_id', $userid)
                            ->orderBy('created_at', 'DESC')
                            ->get();
        return view('user.userDashbord', compact('bankList', 'messages', 'userid'));
    }

    
    // [super admin] for User Registration 
    public function RegisterUsers(Request $request){ 
        $rules = [
            'bank_id' => 'required|exists:banks,id',
            'user_type' => 'required|string|in:administrator,user',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'user_contact_num' => 'required|string|max:12',
            'password' => 'required|string|min:8|max:32|confirmed',        
        ];

        // Create validator instance and validate
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $newUser = new User;
        $newUser->bank_id = $request->input('bank_id');
        $newUser->user_type = $request->input('user_type');
        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->user_contact_num = $request->input('user_contact_num');
        $newUser->password = Hash::make($request->input('password'));
        $newUser->save();

        // Redirect with a success message
        return redirect()->route('superAdmin.users.view')->with('success', 'User Registration successfully!');
    }


    // [User ] for logout
    public function userLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }//end method

}
