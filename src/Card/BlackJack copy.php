<?php

namespace App\Card;

/**
 * Class BlackJack handles the game logic for the game 21.
 */
class BlackJackS
{
    private DeckOfCards $deck;
    private array $playerHands;
    private array $players;
    private int $currentPlayer = 0;
    private CardHand $bankHand;
    private string $status;
    private int $numPlayers;

    /**
     * Constructor initializes the game with a shuffled deck, game status and empty hands for players and bank.
     *
     * @param int $numPlayers The number of players (2-7).
     * @param int $numDecks The number of decks (1-8).
     */
    public function __construct(int $numPlayers = 2)
    {
        $this->numPlayers = $numPlayers;
        $numDecks = 1;
        if ($numPlayers > 3) {
            $numDecks = 2;
        }

        $this->deck = new DeckOfCards($numDecks);
        $this->deck->shuffleDeck();
        $this->playerHands = [];

        for ($i = 0; $i < $numPlayers; $i++) {
            $this->playerHands[] = new CardHand();
            $this->addCardToHand($this->playerHands[$i]);
            $this->addCardToHand($this->playerHands[$i]);
        }

        $this->bankHand = new CardHand();
        $this->addCardToHand($this->bankHand);

        $this->status = 'playing';
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
        $drawnCard = $this->addCardToHand($this->playerHands[$this->currentPlayer]);
        if ($this->calcScore($this->playerHands[$this->currentPlayer]->getCards()) > 21) {
            $this->status = "Player {$this->currentPlayer} loss";
        }
        return $drawnCard;
    }

    /**
     * Handles the player's decision to stand, ends their turn and initiates the bank's play.
     */
    public function stand(): void
    {
        $this->currentPlayer++;
        if ($this->currentPlayer >= $this->numPlayers) {
            $this->bankPlay();
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
        $this->gameOver();
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
            if ($card->getValue() === 'A') {
                $aces++;
            } elseif (in_array($card->getValue(), ['J', 'Q', 'K'])) {
                $score += 10;
            } else {
                $score += intval($card->getValue());
            }
        }

        #Handle aces
        for ($i = 0; $i < $aces; $i++) {
            $score += ($score + 14 <= 21) ? 14 : 1;
        }

        return $score;
    }

    /**
     * Determines the outcome of the game after the bank finishes its turn.
     */
    public function gameOver(): void
    {
        foreach ($this->playerHands as $index => $playerHand) {
            $playerScore = $this->calcScore($playerHand->getCards());
            $bankScore = $this->calcScore($this->bankHand->getCards());

            $index + 1;
            if ($playerScore > 21) {
                $this->status = "Player {$index} loss";
                continue;
            }
            if ($bankScore > 21) {
                $this->status = "Bank loss";
                continue;
            }
            $this->status = ($playerScore > $bankScore) ? "Player {$index} wins" : "Bank wins";
        }
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
        return $this->playerHands[$playerIndex];
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
    public function getPlayerScore(int $playerIndex): int
    {
        return $this->calcScore($this->playerHands[$playerIndex]->getCards());
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
        return $this->numPlayers;
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

    public function getDeck(): DeckOfCards
    {
        return $this->deck;
    }


    /**
     * Generates a string representation of the current state of the game, including status and hands scores.
     *
     * @return string A string detailing the game's current state.
     */
    public function getAsString(): string
    {
        $playerStrings = [];
        foreach ($this->playerHands as $index => $playerHand) {
            $playerCards = implode(", ", array_map(function ($card) {
                return $card->getAsString();
            }, $playerHand->getCards()));
            $playerStrings[] = "Player {$index} cards: {$playerCards} Score: {$this->getPlayerScore($index)}";
        }
        $playerInfo = implode("\n", $playerStrings);

        $bankCards = implode(", ", array_map(function ($card) {
            return $card->getAsString();
        }, $this->bankHand->getCards()));

        return "Status: {$this->status}\n
                {$this->deck}\n
                {$playerInfo}\n
                Bank cards: {$bankCards} Score: {$this->getBankScore()}\n
                ";
    }
}
