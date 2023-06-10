<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230610075132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE football_match (id INT AUTO_INCREMENT NOT NULL, team1_id INT NOT NULL, team2_id INT NOT NULL, match_date DATE NOT NULL, hour_start TIME NOT NULL, hour_finish TIME NOT NULL, statut VARCHAR(50) NOT NULL, weather VARCHAR(100) DEFAULT NULL, score_game VARCHAR(100) DEFAULT NULL, comments VARCHAR(255) DEFAULT NULL, INDEX IDX_8CE33ACEE72BCFA4 (team1_id), INDEX IDX_8CE33ACEF59E604A (team2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE football_player (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, last_name VARCHAR(30) NOT NULL, first_name VARCHAR(30) NOT NULL, player_number INT NOT NULL, origin_country VARCHAR(255) DEFAULT NULL, INDEX IDX_9459D9A2296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sportbet (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, team_id INT NOT NULL, football_match_id INT NOT NULL, wager_made INT NOT NULL, datewager_made DATE NOT NULL, money_gain VARCHAR(255) DEFAULT NULL, INDEX IDX_31C99553A76ED395 (user_id), INDEX IDX_31C99553296CD8AE (team_id), INDEX IDX_31C99553E1DA134D (football_match_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, team_name VARCHAR(50) NOT NULL, region_origin VARCHAR(50) NOT NULL, link VARCHAR(255) DEFAULT NULL, oddsteam NUMERIC(3, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(30) NOT NULL, first_name VARCHAR(30) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE football_match ADD CONSTRAINT FK_8CE33ACEE72BCFA4 FOREIGN KEY (team1_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE football_match ADD CONSTRAINT FK_8CE33ACEF59E604A FOREIGN KEY (team2_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE football_player ADD CONSTRAINT FK_9459D9A2296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sportbet ADD CONSTRAINT FK_31C99553A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sportbet ADD CONSTRAINT FK_31C99553296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sportbet ADD CONSTRAINT FK_31C99553E1DA134D FOREIGN KEY (football_match_id) REFERENCES football_match (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE football_match DROP FOREIGN KEY FK_8CE33ACEE72BCFA4');
        $this->addSql('ALTER TABLE football_match DROP FOREIGN KEY FK_8CE33ACEF59E604A');
        $this->addSql('ALTER TABLE football_player DROP FOREIGN KEY FK_9459D9A2296CD8AE');
        $this->addSql('ALTER TABLE sportbet DROP FOREIGN KEY FK_31C99553A76ED395');
        $this->addSql('ALTER TABLE sportbet DROP FOREIGN KEY FK_31C99553296CD8AE');
        $this->addSql('ALTER TABLE sportbet DROP FOREIGN KEY FK_31C99553E1DA134D');
        $this->addSql('DROP TABLE football_match');
        $this->addSql('DROP TABLE football_player');
        $this->addSql('DROP TABLE sportbet');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
