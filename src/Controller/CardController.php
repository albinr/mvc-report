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
            'Deck' => "deck",
            'Shuffle' => "shuffle",
            'Draw' => "draw",
        ];

        $data = [
            'routes' => $routes,
        ];

        return $this->render('card/home.html.twig', $data);
    }

    #[Route('/card/deck', name: 'deck')]
    public function deck(SessionInterface $session): Response
    {
        $deck = $session->get('deck');
        if (!$deck) {
            $deck = new DeckOfCards();
            $session->set('deck', $deck);
        }

        $deck->sort();

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
        $session->set('deck', $deck);

        $deck->shuffle();

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
        $deck = $session->get('deck');
        if (!$deck) {
            $deck = new DeckOfCards();
            $deck->shuffle();
        }

        $card = $deck->dealCard();
        $session->set('deck', $deck);

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

        $deck = $session->get('deck');
        if (!$deck) {
            $deck = new DeckOfCards();
            $deck->shuffle();
        }

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

        $remaining = count($deck->getCards());

        $data = [
            'cards' => $cards,
            'remaining' => $remaining
        ];

        return $this->render('card/draw.html.twig', $data);
    }
}
