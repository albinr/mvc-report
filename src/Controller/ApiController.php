<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route("/api", name: "api")]
    public function api(): Response
    {
        $apiRoutes = [
            [
                'name' => 'quote',
                'path' => 'api/quote',
                'params' => [],
                'method' => 'GET',
            ],
            [
                'name' => 'api_deck',
                'path' => 'api/deck',
                'params' => [],
                'method' => 'GET',
            ],
            [
                'name' => 'api_deck_shuffle',
                'path' => 'api/deck/shuffle',
                'params' => [],
                'method' => 'POST',
            ],
            [
                'name' => 'api_deck_draw',
                'path' => 'api/deck/draw',
                'params' => [],
                'method' => 'POST',
            ],
            [
                'name' => 'api_deck_multi_draw',
                'path' => 'api/deck/draw/5',
                'params' => ['num' => 5],
                'method' => 'POST',
            ],
            [
                'name' => 'api_game_status',
                'path' => 'api/game',
                'params' => [],
                'method' => 'GET',
            ],
            [
                'name' => 'api_library',
                'path' => 'api/library',
                'params' => [],
                'method' => 'GET',
            ],
            [
                'name' => 'api_library_isbn',
                'path' => 'api/library/book/9780340960196',
                'params' => ['isbn' => "9780340960196"],
                'method' => 'POST',
            ],
        ];

        $data = [
            'routes' => $apiRoutes,
        ];

        return $this->render('report/api.html.twig', $data);
    }

    #[Route("/api/quote", name: "quote")]
    public function apiQuote(): JsonResponse
    {
        $quotes = [
            "Life is what happens when you're busy making other plans. - John Lennon",
            "The greatest glory in living lies not in never falling, but in rising every time we fall. - Nelson Mandela",
            "The way to get started is to quit talking and begin doing.  - Disney",
            "Only a life lived for others is a life worthwhile.  - Albert Einstein",
        ];

        $quote = $quotes[array_rand($quotes)];
        $data = [
            'quote' => $quote,
            'date' => date('Y-m-d'),
            'timestamp' => date('H:i:s'),
        ];

        return new JsonResponse($data);
    }

}
