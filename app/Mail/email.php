<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $to;
    public $msg;
    public $subject;
    public $from = 'Info@CMIC.org';

    public function __construct($email, $msg, $sub)
    {
        $this->to = explode(',',$email);
        $this->msg = $msg;
        $this->subject = $sub;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('User.Email.activate');
    }
}
