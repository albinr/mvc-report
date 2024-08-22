<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819123611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_history (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, game_date DATETIME NOT NULL, player_data_json VARCHAR(255) NOT NULL, winners_json VARCHAR(255) DEFAULT NULL, bank_score INTEGER NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__player AS SELECT playerid, name, wins, losses FROM player');
        $this->addSql('DROP TABLE player');
        $this->addSql('CREATE TABLE player (playerid INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, wins INTEGER NOT NULL, losses INTEGER NOT NULL)');
        $this->addSql('INSERT INTO player (playerid, name, wins, losses) SELECT playerid, name, wins, losses FROM __temp__player');
        $this->addSql('DROP TABLE __temp__player');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_98197A655E237E06 ON player (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE game_history');
        $this->addSql('CREATE TEMPORARY TABLE __temp__player AS SELECT playerid, name, wins, losses FROM player');
        $this->addSql('DROP TABLE player');
        $this->addSql('CREATE TABLE player (playerid INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, wins INTEGER NOT NULL, losses INTEGER NOT NULL)');
        $this->addSql('INSERT INTO player (playerid, name, wins, losses) SELECT playerid, name, wins, losses FROM __temp__player');
        $this->addSql('DROP TABLE __temp__player');
    }
}
