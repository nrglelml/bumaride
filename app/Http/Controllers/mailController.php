<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class mailController extends Controller
{
    public function send(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $message = $request->input('message');

        $data = [
            'name' => $name,
            'email' => $email,
            'surname' => $surname,
            'message' => $message,
        ];
        Config::set('mail.from.address', $email);
        Config::set('mail.from.name', 'bumaride ' . $name . ' ' . $surname);


        try {
            Mail::send('contactus', $data, function ($message) use ($email, $request) {
                $subject = $request->input('message');
                $message->to('nurgul14102002@gmail.com')->subject($subject);
                $message->from(config('mail.from.address'), config('mail.from.name'));

                if (empty($subject)) {
                    $subject = 'Konu yok';
                }

                $message->to('nurgul14102002@gmail.com')->subject($subject);
            });

            return redirect()->back()->with('success', 'Mail başarıyla gönderildi. En kısa zamanda yanıtlanacak:).');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mail gönderilirken bir hata oluştu: ' . $e->getMessage());
        }
    }
}

