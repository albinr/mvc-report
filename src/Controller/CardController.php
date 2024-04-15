<?php

namespace App\Controller;

use App\Card\DeckOfCards;
use App\Card\CardGraphic;
use App\Card\CardHand;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        $deck->sort();
        $session->set('deck', $deck->toArray());

        $renderCards = array_map(function ($card) {
            $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit());
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
        $deck = new DeckOfCards();
        $deck->shuffle();

        $session->set('deck', $deck->toArray());

        $renderCards = array_map(function ($card) {
            $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit());
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
        // $deck = $session->get('deck');
        // if (!$deck) {
        //     $deck = new DeckOfCards();
        //     $deck->shuffle();
        // }

        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        $card = $deck->dealCard();
        $session->set('deck', $deck->toArray());

        if ($card) {
            $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit());
            $renderedCard = $cardGraphic->render();
        } else {
            $renderedCard = 'No more cards in the deck.';
        }

        $remaining = count($deck->getCards());

        $data = [
            'cards' => [$renderedCard],
            'remaining' => $remaining
        ];

        return $this->render('card/draw.html.twig', $data);
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "multi_draw")]
    public function multiDraw(
        int $num,
        SessionInterface $session
    ): Response {

        // $deck = $session->get('deck');
        // if (!$deck) {
        //     $deck = new DeckOfCards();
        //     $deck->shuffle();
        // }

        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        if ($num > count($deck->getCards())) {
            throw new \Exception("Can not roll more than 99 dices!");
        }

        $cards = [];
        for ($i = 0; $i < $num; $i++) {
            if (count($deck->getCards()) > 0) {
                $card = $deck->dealCard();
                $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit());
                $cards[] = $cardGraphic->render();
            } else {
                break;
            }
        }

        $session->set('deck', $deck->toArray());

        $remaining = count($deck->getCards());

        $data = [
            'cards' => $cards,
            'remaining' => $remaining
        ];

        return $this->render('card/draw.html.twig', $data);
    }
}
