<?php

namespace App\Controller;

use App\Entity\Player as PlayerDb;
use App\Entity\GameHistory;
use App\Card\BlackJack;
use App\Card\Player as ActivePlayer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
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
        $gameHistory = $entityManager->getRepository(GameHistory::class)->findAll();

        return $this->render('black_jack/home.html.twig', [
            'players' => $players,
            'gameHistory' => $gameHistory,
        ]);
    }

    #[Route("/proj/blackjack/start", name: "blackjack_start", methods: ["POST"])]
    public function start(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $playerIds = $request->request->all('selectedPlayers', []);
        $handsData = $request->request->all('hands', []);

        $entityManager = $doctrine->getManager();
        $foundPlayers = [];

        foreach ($playerIds as $playerId) {
            $playerInfo = $entityManager->getRepository(PlayerDb::class)->find($playerId);
            if ($playerInfo) {
                $player = new ActivePlayer($playerInfo->getPlayerId(), $playerInfo->getName(), $handsData[$playerId]);

                $foundPlayers[] = $player;
            }
        }

        if (empty($foundPlayers)) {
            $this->addFlash('warning', 'No players were selected.');

            return $this->redirectToRoute('blackjack_home');
        }

        $game = new BlackJack($foundPlayers);

        $session->set('black_jack_game', $game->toSession());

        return $this->redirectToRoute('blackjack_game');
    }

    #[Route("/proj/blackjack/game", name: "blackjack_game")]
    public function game(SessionInterface $session): Response
    {
        $gameData = $session->get('black_jack_game');
        $game = BlackJack::fromSession($gameData);

        return $this->render('black_jack/game.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route("/proj/blackjack/hit", name: "blackjack_hit")]
    public function hit(SessionInterface $session): Response
    {
        $gameData = $session->get('black_jack_game');
        $game = BlackJack::fromSession($gameData);

        $game->hit();
        $session->set('black_jack_game', $game->toSession());

        return $this->redirectToRoute('blackjack_game');
    }

    #[Route("/proj/blackjack/stand", name: "blackjack_stand")]
    public function stand(SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $gameData = $session->get('black_jack_game');
        $game = BlackJack::fromSession($gameData);

        $game->stand();

        if ($game->getStatus() === 'complete') {
            $entityManager = $doctrine->getManager();
            $results = $game->getGameResults();

            $playerData = [];

            foreach ($results as $result) {
                $playerDb = $entityManager->getRepository(PlayerDb::class)->find($result['player_id']);

                if ($playerDb) {
                    if ($result['result'] === 'win') {
                        $playerDb->setWins($playerDb->getWins() + 1);
                    } elseif ($result['result'] === 'loss') {
                        $playerDb->setLosses($playerDb->getLosses() + 1);
                    }

                    $entityManager->persist($playerDb);

                    $playerData[] = [
                        'id' => $playerDb->getPlayerId(),
                        'name' => $playerDb->getName(),
                        'score' => $result['score'],
                        'result' => $result['result']
                    ];
                }
            }

            $gameHistory = new GameHistory();
            $gameHistory->setGameDate(new \DateTime());
            $gameHistory->setPlayerDataJson($playerData);
            $gameHistory->setBankScore($game->getBankScore());
            $entityManager->persist($gameHistory);
            $entityManager->flush();
        }

        $session->set('black_jack_game', $game->toSession());


        return $this->redirectToRoute('blackjack_game');
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
        $playerName = $request->request->get('name');

        $existingPlayer = $entityManager->getRepository(PlayerDb::class)->findOneBy(['name' => $playerName]);

        if ($existingPlayer) {
            $this->addFlash('warning', 'Name is already in use. Choose a different name.');
            return $this->redirectToRoute('black_jack_create_player_form');
        }

        $player = new PlayerDb();
        $player->setName($playerName);

        $entityManager->persist($player);
        $entityManager->flush();

        $this->addFlash('notice', 'Created new player '. $playerName .' with id ' . $player->getPlayerId());

        return $this->redirectToRoute('proj_home');
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

        $this->addFlash('notice', 'Player deleted successfully');

        return $this->redirectToRoute('proj_home');
    }
}
