<?php

namespace App\Controller;

use App\Card\DeckOfCards;
use App\Game\TwentyOne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    #[Route("/", name: "home")]
    public function home(): Response
    {
        return $this->render('report/home.html.twig');
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('report/about.html.twig');
    }

    #[Route("/report", name: "report")]
    public function report(): Response
    {
        return $this->render('report/report.html.twig');
    }

    #[Route("/lucky", name: "lucky")]
    public function lucky(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'number' => $number
        ];

        return $this->render('report/lucky.html.twig', $data);
    }

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

    #[Route("/api/deck", name: "api_deck", methods: ['GET'])]
    public function apiDeck(SessionInterface $session): JsonResponse
    {
        $deck = new DeckOfCards();
        $session->set('deck', $deck->toArray());

        $cards = $deck->getCards();
        $deckArray = array_map(function ($card) {
            return [
                'card' => $card->getAsString()
            ];
        }, $cards);

        $data = [
            'deck' => $deckArray
        ];

        return new JsonResponse($data);
    }

    #[Route("/api/deck/shuffle", name: "api_deck_shuffle", methods: ['POST'])]
    public function apiDeckShuffle(SessionInterface $session): JsonResponse
    {
        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        $deck->shuffle();
        $session->set('deck', $deck->toArray());

        $cards = $deck->getCards();
        $deckArray = array_map(function ($card) {
            return [
                'card' => $card->getAsString()
            ];
        }, $cards);

        $data = [
            'deck' => $deckArray
        ];

        return new JsonResponse($data);
    }

    #[Route("/api/deck/draw", name: "api_deck_draw", methods: ['POST'])]
    public function draw(SessionInterface $session): Response
    {

        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        $card = $deck->dealCard();
        $session->set('deck', $deck->toArray());

        if (!$card) {
            $card = 'No more cards in the deck.';
        }

        $remaining = count($deck->getCards());

        $data = [
            'card' => [$card->getAsString()],
            'remaining' => $remaining
        ];

        return new JsonResponse($data);
    }

    #[Route("/api/deck/draw/{num<\d+>}", name: "api_deck_multi_draw")]
    public function multiDraw(
        int $num,
        SessionInterface $session
    ): Response {

        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        $cards = [];
        for ($i = 0; $i < $num; $i++) {
            if (count($deck->getCards()) > 0) {
                $card = $deck->dealCard();
                $cards[] = $card->getAsString();
            } else {
                break;
            }
        }

        $session->set('deck', $deck->toArray());

        $remaining = count($deck->getCards());

        $data = [
            'cards' => [$cards],
            'remaining' => $remaining
        ];

        return new JsonResponse($data);
    }

    #[Route("/api/game", name: "api_game_status")]
    public function apiGameStatus(SessionInterface $session): Response
    {
        if ($session->has('game')) {
            $game = unserialize($session->get('game'));

            $data = [
                'game-status' => $game->getStatus(),
                'player-score' => $game->getPlayerScore(),
                'bank-score' => $game->getBankScore(),
                'player-cards' => $game->getPlayerHand()->showHand(),
                'bank-cards' => $game->getBankHand()->showHand()
            ];
        } else {
            $data = [
                'game-status' => 'No game in progress.'
            ];
        }

        return new JsonResponse($data);
    }



    #[Route("/session", name: "session")]
    public function session(SessionInterface $session): Response
    {
        if (!$session->isStarted()) {
            $session->start();
        }

        $sessionData = $session->all();

        return $this->render('session.html.twig', ['sessionData' => $sessionData]);
    }

    #[Route("/session/delete", name: "session_delete")]
    public function sessionDelete(SessionInterface $session): Response
    {
        if (!$session->isStarted()) {
            $session->start();
        }

        $session->clear();

        $this->addFlash(
            'notice',
            'The session has been cleared'
        );

        return $this->redirectToRoute('session');
    }
}
