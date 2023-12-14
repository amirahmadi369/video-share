<?php

namespace App\Mail;
use App\Mail\MailMessage;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable implements shouldQueue
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->onQueue('low');
    }

    /**
     * Build the message.
     */
    public function build()
    {
    //   return $this->html((string)(new MailMessage)
    //     ->greeting("this is test")
    //     ->line("line one")
    //     ->action('test','http://google.com')
    //     ->render()
    // );
    return $this->markdown('emails.verify-email')->with([
        'url' => 'http://google.com'
    ]);
    }

}

  
