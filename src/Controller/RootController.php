<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RootController
{
    #[Route('/', name: 'root')]
    public function list(): Response
    {
        return new JsonResponse(['message' => 'hello']);
    }
}
