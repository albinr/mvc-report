<?php

namespace App\Controller;

use App\Entity\Player as PlayerDb;
use App\Entity\GameHistory;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjController extends AbstractController
{
    #[Route("/proj", name: "proj_home")]
    public function home(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $players = $entityManager->getRepository(PlayerDb::class)->findAll();
        $gameHistory = $entityManager->getRepository(GameHistory::class)->findAll();

        $gameHistory = array_reverse($gameHistory);

        return $this->render('proj/index.html.twig', [
            'players' => $players,
            'gameHistory' => $gameHistory,
        ]);
    }

    #[Route("/proj/about", name: "proj_about")]
    public function about(): Response
    {
        return $this->render('proj/about.html.twig');
    }

    #[Route("/proj/about/database", name: "proj_about_database")]
    public function aboutDatabase(): Response
    {
        return $this->render('proj/database.html.twig');
    }

    #[Route("/proj/api", name: "proj_api")]
    public function apiBlackJack(): Response
    {
        $apiRoutes = [
            [
                'name' => 'api_blackjack_setup',
                'description' => 'Setup a black jack game in the session.',
                'path' => 'api/blackjack/setup',
                'params' => [],
                'method' => 'POST',
            ],
            [
                'name' => 'api_blackjack_status',
                'path' => 'api/blackjack/status',
                'description' => 'Get a status of the current game in the session.',
                'params' => [],
                'method' => 'GET',
            ],
            [
                'name' => 'api_blackjack_hit',
                'path' => 'api/blackjack/hit',
                'description' => 'Call a hit for the current player in the game.',
                'params' => [],
                'method' => 'GET',
            ],
            [
                'name' => 'api_blackjack_stand',
                'path' => 'api/blackjack/stand',
                'description' => 'Call a stand for the current player in the game.',
                'params' => [],
                'method' => 'GET',
            ],
            [
                'name' => 'api_blackjack_deck',
                'path' => 'api/blackjack/deck',
                'description' => 'Get the current deck in use.',
                'params' => [],
                'method' => 'GET',
            ],
        ];

        $data = [
            'routes' => $apiRoutes,
        ];

        return $this->render('proj/api.html.twig', $data);
    }
}
