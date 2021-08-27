<?php

namespace App\Providers;

use App\Listeners\VerifyUserEmail;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\NewUserhasRegisteredEvent;
use App\Listeners\WelcomeNewUserListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewUserhasRegisteredEvent::class => [
            WelcomeNewUserListener::class,
            VerifyUserEmail::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
