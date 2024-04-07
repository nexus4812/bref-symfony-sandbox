<?php

namespace App\Controller;

use App\Message\SmsNotification;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ReceiveController
{
    #[Route('/message/receive', name: 'message.receive')]
    public function index(Request $request, MessageBusInterface $bus): Response
    {
        $bus->dispatch(new SmsNotification('Look! I created a message!'));

        return new JsonResponse(['message' => 'Received message']);
    }
}
