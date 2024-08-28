<?php

namespace App\Http\Controllers;

use App\Mail\userWellcomeMessage;
use App\Models\Bank;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        $NumMsgProcessing = DB::table('messages')
                            ->where('status', 'Processing')
                            ->count();
        $NumMsgViewed = DB::table('messages')
                            ->where('status', 'Viewed')
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
        'superAdmin' => $superAdmin, 'NumMsgProcessing' => $NumMsgProcessing, 'NumMsgViewed' => $NumMsgViewed]);
    } 

    public function ViewMessages(){
        
        $solvedMessageCount = Message::where('request', 'accept')
                            ->where('status', 'solved')
                            ->count();
                                    
        $noSolvedMessageCount = Message::where('status', 'not resolved')
                            ->where('request', 'accept')
                            ->count();

        $ViewedMessageCount = Message::where('status', 'Viewed')
                            ->where('request', 'accept')
                            ->count();

        $processingMessageCount = Message::where('status', 'Processing')
                            ->where('request', 'accept')
                            ->count();
                                    

        $messagesAndBank = Message::with('bank')
                    ->where('request' , 'accept')
                    ->orderBy('created_at', 'DESC')
                    ->get();

        return view('superAdmin.messages',['messagesAndBank'=> $messagesAndBank, 
        'noSolvedMessageCount'=> $noSolvedMessageCount, 'solvedMessageCount'=> $solvedMessageCount,
        'ViewedMessageCount' => $ViewedMessageCount, 'processingMessageCount' => $processingMessageCount]);
    } 

    public function superAdminDetails($id){
        $superAdmin = User::where('user_type', 'super admin')->findOrFail($id);
        return view('superAdmin.superAdminDeatils', ['superAdmin'=>$superAdmin]);
    }

    public function superAdminUpdate(Request $request , $id){
        $superAdmin = User::where('user_type', 'super admin')->findOrFail($id);
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'user_contact_num' => 'required|string|max:12',
            'password' => 'nullable|string|min:8|confirmed',       
        ];

        // Create validator instance and validate
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $superAdmin->user_type = 'super admin';
        $superAdmin->name = $request->input('name');
        $superAdmin->email = $request->input('email');
        $superAdmin->status = $request->input('status');
        $superAdmin->user_contact_num = $request->input('user_contact_num');

         // Check if password is provided and update it
        if ($request->filled('password')) {
            $superAdmin->password = Hash::make($request->input('password'));
        }

        $superAdmin->update();

        // Redirect with a success message
        return redirect()->back()->with('success', 'User Update successfully!');
    }

    public function deleteSuperAdmin($id){
        $user =User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Super Admin deleted successfully.');
    }

        // for User Registration super admin
        public function RegisterSuperAdmin(Request $request){ 
            $rules = [
                'password' => 'required|string|min:8|max:32|confirmed',
                'user_contact_num' => 'required|string|max:12',
                'email' => 'required|string|email|max:255|unique:users,email',
                'name' => 'required|string|max:255',
            ];
    
            // Create validator instance and validate
            $validator = Validator::make($request->all(), $rules);
    
            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
    
            $newUser = new User;
            // $newUser->bank_id = $request->input('bank_id');
            $newUser->user_type = 'super admin';
            $newUser->name = $request->input('name');
            $newUser->email = $request->input('email');
            $newUser->user_contact_num = $request->input('user_contact_num');
            $newUser->password = Hash::make($request->input('password'));
            $newUser->save();
    
            //for sent the new register user
            $plainPassword = $request->input('password');
    
            //get user register pertion details
            if (Auth::check()) {
                //get authenticate admin details
                $RegisterAdminName=Auth::user()->name;
                $RegisterUserType=Auth::user()->user_type;
                $RegisterAadminEmail=Auth::user()->email;
                $RegisterAdminContactNumber=Auth::user()->user_contact_num;
            } else {
                return redirect()->route('login');
            }
    
            Mail::to($newUser->email)->send(new userWellcomeMessage($newUser->user_type, $newUser->name, $newUser->email, $newUser->user_contact_num, $plainPassword,
                    $RegisterAdminName, $RegisterUserType, $RegisterAadminEmail, $RegisterAdminContactNumber));
    
            // Redirect with a success message
            return redirect()->back()->with('success', 'User Registration successfully!');
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
        //get data for bank list component
        $users = DB::table('users')->get();
        $banks = DB::table('banks')
                ->orderBy('created_at', 'DESC')
                ->get();
        //end

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
        //get data for bank list component
        $users = DB::table('users')->get();
        $banks = DB::table('banks')
                ->orderBy('created_at', 'DESC')
                ->get();
        //end
        $bankCount = Bank::count();
        $activeBankCount = Bank::where('status', 'active')->count();
        $inactiveBankCount = Bank::where('status', 'inactive')->count();

        return view('superAdmin.banks',
        [ 'users' => $users, 'banks' => $banks, 'bankCount' => $bankCount, 'activeBankCount' => $activeBankCount, 'inactiveBankCount' => $inactiveBankCount ]);  
    }

    public function ViewOneBanks($id){
        $bank =Bank::find($id);
        return view('superAdmin.editBank', ['bank'=>$bank]);
    }

    public function bankUpdate(Request $request, $id){
            $bank = Bank::findOrFail($id);
                // validation rules
                $rules = [
                    'bank_contact_num' => 'required|string|max:10',
                    'email' => 'required|string|email|max:255',
                    'bank_address' => 'required|string|max:255',
                    'bank_name' => 'required|string|max:255',
                ];
        
                // Create validator instance and validate
                $validator = Validator::make($request->all(), $rules);
        
                // Check if validation fails
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
        
                $bank->bank_name = $request->input('bank_name');
                $bank->bank_address = $request->input('bank_address');
                $bank->bank_contact_num = $request->input('bank_contact_num');
                $bank->email = $request->input('email');
                $bank->update();

       return redirect()->back()->with('success', 'Bank Update successfully.');
    }

    public function bankDelete($id){
        $bank =Bank::find($id);
        $bank->delete();
        return redirect()->back()->with('success', 'Bank Remove successfully.');
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
