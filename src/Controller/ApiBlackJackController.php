<?php

namespace App\Controller;

use App\Entity\Player as PlayerDb;
use App\Card\BlackJack;
use App\Card\CardHand;
use App\Card\Player as ActivePlayer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiBlackJackController extends AbstractController
{
    #[Route("/api/blackjack/setup", name: "api_blackjack_setup", methods: ["POST"])]
    public function apiGameSetup(SessionInterface $session, ManagerRegistry $doctrine): JsonResponse
    {
        $session->remove('black_jack_game');
        $entityManager = $doctrine->getManager();
        $playerRepo = $entityManager->getRepository(PlayerDb::class);

        $dbPlayers = $playerRepo->findBy([], null, 4);

        if (count($dbPlayers) < 2) {
            return new JsonResponse(['error' => 'Not enough players in database. Minimum 2 players.']);
        }

        $foundPlayers = [];
        foreach ($dbPlayers as $dbPlayer) {
            $newPlayer = new ActivePlayer($dbPlayer->getPlayerId(), $dbPlayer->getName());
            $newPlayer->addHand(new CardHand()); #One hand per player (mabey add arg through url?)
            $foundPlayers[] = $newPlayer;
        }

        $game = new BlackJack($foundPlayers);
        $session->set('black_jack_game', $game->toSession());

        $players = [];
        foreach ($foundPlayers as $index => $player) {
            $playerHands = [];
            foreach ($player->getHands() as $handIndex => $hand) {
                $playerHands[] = [
                    'hand-index' => $handIndex,
                    'cards' => array_map(function ($card) {
                        return $card->getAsString();
                    }, $hand->getCards()),
                    'score' => $game->getPlayerHandScore($index, $handIndex)
                ];
            }

            $players[] = [
                'player-id' => $player->getId(),
                'player-name' => $player->getName(),
                'hands' => $playerHands
            ];
        }

        $data = [
            'status' => 'Game started',
            'players' => $players,
            'current-player' => $game->getCurrentPlayer(),
            'current-hand' => $game->getCurrentHand(),
            'bank' => [
                'bank-score' => $game->getBankScore(),
                'bank-cards' => array_map(function ($card) {
                    return $card->getAsString();
                }, $game->getBankHand()->getCards())
            ]
        ];

        return new JsonResponse($data);
    }


    #[Route("/proj/api/blackjack", name: "api_blackjack_status", methods: ["GET"])]
    public function apiGameStatus(SessionInterface $session): JsonResponse
    {
        $data = ['game-status' => 'No game in session.'];

        if ($session->has('black_jack_game')) {
            $gameData = $session->get('black_jack_game');
            $game = BlackJack::fromSession($gameData);

            $players = [];
            foreach ($game->getPlayers() as $index => $player) {
                $playerHands = [];
                foreach ($player->getHands() as $handIndex => $hand) {
                    $playerHands[] = [
                        'hand-index' => $handIndex,
                        'cards' => array_map(function ($card) {
                            return $card->getAsString();
                        }, $hand->getCards()),
                        'score' => $game->getPlayerHandScore($index, $handIndex)
                    ];
                }

                $players[] = [
                    'player-name' => $player->getName(),
                    'hands' => $playerHands
                ];
            }

            $data = [
                'game-status' => $game->getStatus(),
                'current-player' => $game->getCurrentPlayer(),
                'current-hand' => $game->getCurrentHand(),
                'players' => $players,
                'bank' => [
                    'bank-score' => $game->getBankScore(),
                    'bank-cards' => array_map(function ($card) {
                        return $card->getAsString();
                    }, $game->getBankHand()->getCards())
                ]
            ];
        }

        return new JsonResponse($data);
    }


    #[Route("/proj/api/blackjack/hit", name: "api_blackjack_hit")]
    public function apiGameHit(SessionInterface $session): JsonResponse
    {
        $data = ['game-status' => 'No game in progress.'];

        if ($session->has('black_jack_game')) {
            $gameData = $session->get('black_jack_game');
            $game = BlackJack::fromSession($gameData);

            $drawnCard = $game->hit(); // Hit for the current player's current hand
            $session->set('black_jack_game', $game->toSession());

            $data = [
                'current-player' => $game->getCurrentPlayer(),
                'current-hand' => $game->getCurrentHand(),
                'drawn-card' => $drawnCard ? $drawnCard->getAsString() : null
            ];
        }

        return new JsonResponse($data);
    }


    #[Route("/proj/api/blackjack/stand", name: "api_blackjack_stand")]
    public function apiGameStand(SessionInterface $session, ManagerRegistry $doctrine): JsonResponse
    {
        $data = ['game-status' => 'No game in progress.'];

        if ($session->has('black_jack_game')) {
            $gameData = $session->get('black_jack_game');
            $game = BlackJack::fromSession($gameData);

            $game->stand(); // Stand for the current player's current hand
            $session->set('black_jack_game', $game->toSession());

            if ($game->getStatus() === 'complete') {
                $entityManager = $doctrine->getManager();
                $results = $game->getGameResults();

                foreach ($results as $result) {
                    $playerDb = $entityManager->getRepository(PlayerDb::class)->find($result['player_id']);

                    if ($playerDb) {
                        if ($result['result'] === 'win') {
                            $playerDb->setWins($playerDb->getWins() + 1);
                        } elseif ($result['result'] === 'loss') {
                            $playerDb->setLosses($playerDb->getLosses() + 1);
                        }

                        $entityManager->persist($playerDb);
                    }
                }

                $entityManager->flush();
            }

            $data = [
                'game-status' => $game->getStatus(),
                'current-player' => $game->getCurrentPlayer(),
                'current-hand' => $game->getCurrentHand(),
            ];
        }

        return new JsonResponse($data);
    }


    #[Route("/proj/api/blackjack/deck", name: "api_blackjack_deck")]
    public function apiGameDeck(SessionInterface $session): Response
    {
        $data = ['game-status' => 'No game in progress.'];
        if ($session->has('black_jack_game')) {
            $gameData = $session->get('black_jack_game');
            $game = BlackJack::fromSession($gameData);

            $data = [
                'number-of-cards' => count($game->getDeck()->getCards()),
                'deck' => $game->getDeck()->toArray(),
            ];
        }

        return new JsonResponse($data);
    }
}
