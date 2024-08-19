<?php

namespace App\Card;

/**
 * Class BlackJack handles the game logic for the game 21.
 */
class BlackJack
{
    private DeckOfCards $deck;
    private array $players;
    private int $currentPlayer = 0;
    private CardHand $bankHand;
    private string $status;

    /**
     * Constructor initializes the game with a shuffled deck, game status and empty hands for players and bank.
     *
     * @param int[] $numPlayers The number of players (2-7).
     */
    public function __construct(array $playerList)
    {
        $this->players = $playerList;
        $numDecks = 1;
        if (count($this->players) > 3) {
            $numDecks = 2;
        }

        $this->deck = new DeckOfCards($numDecks);
        $this->deck->shuffleDeck();

        foreach ($this->players as $player) {
            $this->addCardToHand($player->getHand());
            $this->addCardToHand($player->getHand());
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
        $drawnCard = $this->addCardToHand($this->players[$this->currentPlayer]->getHand());
        if ($this->calcScore($this->players[$this->currentPlayer]->getHand()->getCards()) > 21) {
            $this->status = "Player {$this->players[$this->currentPlayer]->getName()} bust";
        }
        return $drawnCard;
    }

    /**
     * Handles the player's decision to stand, ends their turn and initiates the bank's play.
     */
    public function stand(): void
    {
        $this->currentPlayer++;
        if ($this->currentPlayer >= $this->getNumPlayers()) {
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

        $this->status = 'complete';
        $this->getGameResults();
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
            $score += ($score + 11 <= 21) ? 11 : 1;
        }

        return $score;
    }

    /**
     * Determines the outcome of the game after the bank finishes its turn.
     */
    private function determinePlayerStatus($player): string
    {
        $playerScore = $this->calcScore($player->getHand()->getCards());
        $bankScore = $this->calcScore($this->bankHand->getCards());

        if ($playerScore > 21) {
            return 'lose';
        }

        if ($bankScore > 21 || $playerScore > $bankScore) {
            return 'win';
        }

        if ($playerScore < $bankScore) {
            return 'lose';
        }

        return 'draw';
    }

    public function getGameResults(): array
    {
        $results = [];

        foreach ($this->players as $player) {
            $playerResult = [
                'id' => $player->getId(),
                'name' => $player->getName(),
                'score' => $this->calcScore($player->getHand()->getCards()),
                'status' => $this->determinePlayerStatus($player),
            ];

            $results[] = $playerResult;
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
    public function getPlayerScore(int $playerIndex): int
    {
        return $this->calcScore($this->players[$playerIndex]->getHand()->getCards());
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
     * @return int The number of players.
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

    public function getDeck(): DeckOfCards
    {
        return $this->deck;
    }
}
