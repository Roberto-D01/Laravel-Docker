<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ProcessEmailQueue extends Command
{
    protected $signature = 'email:process';
    protected $description = 'Process emails from RabbitMQ queue';

    public function handle()
    {
        $connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST', 'localhost'),
            env('RABBITMQ_PORT', 5672),
            env('RABBITMQ_LOGIN', 'guest'),
            env('RABBITMQ_PASSWORD', 'guest')
        );

        $channel = $connection->channel();
        $channel->queue_declare('email_queue', false, true, false, false);

        $callback = function ($msg) {
            $data = json_decode($msg->body, true);

            $this->info("Email sent to user {$data['user_id']}");
        };

        $channel->basic_consume('email_queue', '', false, false, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }
    }
}
