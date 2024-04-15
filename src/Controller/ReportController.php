<?php

namespace App\Controller;

use App\Card\DeckOfCards;

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
            ],
            [
                'name' => 'api_deck',
                'path' => 'api/deck',
            ],
            [
                'name' => 'api_deck_shuffle',
                'path' => 'api/deck/shuffle',
            ],
            [
                'name' => 'api_deck_draw',
                'path' => 'api/deck/draw',
            ],
            // [
            //     'name' => 'api_deck_Multi_draw',
            //     'path' => 'api/deck/draw/:number',
            // ],

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
    public function apiDeck(): JsonResponse
    {
        $deck = new DeckOfCards();
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
        $deck = new DeckOfCards();
        $deck->shuffle();
        $session->set('deck', $deck);
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

    #[Route("/card/deck/draw", name: "api_deck_draw")]
    public function draw(SessionInterface $session): Response
    {
        $deck = $session->get('deck');
        if (!$deck) {
            $deck = new DeckOfCards();
            $deck->shuffle();
        }

        $card = $deck->dealCard();
        $session->set('deck', $deck);

        if ($card) {
        } else {
            $renderedCard = 'No more cards in the deck.';
        }

        $remaining = count($deck->getCards());

        $data = [
            'card' => [$renderedCard],
            'remaining' => $remaining
        ];

        return new JsonResponse($data);
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "api_deck_multi_draw")]
    public function multiDraw(
        int $num,
        SessionInterface $session
    ): Response {

        $deck = $session->get('deck');
        if (!$deck) {
            $deck = new DeckOfCards();
            $deck->shuffle();
        }

        $cards = [];
        for ($i = 0; $i < $num; $i++) {
            if (count($deck->getCards()) > 0) {
                $card = $deck->dealCard();
            } else {
                break;
            }
        }

        $remaining = count($deck->getCards());

        $data = [
            'cards' => $cards,
            'remaining' => $remaining
        ];

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
