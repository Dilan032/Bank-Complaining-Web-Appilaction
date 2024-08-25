<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    public function superadminDashbord(){
        $NumMsg = DB::table('messages')
                            ->count();
        $NumMsgSolved = DB::table('messages')
                            ->where('status', 'solved')
                            ->count();
        $NumMsgNotSolved = DB::table('messages')
                            ->where('status', 'not resolved')
                            ->count();

        $NumBanks = DB::table('banks')
                            ->count();

        $Numusers = DB::table('users')
                            ->where('user_type', 'administrator')
                            ->orWhere('user_type', 'user')
                            ->count();
        $NumAdministrators = DB::table('users')
                            ->where('user_type', 'administrator')
                            ->count();
        $NumActiveAdministrators = DB::table('users')
                            ->where('user_type', 'administrator')
                            ->where('status', 'active')
                            ->count();
        $NumUsers = DB::table('users')
                            ->where('user_type', 'user')
                            ->count();
        $NumActiveUsers = DB::table('users')
                            ->where('user_type', 'user')
                            ->where('status', 'active')
                            ->count();

        $superAdmin = DB::table('users')
                        ->where('user_type', 'super admin')
                        ->get();


        return view('superAdmin.superAdminDashbord',
        ['NumMsg' => $NumMsg, 'NumMsgSolved' => $NumMsgSolved, 'NumMsgNotSolved' => $NumMsgNotSolved,
        'NumBanks' => $NumBanks, 'Numusers'=> $Numusers, 'NumAdministrators' => $NumAdministrators,
        'NumUsers' => $NumUsers, 'NumActiveAdministrators'=> $NumActiveAdministrators, 'NumActiveUsers'=>$NumActiveUsers,
        'superAdmin' => $superAdmin]);
    } 

    public function ViewMessages(){
        
        $solvedMessageCount = Message::where('request', 'accept')
                            ->where('status', 'solved')
                            ->count();
                                    
        $noSolvedMessageCount = Message::where('status', 'not resolved')
                            ->where('request', 'accept')
                            ->count();
                                    

        $messagesAndBank = Message::with('bank')
                    ->where('request' , 'accept')
                    ->orderBy('created_at', 'DESC')
                    ->get();

        return view('superAdmin.messages',['messagesAndBank'=> $messagesAndBank, 'noSolvedMessageCount'=> $noSolvedMessageCount, 'solvedMessageCount'=> $solvedMessageCount ]);
    } 

    public function ViewOneMessages($id){
        $oneMessage = Message::findorFail($id);

        return view('superAdmin.messageOne',['oneMessage'=> $oneMessage]);
    } 

    public function ProblemResolvedOrNot(Request $request, $id){
        $message=Message::findOrFail($id);

        $rules = [ 'status' => 'required|string' ];

        // Create validator instance and validate
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $message->status = $request->input('status');
        $message->update();

        return redirect()->back()->with('success', 'Message status updated');
    }

    public function ViewAnnouncements(){
        return view('superAdmin.announcements');
    } 

    //$banks variable used for while user registration form generate bank name list
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
                                    ->where('user_type', 'user')
                                    ->count();
        $inactiveUserCount = User::where('status', 'inactive')
                                    ->where('user_type', 'user')
                                    ->count();

        return view('superAdmin.users', 
        ['users' => $users, 'banks' => $banks,
        'activeAdministratorCount'=>$activeAdministratorCount, 'inactiveAdministratorCount'=>$inactiveAdministratorCount,
        'activeUserCount'=>$activeUserCount, 'inactiveUserCount'=>$inactiveUserCount]);
    }

    public function ViewBanks(){
        $users = DB::table('users')->get();
        $banks = DB::table('banks')->get();
        $bankCount = Bank::count();
        $activeBankCount = Bank::where('status', 'active')->count();
        $inactiveBankCount = Bank::where('status', 'inactive')->count();

        return view('superAdmin.banks',
        [ 'users' => $users, 'banks' => $banks, 'bankCount' => $bankCount, 'activeBankCount' => $activeBankCount, 'inactiveBankCount' => $inactiveBankCount ]);  
    }


    // [super admin] for logout
    public function superAdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

}
