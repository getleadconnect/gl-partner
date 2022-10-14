<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

public $user;
public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(User $user,$password)
    {
        $this->user = $user;
        $this->password= $password;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        $fromAddress = config('mail.from.address');
        $subject = 'Welcome to GetLead';
        $fromName = config('mail.from.name');

        return $this->view('emails.registration')
                            ->from($fromAddress, $fromName)
                            ->replyTo($fromAddress, $fromName)
                            ->subject($subject)
                            // ->with([ 'test_message' => $this->data['message'] ]
                            ;
    }
}
