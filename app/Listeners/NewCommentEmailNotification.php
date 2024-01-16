<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use App\Mail\AddCommentForm;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewCommentEmailNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommentCreated $event): void
    {
        $user = User::findOrFail($event->comment->user_id);

        Mail::to('webroom.pro@yandex.ru')
            ->send(new AddCommentForm($event->postTitle, $event->comment->text, $user));
    }
}
