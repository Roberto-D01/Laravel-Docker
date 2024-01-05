<?php

namespace App\Services;

use App\Models\Email;
use App\Mail\TransactionMail;

class EmailService
{
    public function sendTransactionEmail($to, $subject, $body)
    {
        try {
            // Lógica para enviar email
            Email::create([
                'user_id' => auth()->id(),
                'subject' => $subject,
                'body' => $body,
                'sent_at' => now(),
            ]);

            \Mail::to($to)->send(new TransactionMail([
                'user_id' => auth()->id(),
                'amount' => $amount,
                'type' => $type,
                'subject' => $subject,
                'body' => $body,
            ]));

            return true;
        } catch (\Exception $e) {
        
            \Log::error($e->getMessage());

            return false;
        }
    }
}
