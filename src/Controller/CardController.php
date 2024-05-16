<?php

namespace App\Controller;

use App\Card\DeckOfCards;
use App\Card\CardGraphic;
use Exception;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    #[Route("/card", name: "card")]
    public function card(): Response
    {
        $routes = [
            [
                'name' => 'deck',
                'path' => 'card/deck',
                'params' => [],
            ],
            [
                'name' => 'shuffle',
                'path' => 'card/deck/shuffle',
                'params' => [],
            ],
            [
                'name' => 'draw',
                'path' => 'card/deck/draw',
                'params' => [],
            ],
            [
                'name' => 'multi_draw',
                'path' => 'card/deck/draw/5',
                'params' => ['num' => 5],
            ],
        ];

        $data = [
            'routes' => $routes,
        ];

        return $this->render('card/home.html.twig', $data);
    }

    #[Route('/card/deck', name: 'deck')]
    public function deck(SessionInterface $session): Response
    {
        $cardArray = $session->get('deck');
        $deck = new DeckOfCards($cardArray ? $cardArray : null);

        $deck->sort();
        $session->set('deck', $deck->toArray());

        $renderCards = array_map(function ($card) {
            $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit(), $card->getId());
            return $cardGraphic->render();
        }, $deck->getCards());

        $data = [
            'cards' => $renderCards
        ];

        return $this->render('card/deck.html.twig', $data);
    }


    #[Route("/card/deck/shuffle", name: "shuffle")]
    public function shuffle(SessionInterface $session): Response
    {
        $session->remove('deck');
        $deck = new DeckOfCards();
        $deck->shuffle();

        $session->set('deck', $deck->toArray());

        $renderCards = array_map(function ($card) {
            $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit(), 1);
            return $cardGraphic->render();
        }, $deck->getCards());

        $data = [
            'cards' => $renderCards
        ];

        return $this->render('card/deck.html.twig', $data);
    }

    #[Route("/card/deck/draw", name: "draw")]
    public function draw(SessionInterface $session): Response
    {

        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        $card = $deck->dealCard();
        $session->set('deck', $deck->toArray());

        $renderedCard = 'No more cards in the deck.';

        if ($card) {
            $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit(), 1);
            $renderedCard = $cardGraphic->render();
        }

        $remaining = count($deck->getCards());

        $data = [
            'cards' => [$renderedCard],
            'remaining' => $remaining
        ];

        return $this->render('card/draw.html.twig', $data);
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "multi_draw")]
    public function multiDraw(int $num, SessionInterface $session): Response
    {

        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        if ($num > count($deck->getCards())) {
            throw new Exception("Can't draw more cards!");
        }

        $cards = [];
        for ($i = 0; $i < $num; $i++) {
            if (count($deck->getCards()) === 0) {
                break;
            }
            $card = $deck->dealCard();
            $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit(), 1);
            $cards[] = $cardGraphic->render();
        }

        $session->set('deck', $deck->toArray());

        $remaining = count($deck->getCards());

        $data = [
            'cards' => $cards,
            'remaining' => $remaining
        ];

        return $this->render('card/draw.html.twig', $data);
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
    public function apiDraw(SessionInterface $session): Response
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
    public function apiMultiDraw(int $num, SessionInterface $session): Response
    {
        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

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
