<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardGraphic.
 */
class CardGraphicTest extends TestCase
{
    public function testRenderedSuitSymbolsAndColors()
    {
        $cardGraphic = new CardGraphic('A', 'Hearts', 1);
        $output = $cardGraphic->render();
        $this->assertStringContainsString('♥', $output);
        $this->assertStringContainsString('red-card', $output);

        $cardGraphic = new CardGraphic('A', 'Clubs', 2);
        $output = $cardGraphic->render();
        $this->assertStringContainsString('♣', $output);
        $this->assertStringContainsString('black-card', $output);
    }

    public function testRenderOutputStructure()
    {
        $cardGraphic = new CardGraphic('10', 'Spades', 10);
        $output = $cardGraphic->render();

        $expectedHtml = "
    <div class='card black-card'>
        <div class='card-top'><span>10</span> <span>♠</span></div>
        <div>♠ 10</div>
        <div class='card-bottom'><span>10</span> <span>♠</span></div>
    </div>";
        $this->assertEquals(trim($expectedHtml), trim($output));
    }

    public function testRenderWithUnrecognizedSuit()
    {
        $cardGraphic = new CardGraphic('J', 'Stars', 11);
        $output = $cardGraphic->render();
        $this->assertStringContainsString('black-card', $output);
        $this->assertStringNotContainsString('<span>Stars</span>', $output);
    }
}
