<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\UserCreated::class => [
            \App\Listeners\UserCreated::class,
        ],
        \App\Events\SearchCreated::class => [
            \App\Listeners\SearchCreated::class,
        ],
        \App\Events\SearchRetrieved::class => [
            \App\Listeners\SearchRetrieved::class,
        ],
        \App\Events\OfferAccepted::class => [
            \App\Listeners\OfferAcceptedNotification::class,
        ],
        \App\Events\OfferCreated::class => [
            \App\Listeners\OfferCreatedNotification::class
        ],
        \App\Events\MentionCreated::class => [
            \App\Listeners\MentionCreatedNotification::class
        ],
        \App\Events\MessageRetrieved::class => [
            \App\Listeners\MessageRetrieved::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
