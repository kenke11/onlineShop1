<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(Request $request){

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $contactMessage = $request->message;


        Mail::to('kenkebashvili2@gmail.com')->send(new OrderShipped($name, $email, $subject, $contactMessage));

        return redirect()->back()->withSuccess('მესიჯი წარმატებით გაიგზავნა');
    }
}
