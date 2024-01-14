<?php

namespace App\Jobs;

use App\Mail\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactFormJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $formData;

    /**
     * Create a new job instance.
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('webroom.pro@yandex.ru')
            ->send(new ContactForm($this->formData));
    }
}
