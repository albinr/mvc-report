<?php

namespace App\Card;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Player as PlayerDb;

/**
 * Class Player
 */
class Player
{
    private string $name;
    private int $dbId;
    private string $result;
    private CardHand $hand;

    private EntityManagerInterface $entityManager;

    public function __construct(int $dbId, string $name)
    {
        $this->dbId = $dbId;
        $this->name = $name;
        $this->hand = new CardHand();
        $this->result = "playing";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->dbId;
    }

    public function getHand(): CardHand
    {
        return $this->hand;
    }

    public function setWin()
    {
        $this->result = "win";
    }

    public function setLoss()
    {
        $this->result = "loss";
    }

    public function getResult()
    {
        return $this->result;
    }
}
