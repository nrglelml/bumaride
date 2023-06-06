<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

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
        config(['mail.from.name' => 'bumaride ' . $name . ' ' . $surname]);

        try {
            Mail::send('contactus', $data, function ($message) use ($email, $request) {
                $subject = $request->input('message');
                $message->to('nurgul14102002@gmail.com')->subject($subject);
                $message->from($email);
                if (empty($subject)) {
                    $subject = 'No Subject';
                }

                $message->to($email)->subject($subject);
            });

            return redirect()->back()->with('success', 'Mail başarıyla gönderildi. En kısa zamanda yanıtlanacak:).');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mail gönderilirken bir hata oluştu: ' . $e->getMessage());
        }
    }
}
