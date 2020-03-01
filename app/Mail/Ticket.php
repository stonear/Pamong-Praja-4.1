<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Ticket extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $attachmentRAW;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $attachmentRAW)
    {
        $this->user = $user;
        $this->attachmentRAW = $attachmentRAW;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tiket ' . env('APP_NAME'))
        ->markdown('mail.ticket')
        ->attachData($this->attachmentRAW, 'ticket.jpeg', [
            'mime' => 'image/jpeg',
        ]);
    }
}
