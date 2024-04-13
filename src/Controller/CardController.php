<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    #[Route("/card", name: "card")]
    public function api(): Response
    {
        $apiRoutes = [
            'quote' => 'api/quote',
        ];

        $data = [
            'routes' => $apiRoutes,
        ];

        return $this->render('card/card.html.twig', $data);
    }
}
