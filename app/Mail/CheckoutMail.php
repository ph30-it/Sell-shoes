<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $email, $address, $phone, $payment, $items, $total;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $items, $total)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->address = $data['address'];
        $this->phone = $data['phone'];
        $this->payment = $data['payment'];
        $this->items = $items;
        $this->total = $total;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.checkout');
    }
}
