<?php

namespace App\Controller;

use App\Card\DeckOfCards;
use Exception;
use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
    public function multiDraw(int $num, SessionInterface $session): Response
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

    #[Route("/api/game", name: "api_game_status")]
    public function apiGameStatus(SessionInterface $session): Response
    {
        $data = ['game-status' => 'No game in progress.'];
        if ($session->has('game')) {
            $game = unserialize($session->get('game'));

            $data = [
                'game-status' => $game->getStatus(),
                'player-score' => $game->getPlayerScore(),
                'bank-score' => $game->getBankScore(),
                'player-cards' => $game->getPlayerHand()->showHand(),
                'bank-cards' => $game->getBankHand()->showHand()
            ];
        }

        return new JsonResponse($data);
    }

    #[Route("/api/library/books", name: "api_library")]
    public function apiLibrary(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $bookRepository = $entityManager->getRepository(Book::class);
        $books = $bookRepository->findAll();

        $bookData = array_map(function ($book) {
            return [
                'id' => $book->getBookId(),
                'title' => $book->getTitle(),
                'author' => $book->getAuthor(),
                'isbn' => $book->getIsbn(),
                'image' => $book->getImage(),
            ];
        }, $books);

        return new JsonResponse(['books' => $bookData]);
    }

    #[Route("/api/library/book/{isbn}", name: "api_library_isbn")]
    public function apiBookIsbn(string $isbn, ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $bookRepository = $entityManager->getRepository(Book::class);
        $book = $bookRepository->findOneBy(['isbn' => $isbn]);

        if (!$book) {
            return new JsonResponse(['error' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        $bookData = [
            'id' => $book->getBookId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'isbn' => $book->getIsbn(),
            'image' => $book->getImage(),
        ];

        return new JsonResponse($bookData);
    }

}
