<?php

namespace App\Http\Controllers;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQController extends Controller
{
    public function testConnection()
    {
        $connection = new AMQPStreamConnection(
            config('queue.connections.rabbitmq.host'),
            config('queue.connections.rabbitmq.port'),
            config('queue.connections.rabbitmq.login'),
            config('queue.connections.rabbitmq.password'),
            config('queue.connections.rabbitmq.vhost')
        );

        $channel = $connection->channel();

        $channel->close();
        $connection->close();

        return "Conexão com RabbitMQ bem-sucedida!";
    }
}