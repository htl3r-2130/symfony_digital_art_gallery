<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260307170558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE INDEX idx_lastname ON artist (lastname)');
        $this->addSql('CREATE INDEX idx_title ON artwork (title)');
        $this->addSql('CREATE INDEX idx_creation_date ON artwork (creation_date)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX idx_lastname');
        $this->addSql('DROP INDEX idx_title');
        $this->addSql('DROP INDEX idx_creation_date');
    }
}
