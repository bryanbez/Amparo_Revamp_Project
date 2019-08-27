<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationCopyScheuleInfo extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $requse;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $requse)
    {
      $this->data = $data;
      $this->requse = $requse;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reservationCopy.reservationForm');
    }
}
