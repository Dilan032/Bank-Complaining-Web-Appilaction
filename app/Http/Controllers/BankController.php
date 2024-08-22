<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    // [super admin] for Bank Registration
    public function RegisterBank(Request $request){
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

        $bank = new Bank;
        $bank->bank_name = $request->input('bank_name');
        $bank->bank_address = $request->input('bank_address');
        $bank->bank_contact_num = $request->input('bank_contact_num');
        $bank->email = $request->input('email');
        $bank->save();

        // Redirect with a success message
        return redirect()->route('superAdmin.banks.view')->with('success', 'Bank Registration successfully!');
    } // end function


    
}