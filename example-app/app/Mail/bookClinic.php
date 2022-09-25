<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class bookClinic extends Mailable
{
    use Queueable, SerializesModels;
    public $bookClinic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookClinic)
  
    {
        // 
         $this->bookClinic=$bookClinic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.bookClinic');
    }
}
