<?php

namespace App\Http\Controllers;

use App\Mail\mail_for_problem;
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

class AdministratorController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $bankId = Auth::user()->bank_id;
            $userName = Auth::user()->name;

            $bank = DB::table('banks')
                    ->where('id', $bankId)
                    ->first();

            $NumAdministrators = DB::table('users')
                            ->where('bank_id', $bankId)
                            ->where('user_type', 'administrator')
                            ->count();

            $NumActiveAdministrators = DB::table('users')
                            ->where('bank_id', $bankId)
                            ->where('user_type', 'administrator')
                            ->where('status', 'active')
                            ->count(); 
            $NumInactiveAdministrators = DB::table('users')
                            ->where('bank_id', $bankId)
                            ->where('user_type', 'administrator')
                            ->where('status', 'inactive')
                            ->count();

            // count bank users
            $NumUsers = DB::table('users')
                    ->where('bank_id', $bankId)
                    ->where('user_type', 'user')
                    ->count();

            $NumActiveUsers = DB::table('users')
                    ->where('bank_id', $bankId)
                    ->where('user_type', 'user')
                    ->where('status', 'active')
                    ->count();
            $NumInactiveUsers = DB::table('users')
                    ->where('bank_id', $bankId)
                    ->where('user_type', 'user')
                    ->where('status', 'inactive')
                    ->count();

            //get message table details
            $NumMessages = DB::table('messages')
                            ->where('bank_id', $bankId)
                            ->count();

            $NumPendingMsg = DB::table('messages')
                            ->where('bank_id', $bankId)
                            ->where('request', 'pending')
                            ->count();
            $NumAcceptMsg = DB::table('messages')
                            ->where('bank_id', $bankId)
                            ->where('request', 'accept')
                            ->count();
            $NumRejectMsg = DB::table('messages')
                            ->where('bank_id', $bankId)
                            ->where('request', 'reject')
                            ->count();

            // message status count
            $NumSolvedMsg = DB::table('messages')
                            ->where('bank_id', $bankId)
                            ->where('status', 'solved')
                            ->count();
            $NumNotSolvedMsg = DB::table('messages')
                            ->where('bank_id', $bankId)
                            ->where('status', 'not resolved')
                            ->where('request', 'accept')
                            ->count();

            return view('administrator.administratorDashbord', 

            ['bank' => $bank, 'userName' => $userName, 'NumAdministrators' => $NumAdministrators,
            'NumUsers' => $NumUsers, 'NumActiveUsers' => $NumActiveUsers, 'NumInactiveUsers' => $NumInactiveUsers,
            'NumActiveAdministrators' => $NumActiveAdministrators, 'NumInactiveAdministrators' => $NumInactiveAdministrators,
            'NumMessages' => $NumMessages, 'NumPendingMsg' => $NumPendingMsg, 'NumAcceptMsg' => $NumAcceptMsg, 'NumRejectMsg' => $NumRejectMsg,
            'NumSolvedMsg' => $NumSolvedMsg, 'NumNotSolvedMsg' => $NumNotSolvedMsg]);
        } else {
            // Redirect to the login page or show an error
            return redirect()->route('login');
        }
    } 

    public function messages(){
        
        $userBankId = Auth::user()->bank_id;
        $messages = DB::table('messages')
                ->where('bank_id', $userBankId)
                ->orderBy('created_at', 'DESC')
                ->get();

        return view('administrator.message', ['messages' => $messages ]);
    } 

    public function showOneMessage($mid){
        $userid = Auth::id();
        $oneMessage = DB::table('messages')
                ->where('id', $mid)
                ->first();
        $messagesTableDataUser =Message::with('user')
                ->where('id', $mid)
                ->first();
               
        return view('administrator.messageOne', compact('oneMessage','messagesTableDataUser'));
    }

    public function ConformMessage(Request $request, $mid){
        $message=Message::findOrFail($mid);
        $message->request = $request->input('request');
        $message->update();

        //get message data from message table
        $subject = $message->subject;
        $messageDetails = $message->message;

        if (Auth::check()) {
            //get authenticate user details
            $userBankId=Auth::user()->bank_id;
            $administratorName=Auth::user()->name;
            $administratorEmail=Auth::user()->email;
            $administratorContactNumber=Auth::user()->user_contact_num;
        } else {
            return redirect()->route('login');
        }

        //get bank details
        $bankDetails=DB::table('banks')
                    ->where('id', $userBankId)
                    ->first();
        //get bank name, Address from bank table
        $bankName=$bankDetails->bank_name;
        $bankAddress=$bankDetails->bank_address;
        $bankContactNumber=$bankDetails->bank_contact_num;

        //get Super Admin Email Adress
        $superAdminEmail=DB::table('users')
                        ->where('user_type', 'super admin')
                        ->value('email');
            
        Mail::to($superAdminEmail)->send(new mail_for_problem($subject, $messageDetails, $administratorName, $administratorEmail, $administratorContactNumber, $bankName, $bankAddress, $bankContactNumber));

        return redirect()->back()->with('success', 'User message send to the Nanosoft Solutions (Pvt)Ltd'); 
    }

    public function RejectMessage(Request $request, $mid){
        $message=Message::findOrFail($mid);
        $message->request = $request->input('request');
        $message->update();

        return redirect()->back()->with('success', 'User message rejected'); 
    }

    public function SaveMessageAdminisrator(Request $request){
        //define validation rules
        $rules = [
            'subject'=> 'Required|String|max:255',
            'message'=> 'Required|String',
            'img_1'=> 'nullable|image|max:4096',
            'img_2'=> 'nullable|image|max:4096',
            'img_3'=> 'nullable|image|max:4096',
            'img_4'=> 'nullable|image|max:4096',
            'img_5'=> 'nullable|image|max:4096',
        ];

        //check rules
        $validator = Validator::make($request->all(),$rules);

        //if rules fails
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the authenticated user ID
        $userId = Auth::id();

        $NewMessage = new Message;
        $NewMessage->user_id = $userId;
        $NewMessage->bank_id = $request->input('bank_id');
        $NewMessage->subject = $request->input('subject');
        $NewMessage->request = $request->input('request');
        $NewMessage->message = $request->input('message');

        // Handle the image file uploads
        $imageFields = ['img_1', 'img_2', 'img_3', 'img_4', 'img_5'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $imageName = uniqid() .'_'. $field.'.'.$request->$field->extension();
                $request->$field->move(public_path('images/MessageWithProblem'), $imageName);
                $NewMessage->$field = $imageName;
            }
        }

        // Save the message to the database
        $NewMessage->save();

        return redirect()->route('administrator.messages')->with('success','Message Send to the Nanosoft Solutions Comapany');
    }


    public function announcements(){
        return view('administrator.Announcements');
    } 


    public function users(){
        if (Auth::check()) {
            $userBankId = Auth::user()->bank_id;
            //this $bank variable used for user registration model, for get bank list
            $banks = DB::table('banks')
                    ->where('id', $userBankId)
                    ->get();
            $users = DB::table('users')
                    ->get();

            return view('administrator.users', ['banks' => $banks, 'users'=> $users ]);
        } else {
            // Redirect to the login page or show an error
            return redirect()->route('login');
        }
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
