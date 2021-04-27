<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function send(){
        $obj = new \stdClass();
        Mail::to("ainukaaan@gmail.com")->send(new DemoEmail($obj));
        return "I sent email to you";
    }
}