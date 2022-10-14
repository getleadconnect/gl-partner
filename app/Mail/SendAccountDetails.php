<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAccountDetails extends Mailable
{
    use Queueable, SerializesModels;
    public $verifiedUser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verifiedUser)
    {
        $this->verifiedUser=$verifiedUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.account_details')
                    ->with('verifiedUser', $this->verifiedUser);
    }
}
