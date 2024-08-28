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
     * Constructor initializes the game with a shuffled deck, game status, and empty hands for players and bank.
     *
     * @param array $playerList Array of players in the game.
     * @param bool $isNewGame If true, starts a new game with initial card distribution.
     * 
     * @throws InvalidArgumentException If there are fewer than one player in the game.
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

        if (count($this->players) > 4) {
            $numDecks = 3;
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
     * @param CardHand $hand The hand to add a card to.
     * @return Card|null The card added to the hand or null if the deck is empty.
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
     * Allows the current player to take a hit (draw a card).
     *
     * @return Card|null The card drawn by the player or null if the deck is empty.
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

    /**
     * The current player decides to stand, ending their turn. The next player or bank will play.
     */
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
     * Banks turn to play; the bank draws cards until the score is 17 or higher.
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
     * @param array $hand Array of Card objects representing a hand.
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
     * Determines the result of a players hand compared to the banks hand.
     *
     * @param Player $player The player whose hand is being evaluated.
     * @param int $handIndex The index of the hand to evaluate.
     * @return string The result of the hand ("win", "loss", or "draw").
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

    /**
     * Retrieves the results for all players' hands.
     *
     * @return array An array containing the results of the game for each players hand.
     */
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
     * @return string The current game status
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Gets the specified players hand.
     *
     * @param int $playerIndex The index of the player
     * @param int $handIndex The index of the players hand
     * @return CardHand The hand of the player
     */
    public function getPlayerHand(int $playerIndex, int $handIndex): CardHand
    {
        return $this->players[$playerIndex]->getHand($handIndex);
    }

    /**
     * Gets the banks hand.
     *
     * @return CardHand The hand of the bank.
     */
    public function getBankHand(): CardHand
    {
        return $this->bankHand;
    }

    /**
     * Gets the score of the specified players hand.
     *
     * @param int $playerIndex The index of the player.
     * @param int $handIndex The index of the hand.
     * @return int The score of the players hand.
     */
    public function getPlayerHandScore(int $playerIndex, int $handIndex): int
    {
        return $this->calcScore($this->players[$playerIndex]->getHand($handIndex)->getCards());
    }

    /**
     * Gets the score of the banks hand.
     *
     * @return int The score of the banks hand.
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
     * Gets all players in the game.
     *
     * @return array An array of Player objects.
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * Gets the index of the current player.
     *
     * @return int The index of the current player.
     */
    public function getCurrentPlayer(): int
    {
        return $this->currentPlayer;
    }

    /**
     * Gets the index of the current hand being played.
     *
     * @return int The index of the current hand.
     */
    public function getCurrentHand(): int
    {
        return $this->currentHand;
    }

    /**
     * Gets the deck of cards.
     *
     * @return DeckOfCards The deck being used in the game
     */
    public function getDeck(): DeckOfCards
    {
        return $this->deck;
    }

    /**
     * Sets the banks hand.
     *
     * @param CardHand $hand The banks hand.
     */
    public function setBankHand(CardHand $hand): void
    {
        $this->bankHand = $hand;
    }

    /**
     * Sets the current player by index.
     *
     * @param int $currentPlayer The index of the current player.
     */
    public function setCurrentPlayer(int $currentPlayer): void
    {
        $this->currentPlayer = $currentPlayer;
    }

    /**
     * Sets the status of the game.
     *
     * @param string $status The game status ("playing" / "complete").
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Sets the deck of cards.
     *
     * @param array $deck The array of cards in the deck.
     */
    public function setDeck(array $deck): void
    {
        $this->deck = new DeckOfCards(1, $deck);
    }

    /**
     * Saves the current state of the game to an array that can be stored in a session.
     *
     * @return array The current state of the game.
     */
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

        $deck = $this->deck->toArray();

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
            "deck" => $deck,
        ];

        return $gameState;
    }

    /**
     * Restores the game state from a session array.
     *
     * @param array $gameData The session data to restore the game from.
     * @return BlackJack The restored BlackJack game instance.
     */
    public static function fromSession(array $gameData): BlackJack
    {
        $players = [];
        foreach ($gameData["players"] as $playerData) {
            $activePlayer = new Player($playerData["id"], $playerData["name"], count($playerData["hands"]));

            foreach ($playerData["hands"] as $handIndex => $handData) {
                $hand = $activePlayer->getHand($handIndex);
                foreach ($handData["cards"] as $cardData) {
                    $hand->addCard(new Card($cardData["value"], $cardData["suit"], $cardData["id"]));
                }
                // $activePlayer->addHand($hand);

                if (isset($playerData['results'][$handIndex])) {
                    $activePlayer->setResult($handIndex, $playerData['results'][$handIndex]);
                }
            }

            $players[] = $activePlayer;
        }

        $deck = $gameData["deck"];

        $game = new BlackJack($players, false);

        $bankHand = new CardHand();
        foreach ($gameData["bank"]["cards"] as $cardData) {
            $bankHand->addCard(new Card($cardData["value"], $cardData["suit"], $cardData["id"]));
        }
        $game->setBankHand($bankHand);
        $game->setDeck($deck);
        $game->setCurrentPlayer($gameData["current_player"]);
        $game->currentHand = $gameData["current_hand"];
        $game->setStatus($gameData["status"]);

        return $game;
    }
}
