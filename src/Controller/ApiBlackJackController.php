<?php

namespace App\Controller;

use App\Entity\Player as PlayerDb;
use App\Card\BlackJack;
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
            $foundPlayers[] = new ActivePlayer($dbPlayer->getPlayerId(), $dbPlayer->getName());
        }

        $game = new BlackJack($foundPlayers);
        $session->set('black_jack_game', $game->toSession());

        $players = [];
        foreach ($foundPlayers as $index => $player) {
            $players[] = [
                'player-id' => $player->getId(),
                'player-name' => $player->getName(),
                'player-cards' => array_map(function ($card) {
                    return $card->getAsString();
                }, $player->getHand()->getCards()),
                'player-score' => $game->getPlayerScore($index)
            ];
        }

        $data = [
            'status' => 'Game started',
            'players' => $players,
            'current-player' => $game->getCurrentPlayer(),
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
                $players[] = [
                    'player-name' => $player->getName(),
                    'player-score' => $game->getPlayerScore($index),
                    'player-cards' => array_map(function ($card) {
                        return $card->getAsString();
                    }, $player->getHand()->getCards())
                ];
            }

            $data = [
                'game-status' => $game->getStatus(),
                'current-player' => $game->getCurrentPlayer(),
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
    public function apiGameHit(SessionInterface $session): Response
    {
        $data = ['game-status' => 'No game in progress.'];
        if ($session->has('black_jack_game')) {
            $gameData = $session->get('black_jack_game');
            $game = BlackJack::fromSession($gameData);
            $drawnCard = $game->hit();
            $session->set('black_jack_game', $game->toSession());

            $data = [
                'current-player' => $game->getCurrentPlayer(),
                'drawn-card' => $drawnCard->getAsString()
            ];
        }

        return new JsonResponse($data);
    }

    #[Route("/proj/api/blackjack/stand", name: "api_blackjack_stand")]
    public function apiGameStand(SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $data = ['game-status' => 'No game in progress.'];
        if ($session->has('black_jack_game')) {
            $gameData = $session->get('black_jack_game');
            $game = BlackJack::fromSession($gameData);

            $game->stand();
            $session->set('black_jack_game', $game->toSession());

            if ($game->getStatus() === 'complete') {
                $entityManager = $doctrine->getManager();

                $results = $game->getGameResults();

                foreach ($results as $result) {
                    $playerDb = $entityManager->getRepository(PlayerDb::class)->find($result['id']);

                    if ($playerDb) {
                        if ($result['status'] === 'win') {
                            $playerDb->setWins($playerDb->getWins() + 1);
                        } elseif ($result['status'] === 'lose') {
                            $playerDb->setLosses($playerDb->getLosses() + 1);
                        }

                        $entityManager->persist($playerDb);
                    }
                }
                $entityManager->flush();
            }

            $data = [
                'current-player' => $game->getCurrentPlayer(),
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
