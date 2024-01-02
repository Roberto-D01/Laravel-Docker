<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_id;
    public $amount;
    public $type;
    public $subject;
    public $body;

    public function __construct($data)
    {
        $this->user_id = $data['user_id'];
        $this->amount = $data['amount'];
        $this->type = $data['type'];
        $this->subject = $data['subject'];
        $this->body = $data['body'];
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.transaction')
                    ->with([
                        'user_id' => $this->user_id,
                        'amount' => $this->amount,
                        'type' => $this->type,
                        'body' => $this->body,
                    ]);
    }
}

