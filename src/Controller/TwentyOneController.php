<?php

namespace App\Controller;

use App\Card\TwentyOne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwentyOneController extends AbstractController
{
    #[Route("/game", name: "game")]
    public function home(SessionInterface $session): Response
    {
        $session->remove('game');
        return $this->render('twentyone/home.html.twig');
    }

    #[Route("/game/start", name: "game_start")]
    public function start(SessionInterface $session): Response
    {
        $game = new TwentyOne();
        $session->set('game', serialize($game));

        return $this->render('twentyone/game.html.twig', [
            'game' => $game,
        ]);
    }


    #[Route("/game/hit", name: "game_hit")]
    public function hit(SessionInterface $session): Response
    {
        $game = unserialize($session->get('game'));
        $game->hit();
        $session->set('game', serialize($game));

        return $this->render('twentyone/game.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route("/game/stand", name: "game_stand")]
    public function stand(SessionInterface $session): Response
    {
        $game = unserialize($session->get('game'));
        $game->stand();
        $session->set('game', serialize($game));

        return $this->render('twentyone/game.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route("/game/doc", name: "game_doc")]
    public function doc(): Response
    {
        return $this->render('twentyone/doc.html.twig');
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
}
