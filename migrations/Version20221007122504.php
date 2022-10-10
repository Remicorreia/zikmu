<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007122504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_statistique ADD stat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_statistique ADD CONSTRAINT FK_33994B9E9502F0B FOREIGN KEY (stat_id) REFERENCES statistique (id)');
        $this->addSql('CREATE INDEX IDX_33994B9E9502F0B ON sous_statistique (stat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_statistique DROP FOREIGN KEY FK_33994B9E9502F0B');
        $this->addSql('DROP INDEX IDX_33994B9E9502F0B ON sous_statistique');
        $this->addSql('ALTER TABLE sous_statistique DROP stat_id');
    }
}
