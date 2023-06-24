<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\TripHistory;
use App\Models\Trip;
use App\Models\User;
use App\Notifications\RequestNotification;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = Auth::user()->unreadNotifications;
        //dd($notifications);

        return view('notifications', compact('notifications'));
    }

    public function createNotification($travel_id)
    {
        $travel = Trip::findOrFail($travel_id);
        $user = $travel->user;

        if ($user) {


            $notification = new RequestNotification($user);
            $user->notify($notification);


            return redirect()->back()->with('success', 'Bildirim başarıyla oluşturuldu.');
        } else {
            return redirect()->back()->with('error', 'Bildirim oluşturmak için oturum açmanız gerekmektedir.');
        }
    }



    public function accept(Request $request)
    {
        $notificationId = $request->input('id');
        $user = auth()->user();


        $notification = $user->unreadNotifications->where('id', $notificationId)->first();
        if ($notification) {
            $notification->markAsRead();



            return redirect()->route('chatify')->with('success', 'Yolculuğunuzu planlamaya başlayın');
        }


        return redirect()->back()->with('error', 'Bildirim bulunamadı.');
    }


    public function deny(Request $request)
    {
        $notificationId = $request->input('id');
        $user = auth()->user();


        $notification = $user->unreadNotifications->where('id', $notificationId)->first();

        if ($notification) {
            $notification->markAsRead();

            if (isset($notification->data['notification_id'])) {
                TripHistory::create([
                    'travel_id' => $notification->data['notification_id'],
                    'user_id' => $user->id,
                    'departure' => $notification->departure,
                    'destination' => $notification->destination,
                    'date' => $notification->date,
                    'description' => $notification->description,
                    'people_num' => $notification->people_num,
                ]);
                $notification->delete();
                return response()->noContent();
            }

            return redirect()->back()->with('error', 'Bildirim verisinde travel_id bulunamadı.');
        }


    }

}
