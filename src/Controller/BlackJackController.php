<?php

namespace App\Controller;

use App\Entity\Player as PlayerDb;
use App\Card\BlackJack;
use App\Card\Player as ActivePlayer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlackJackController extends AbstractController
{
    #[Route("/proj/blackjack", name: "blackjack_home")]
    public function home(SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $session->remove('black_jack_game');

        $entityManager = $doctrine->getManager();
        $players = $entityManager->getRepository(PlayerDb::class)->findAll();

        return $this->render('black_jack/home.html.twig', [
            'players' => $players,
        ]);
    }

    #[Route("/proj/blackjack/start", name: "blackjack_start", methods: ["POST"])]
    public function start(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $playerIds = $request->request->all('selectedPlayers', []);
        $entityManager = $doctrine->getManager();

        $foundPlayers = [];
        foreach ($playerIds as $playerId) {
            $playerInfo = $entityManager->getRepository(PlayerDb::class)->find($playerId);
            if ($playerInfo) {
                $foundPlayers[] = new ActivePlayer($playerInfo->getPlayerId(), $playerInfo->getName());
            }
        }
        $game = new BlackJack($foundPlayers);

        $session->set('black_jack_game', serialize($game));

        return $this->render('black_jack/game.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route("/proj/blackjack/hit", name: "blackjack_hit")]
    public function hit(SessionInterface $session): Response
    {
        $game = unserialize($session->get('black_jack_game'));
        $game->hit();
        $session->set('black_jack_game', serialize($game));

        return $this->render('black_jack/game.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route("/proj/blackjack/stand", name: "blackjack_stand")]
    public function stand(SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $game = unserialize($session->get('black_jack_game'));
        $game->stand();
        $session->set('black_jack_game', serialize($game));

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

        return $this->render('black_jack/game.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route("/proj/blackjack/doc", name: "blackjack_doc")]
    public function doc(): Response
    {
        return $this->render('black_jack/doc.html.twig');
    }

    #[Route("/api/blackjack/setup", name: "api_blackjack_setup", methods: ["POST"])]
    public function apiGameSetup(SessionInterface $session, ManagerRegistry $doctrine): JsonResponse
    {
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
        $session->set('black_jack_game', serialize($game));

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
            $game = unserialize($session->get('black_jack_game'));

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
            $game = unserialize($session->get('black_jack_game'));
            $drawnCard = $game->hit();
            $session->set('black_jack_game', serialize($game));

            $data = [
                'current-player' => $game->getCurrentPlayer(),
                'drawn-card' => $drawnCard->getAsString()
            ];
        }

        return new JsonResponse($data);
    }

    #[Route("/proj/api/blackjack/stand", name: "api_blackjack_stand")]
    public function apiGameStand(SessionInterface $session): Response
    {
        $data = ['game-status' => 'No game in progress.'];
        if ($session->has('black_jack_game')) {
            $game = unserialize($session->get('black_jack_game'));
            $game->stand();
            $session->set('black_jack_game', serialize($game));

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
            $game = unserialize($session->get('black_jack_game'));

            $data = [
                'number-of-cards' => count($game->getDeck()->getCards()),
                'deck' => $game->getDeck()->toArray(),
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/proj/blackjack/create_player_form', name: 'black_jack_create_player_form')]
    public function createPlayerForm(): Response
    {
        return $this->render('black_jack/create_player_form.html.twig');
    }

    #[Route('/blackjack/player/create', name: 'black_jack_create_player', methods: ['POST'])]
    public function createPlayer(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $player = new PlayerDb();
        $player->setName($request->request->get('name'));

        $entityManager->persist($player);
        $entityManager->flush();

        $this->addFlash('success', 'Created new player with id ' . $player->getPlayerId());

        return $this->redirectToRoute('blackjack_home');
    }

    #[Route('/proj/blackjack/player/delete/{playerid}', name: 'black_jack_delete_player', methods: ['POST'])]
    public function deletePlayer(
        ManagerRegistry $doctrine,
        int $playerid
    ): Response {
        $entityManager = $doctrine->getManager();
        $player = $entityManager->getRepository(PlayerDb::class)->find($playerid);

        if (!$player) {
            throw $this->createNotFoundException('No player found for id ' . $playerid);
        }

        $entityManager->remove($player);
        $entityManager->flush();

        $this->addFlash('success', 'Player deleted successfully');

        return $this->redirectToRoute('blackjack_home');
    }
}
