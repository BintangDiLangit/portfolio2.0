<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Offerring extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $fullName;
    public $email;
    public $subject;
    public $message;
    public function __construct($fullName, $email, $subject, $message)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
            ->subject($this->subject)
            ->view('mail.email')
            ->with(
                [
                    'fullName' => $this->fullName,
                    'message' => $this->message,
                ]
            );
    }
}