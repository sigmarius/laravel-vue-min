<?php

namespace App\Providers;

use App\Events\CommentCreated;
use App\Listeners\NewCommentEmailNotification;
use App\Models\LaravelVersion;
use App\Observers\LaravelVersionObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CommentCreated::class => [
            NewCommentEmailNotification::class,
//            ... и другие обработчики, если нужно
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        LaravelVersion::observe(LaravelVersionObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
