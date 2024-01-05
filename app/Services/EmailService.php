<?php

namespace App\Services;

use App\Models\Email;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class EmailService
{
    protected $rabbitMQProducer;

    public function __construct(RabbitMQProducerService $rabbitMQProducer)
    {
        $this->rabbitMQProducer = $rabbitMQProducer;
    }

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

            // Enviar mensagem para o RabbitMQ
            $this->rabbitMQProducer->sendEmailMessage([
                'user_id' => auth()->id(),
                'subject' => $subject,
                'body' => $body,
            ]);

            return true;
        } catch (\Exception $e) {
            // Log do erro
            \Log::error($e->getMessage());

            return false;
        }
    }
}
