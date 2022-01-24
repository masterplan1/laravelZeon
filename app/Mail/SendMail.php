<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('duty@example.com.ua')->view('emails.default', ['user' => $this->user])->subject('Стан обладнання');
        return $this->from('duty.kyiv@zeonbud.com.ua')->view('emails.default', ['user' => $this->user])->subject('Стан обладнання')->attach(storage_path('app/Стан обладнання.xlsx', [
            'mime' => Storage::mimeType('Стан обладнання.xlsx')
        ]));
    }
}
