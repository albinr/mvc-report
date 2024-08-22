<?php

namespace App\Card;

/**
 * Class Player
 */
class Player
{
    private string $name;
    private int $dbId;
    private string $result;
    private CardHand $hand;


    public function __construct(int $dbId, string $name)
    {
        $this->dbId = $dbId;
        $this->name = $name;
        $this->hand = new CardHand();
        $this->result = "";
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

    public function setHand(CardHand $hand): void
    {
        $this->hand = $hand;
    }

    public function setWin()
    {
        $this->result = "win";
    }

    public function setLoss()
    {
        $this->result = "loss";
    }

    public function setDraw()
    {
        $this->result = "draw";
    }

    public function getResult()
    {
        return $this->result;
    }
}
