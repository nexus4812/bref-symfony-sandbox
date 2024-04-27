<?php

// src/MessageHandler/SmsNotificationHandler.php
namespace App\MessageHandler;

use App\Message\RequestCapture;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class RequestCaptureHandler
{
    public function __invoke(RequestCapture $message): void
    {
        print 'path is :' . $message->path . PHP_EOL;
    }
}
