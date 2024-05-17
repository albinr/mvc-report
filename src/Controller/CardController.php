<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\DeckOfCards;
use App\Card\CardGraphic;
use Exception;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    private function renderCard(Card $card): string
    {
        $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit(), $card->getId());
        return $cardGraphic->render();
    }

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

        $deck->sortDeck();
        $session->set('deck', $deck->toArray());

        // $renderCards = array_map(function ($card) {
        //     $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit(), $card->getId());
        //     return $cardGraphic->render();
        // }, $deck->getCards());

        $renderCards = array_map([$this, 'renderCard'], $deck->getCards());

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
        $deck->shuffleDeck();

        $session->set('deck', $deck->toArray());

        // $renderCards = array_map(function ($card) {
        //     $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit(), 1);
        //     return $cardGraphic->render();
        // }, $deck->getCards());

        $renderCards = array_map([$this, 'renderCard'], $deck->getCards());

        $data = [
            'cards' => $renderCards
        ];

        return $this->render('card/deck.html.twig', $data);
    }

    #[Route("/card/deck/draw", name: "draw")]
    public function draw(SessionInterface $session): Response
    {
        $deck = new DeckOfCards($session->get('deck') ?? []);
        $card = $deck->dealCard();
        $session->set('deck', $deck->toArray());

        if (!$card) {
            return $this->render('card/draw.html.twig', [
                'cards' => ['No more cards in the deck.'],
                'remaining' => 0
            ]);
        }

        return $this->render('card/draw.html.twig', [
            'cards' => [$this->renderCard($card)],
            'remaining' => count($deck->getCards())
        ]);
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "multi_draw")]
    public function multiDraw(int $num, SessionInterface $session): Response
    {
        $cardArray = $session->get('deck');
        $deck = $cardArray ? new DeckOfCards($cardArray) : new DeckOfCards();

        if ($num > count($deck->getCards())) {
            throw new Exception("Cannot draw more cards!");
        }

        $cards = [];
        for ($i = 0; $i < $num; $i++) {
            $card = $deck->dealCard();
            $cards[] = $this->renderCard($card);
        }

        $session->set('deck', $deck->toArray());

        $data = [
            'cards' => $cards,
            'remaining' => count($deck->getCards())
        ];

        return $this->render('card/draw.html.twig', $data);
    }
}
