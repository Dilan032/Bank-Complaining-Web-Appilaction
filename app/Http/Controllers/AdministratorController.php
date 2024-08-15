<?php

namespace App\Http\Controllers;

use App\Models\Message;
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

        $rules = [ 'request' => 'required|string|in:accept,pending,reject', ];

        // Create validator instance and validate
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $message->request = $request->input('request');
        $message->update();

        return redirect()->back()->with('success', 'User message send to the Nanosoft Solutions Company'); 
    }

    public function RejectMessage(Request $request, $mid){
        $message=Message::findOrFail($mid);

        $rules = [ 'request' => 'required|string|in:accept,pending,reject', ];

        // Create validator instance and validate
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $message->request = $request->input('request');
        $message->update();

        return redirect()->back()->with('success', 'User message rejected'); 
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
