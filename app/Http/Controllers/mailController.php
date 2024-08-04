<?php

namespace App\Http\Controllers;

use App\Mail\mail_for_problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function sendEmail(){
        $to = "dilankanishka032@gmail.com";
        $message = "This is Message";
        $subject = "subject message";

        Mail::to($to)->send(new mail_for_problem($message, $subject));

    }
}
