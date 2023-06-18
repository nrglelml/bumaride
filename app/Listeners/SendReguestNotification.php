<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Notifications\RequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendReguestNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param   $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->user;

        // Yolculuğu oluşturan kullanıcıya bildirim gönderme
        $user->notify(new RequestNotification($user));
    }
}
