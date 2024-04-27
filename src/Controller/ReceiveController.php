<?php

namespace App\Controller;

use App\Message\RequestCapture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ReceiveController extends AbstractController
{
    #[Route('/message/receive', name: 'message.receive')]
    public function index(
        MessageBusInterface $bus,
        Request $request,
    ): Response
    {
        $bus->dispatch(new RequestCapture(
            $request->getBasePath(),
            $request->server->getHeaders(),
            $request->query->all(),
        ));

        return new JsonResponse(['message' => 'Receive request']);
    }
}
