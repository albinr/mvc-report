<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240821134408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__game_history AS SELECT id, game_date, player_data_json, bank_score FROM game_history');
        $this->addSql('DROP TABLE game_history');
        $this->addSql('CREATE TABLE game_history (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, game_date DATETIME NOT NULL, player_data_json CLOB NOT NULL --(DC2Type:json)
        , bank_score INTEGER NOT NULL)');
        $this->addSql('INSERT INTO game_history (id, game_date, player_data_json, bank_score) SELECT id, game_date, player_data_json, bank_score FROM __temp__game_history');
        $this->addSql('DROP TABLE __temp__game_history');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__game_history AS SELECT id, game_date, player_data_json, bank_score FROM game_history');
        $this->addSql('DROP TABLE game_history');
        $this->addSql('CREATE TABLE game_history (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, game_date DATETIME NOT NULL, player_data_json VARCHAR(255) NOT NULL, bank_score INTEGER NOT NULL, winners_json VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO game_history (id, game_date, player_data_json, bank_score) SELECT id, game_date, player_data_json, bank_score FROM __temp__game_history');
        $this->addSql('DROP TABLE __temp__game_history');
    }
}
