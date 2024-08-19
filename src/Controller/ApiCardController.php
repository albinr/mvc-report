<?php

namespace App\Controller;

use App\Card\DeckOfCards;
use Exception;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiCardController extends AbstractController
{
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
        $deck = $cardArray ? new DeckOfCards(1, $cardArray) : new DeckOfCards();

        $deck->shuffleDeck();
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
    public function apiDraw(SessionInterface $session): Response
    {

        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards(1, $cardArray) : new DeckOfCards();

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
    public function apiMultiDraw(int $num, SessionInterface $session): Response
    {
        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards(1, $cardArray) : new DeckOfCards();

        if ($num > count($deck->getCards())) {
            throw new Exception("Can not draw more cards!");
        }

        $cards = [];
        $totalCards = count($deck->getCards());
        for ($i = 0; $i < $num && $i < $totalCards; $i++) {
            $card = $deck->dealCard();
            $cards[] = $card->getAsString();
        }


        $session->set('deck', $deck->toArray());
        $data = [
            'cards' => $cards,
            'remaining' => count($deck->getCards())
        ];

        return new JsonResponse($data);
    }
}
