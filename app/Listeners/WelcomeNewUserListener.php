<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\CommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeNewUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = User::where('role', 'admin')->first();
        $admin->notify(new CommentNotification($event->user));
    }
}
