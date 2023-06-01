<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendEmailToClient extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_from = env('MAIL_FROM_ADDRESS');
        $mailing = $this->subject("Novo Pedido do cliente - {$this->data['client']['name']}")
            ->from($email_from, "Novo Pedido do cliente - {$this->data['client']['name']}")
            ->view('mail.send_email_to_client', ['data' => $this->data]);

        return $mailing;
    }

}
