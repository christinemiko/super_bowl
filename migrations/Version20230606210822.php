<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230606210822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sportbet ADD football_match_id INT NOT NULL');
        $this->addSql('ALTER TABLE sportbet ADD CONSTRAINT FK_31C99553E1DA134D FOREIGN KEY (football_match_id) REFERENCES football_match (id)');
        $this->addSql('CREATE INDEX IDX_31C99553E1DA134D ON sportbet (football_match_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sportbet DROP FOREIGN KEY FK_31C99553E1DA134D');
        $this->addSql('DROP INDEX IDX_31C99553E1DA134D ON sportbet');
        $this->addSql('ALTER TABLE sportbet DROP football_match_id');
    }
}
