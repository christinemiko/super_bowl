<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230606202346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE football_match ADD team1_id INT NOT NULL');
        $this->addSql('ALTER TABLE football_match ADD CONSTRAINT FK_8CE33ACEE72BCFA4 FOREIGN KEY (team1_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_8CE33ACEE72BCFA4 ON football_match (team1_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE football_match DROP FOREIGN KEY FK_8CE33ACEE72BCFA4');
        $this->addSql('DROP INDEX IDX_8CE33ACEE72BCFA4 ON football_match');
        $this->addSql('ALTER TABLE football_match DROP team1_id');
    }
}
