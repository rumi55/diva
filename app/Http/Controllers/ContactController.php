<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function sendEmail(Request $request){
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'text' => $request->text,
        ];
        Mail::to('sous.veillance@yandex.ru')->send(new ContactMail($data));
        return 'Сообщение отправлено!';

    }
}
