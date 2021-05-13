<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($schedule)
    {
        $this->schedule=$schedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('a84989a9e0-1477dc@inbox.mailtrap.io')
        ->view('emails.reminder')
        ->with(['schedule'=>$this->schedule])
        ->subject('お知らせ');
    }
}
