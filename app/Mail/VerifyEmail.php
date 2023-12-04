<?php
namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;
private $user;
    /**
     * Create a new message instance.
     */
    public function __construct( User $user)
    {
        $this->user= $user;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject('Verify Email')
            ->view('emails.verify-email')->with([
                'user_name'=>$this->user->name
            ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}