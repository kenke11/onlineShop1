<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $subject;
    public $contactMessage;

    public function __construct($name, $email, $subject, $contactMessage)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->contactMessage = $contactMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail')
            ->from('kenkebashvili2@gmail.com')
            ->subject($this->subject);
    }
}
