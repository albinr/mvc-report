<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    #[Route("/session", name: "session")]
    public function session(SessionInterface $session): Response
    {
        // Check if the session is started
        if (!$session->isStarted()) {
            $session->start();
        }

        // Get all session data
        $sessionData = $session->all();

        // Pass the session data to the Twig template
        return $this->render('session.html.twig', ['sessionData' => $sessionData]);
    }

}
