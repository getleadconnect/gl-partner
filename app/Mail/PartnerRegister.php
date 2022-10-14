<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PartnerRegister extends Mailable
{
    use Queueable, SerializesModels;

public $registeredUser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($registeredUser)
    {
        $this->registeredUser = $registeredUser;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        $fromAddress = config('mail.from.address');
        $subject = 'OTP verfication for Channel Partner';
        $fromName = config('mail.from.name');

        log::info($fromAddress);
        log::info($subject);
        log::info($fromName);

        return $this->view('emails.partnerregister')
                            ->from($fromAddress, $fromName)
                            ->replyTo($fromAddress, $fromName)
                            ->subject($subject)
                            // ->with([ 'test_message' => $this->data['message'] ]
                            ;
    
    }
}
