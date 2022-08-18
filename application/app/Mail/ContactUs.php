<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $phone;
    public $content;

    public function __construct($name, $email, $phone, $content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Website Contact Us From')
                    ->from($this->email, $this->name)
                    ->view('email.contactus');
    }
}
