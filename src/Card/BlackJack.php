<?php

namespace App\Card;

use InvalidArgumentException;

/**
 * Class BlackJack handles the game logic for the game 21.
 */
class BlackJack
{
    private DeckOfCards $deck;
    private array $players;
    private int $currentPlayer = 0;
    private int $currentHand = 0;
    private CardHand $bankHand;
    private string $status;

    /**
     * Constructor initializes the game with a shuffled deck, game status and empty hands for players and bank.
     *
     * @param int[] $numPlayers The number of players (2-7).
     */
    public function __construct(array $playerList, bool $isNewGame = true)
    {
        if (count($playerList) < 1) {
            throw new InvalidArgumentException('Must be at least one player to start game!!');
        }

        $this->players = $playerList;
        $numDecks = 1;
        if (count($this->players) > 3) {
            $numDecks = 2;
        }

        $this->deck = new DeckOfCards($numDecks);
        $this->deck->shuffleDeck();

        if ($isNewGame) {
            foreach ($this->players as $player) {
                foreach ($player->getHands() as $hand) {
                    $this->addCardToHand($hand);
                    $this->addCardToHand($hand);
                }
            }

            $this->bankHand = new CardHand();
            $this->addCardToHand($this->bankHand);
            $this->status = 'playing';
        }
    }


    /**
     * Adds a card to the specified hand from the deck.
     *
     * @param CardHand $hand The hand to add cards to.
     */
    private function addCardToHand(CardHand $hand): ?Card
    {
        $card = $this->deck->dealCard();
        if ($card !== null) {
            $hand->addCard($card);
        }
        return $card;
    }

    /**
     * Allows the specified player to take a hit (draw a card) during their turn.
     * Updates the game status if the player's score exceeds 21.
     *
     * @param int $playerIndex The index of the player (0 to numPlayers-1).
     */
    public function hit(): ?Card
    {
        $currentPlayerHand = $this->players[$this->currentPlayer]->getHand($this->currentHand);

        $drawnCard = $this->addCardToHand($currentPlayerHand);
        if ($this->calcScore($currentPlayerHand->getCards()) > 21) {
            $this->status = "Player {$this->players[$this->currentPlayer]->getName()} bust";
        }
        return $drawnCard;
    }


    public function stand(): void
    {
        $player = $this->players[$this->currentPlayer];

        if ($this->currentHand < count($player->getHands()) - 1) {
            $this->currentHand++;
        } else {
            $this->currentHand = 0;
            $this->currentPlayer++;

            if ($this->currentPlayer >= $this->getNumPlayers()) {
                $this->bankPlay();
            }
        }
    }

    /**
     * Manages the bank's turn, where the bank continues to draw cards until its score is 17 or more.
     */
    private function bankPlay(): void
    {
        while ($this->calcScore($this->bankHand->getCards()) < 17) {
            $this->addCardToHand($this->bankHand);
        }

        $this->status = "complete";
    }

    /**
     * Calculates the score of a hand.
     *
     * @param array $hand An array of Card objects representing a hand.
     * @return int The total score of the hand.
     */
    private function calcScore(array $hand): int
    {
        $score = 0;
        $aces = 0;

        foreach ($hand as $card) {
            if ($card->getValue() === "A") {
                $aces++;
            } elseif (in_array($card->getValue(), ["J", "Q", "K"])) {
                $score += 10;
            } else {
                $score += intval($card->getValue());
            }
        }

        #Handle aces
        for ($i = 0; $i < $aces; $i++) {
            $score += ($score + 11 <= 21) ? 11 : 1;
        }

        return $score;
    }

    /**
     * Determines the outcome of the game after the bank finishes its turn.
     */
    private function handResult($player, int $handIndex): string
    {
        $playerScore = $this->calcScore($player->getHand($handIndex)->getCards());
        $bankScore = $this->calcScore($this->bankHand->getCards());

        if ($playerScore > 21) {
            $player->setResult($handIndex, "loss");
            return "loss";
        }

        if ($bankScore > 21 || $playerScore > $bankScore) {
            $player->setResult($handIndex, "win");
            return "win";
        }

        if ($playerScore < $bankScore) {
            $player->setResult($handIndex, "loss");
            return "loss";
        }

        $player->setResult($handIndex, "draw");
        return "draw";
    }


    public function getGameResults(): array
    {
        $results = [];

        foreach ($this->players as $player) {
            foreach ($player->getHands() as $handIndex => $hand) {
                $results[] = [
                    'player_id' => $player->getId(),
                    'player_name' => $player->getName(),
                    'hand_index' => $handIndex + 1,
                    'score' => $this->calcScore($hand->getCards()),
                    'result' => $this->handResult($player, $handIndex),
                ];
            }
        }

        return $results;
    }

    /**
     * Gets the current status of the game.
     *
     * @return string The current game status.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Gets the specified player's hand.
     *
     * @param int $playerIndex The index of the player (0 to numPlayers-1).
     * @return CardHand The player's hand.
     */
    public function getPlayerHand(int $playerIndex): CardHand
    {
        return $this->players[$playerIndex]->getHand();
    }

    /**
     * Gets the bank's hand.
     *
     * @return CardHand The bank's hand.
     */
    public function getBankHand(): CardHand
    {
        return $this->bankHand;
    }

    /**
     * Calculates and returns the specified player's score.
     *
     * @param int $playerIndex The index of the player (0 to numPlayers-1).
     * @return int The score of the player's hand.
     */
    public function getPlayerHandScore(int $playerIndex, int $handIndex): int
    {
        return $this->calcScore($this->players[$playerIndex]->getHand($handIndex)->getCards());
    }

    /**
     * Calculates and returns the bank's score.
     *
     * @return int The score of the bank's hand.
     */
    public function getBankScore(): int
    {
        return $this->calcScore($this->bankHand->getCards());
    }

    /**
     * Gets the number of players in the game.
     *
     * @return int The number of players.
     */
    public function getNumPlayers(): int
    {
        return count($this->players);
    }

    /**
     * Gets the number of players in the game.
     *
     * @return array The number of players.
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * Gets the current player.
     *
     * @return int The current player.
     */
    public function getCurrentPlayer(): int
    {
        return $this->currentPlayer;
    }

    /**
     * Gets the current player current hand.
     *
     * @return int The current hand.
     */
    public function getCurrentHand(): int
    {
        return $this->currentHand;
    }

    public function getDeck(): DeckOfCards
    {
        return $this->deck;
    }

    public function setBankHand(CardHand $hand): void
    {
        $this->bankHand = $hand;
    }

    public function setCurrentPlayer(int $currentPlayer): void
    {
        $this->currentPlayer = $currentPlayer;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function toSession(): array
    {
        $players = [];
        foreach ($this->players as $player) {
            $playerHands = [];
            foreach ($player->getHands() as $hand) {
                $playerHands[] = [
                    "cards" => array_map(function ($card) {
                        return [
                            "id" => $card->getId(),
                            "value" => $card->getValue(),
                            "suit" => $card->getSuit(),
                        ];
                    }, $hand->getCards()),
                ];
            }

            $playerResults = $player->getResults();

            $players[] = [
                "id" => $player->getId(),
                "name" => $player->getName(),
                "hands" => $playerHands,
                "results" => $playerResults,
            ];
        }

        $gameState = [
            "players" => $players,
            "bank" => [
                "cards" => array_map(function ($card) {
                    return [
                        "id" => $card->getId(),
                        "value" => $card->getValue(),
                        "suit" => $card->getSuit(),
                    ];
                }, $this->bankHand->getCards()),
            ],
            "current_player" => $this->currentPlayer,
            "current_hand" => $this->currentHand,
            "status" => $this->status,
        ];

        return $gameState;
    }


    // public function toSession(): array
    // {
    //     $players = [];
    //     foreach ($this->players as $player) {
    //         $playerHands = [];
    //         foreach ($player->getHands() as $hand) {
    //             $playerHands[] = [
    //                 "cards" => array_map(function ($card) {
    //                     return [
    //                         "id" => $card->getId(),
    //                         "value" => $card->getValue(),
    //                         "suit" => $card->getSuit(),
    //                     ];
    //                 }, $hand->getCards()),
    //             ];
    //         }

    //         $players[] = [
    //             "id" => $player->getId(),
    //             "name" => $player->getName(),
    //             "hands" => $playerHands,
    //         ];
    //     }

    //     $gameState = [
    //         "players" => $players,
    //         "bank" => [
    //             "cards" => array_map(function ($card) {
    //                 return [
    //                     "id" => $card->getId(),
    //                     "value" => $card->getValue(),
    //                     "suit" => $card->getSuit(),
    //                 ];
    //             }, $this->bankHand->getCards()),
    //         ],
    //         "current_player" => $this->currentPlayer,
    //         "current_hand" => $this->currentHand,
    //         "status" => $this->status,
    //     ];

    //     return $gameState;
    // }

    public static function fromSession(array $gameData): BlackJack
    {
        $players = [];
        foreach ($gameData["players"] as $playerData) {
            $activePlayer = new Player($playerData["id"], $playerData["name"]);

            foreach ($playerData["hands"] as $handIndex => $handData) {
                $hand = new CardHand();
                foreach ($handData["cards"] as $cardData) {
                    $hand->addCard(new Card($cardData["value"], $cardData["suit"], $cardData["id"]));
                }
                $activePlayer->addHand($hand);

                if (isset($playerData['results'][$handIndex])) {
                    $activePlayer->setResult($handIndex, $playerData['results'][$handIndex]);
                }
            }

            $players[] = $activePlayer;
        }

        $game = new BlackJack($players, false);

        $bankHand = new CardHand();
        foreach ($gameData["bank"]["cards"] as $cardData) {
            $bankHand->addCard(new Card($cardData["value"], $cardData["suit"], $cardData["id"]));
        }
        $game->setBankHand($bankHand);

        $game->setCurrentPlayer($gameData["current_player"]);
        $game->currentHand = $gameData["current_hand"];
        $game->setStatus($gameData["status"]);

        return $game;
    }

    // public static function fromSession(array $gameData): BlackJack
    // {
    //     $players = [];
    //     foreach ($gameData["players"] as $playerData) {
    //         $activePlayer = new Player($playerData["id"], $playerData["name"]);

    //         foreach ($playerData["hands"] as $handData) {
    //             $hand = new CardHand();
    //             foreach ($handData["cards"] as $cardData) {
    //                 $hand->addCard(new Card($cardData["value"], $cardData["suit"], $cardData["id"]));
    //             }
    //             $activePlayer->addHand($hand);
    //         }

    //         $players[] = $activePlayer;
    //     }

    //     $game = new BlackJack($players, false);

    //     $bankHand = new CardHand();
    //     foreach ($gameData["bank"]["cards"] as $cardData) {
    //         $bankHand->addCard(new Card($cardData["value"], $cardData["suit"], $cardData["id"]));
    //     }
    //     $game->setBankHand($bankHand);

    //     $game->setCurrentPlayer($gameData["current_player"]);
    //     $game->currentHand = $gameData["current_hand"];
    //     $game->setStatus($gameData["status"]);

    //     return $game;
    // }
}
