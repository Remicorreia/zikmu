<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926082853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354F26ED0855');
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, statistique_id INT NOT NULL, sous_statistique_id INT NOT NULL, artiste_id INT NOT NULL, INDEX IDX_BAD4FFFD76A81463 (statistique_id), INDEX IDX_BAD4FFFDB92EDD7 (sous_statistique_id), INDEX IDX_BAD4FFFD21D25844 (artiste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD76A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFDB92EDD7 FOREIGN KEY (sous_statistique_id) REFERENCES sous_statistique (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE artiste_sous_statistique DROP FOREIGN KEY FK_DEE8BD4721D25844');
        $this->addSql('ALTER TABLE artiste_sous_statistique DROP FOREIGN KEY FK_DEE8BD47B92EDD7');
        $this->addSql('ALTER TABLE artiste_statistique DROP FOREIGN KEY FK_F8AAEFDF76A81463');
        $this->addSql('ALTER TABLE artiste_statistique DROP FOREIGN KEY FK_F8AAEFDF21D25844');
        $this->addSql('ALTER TABLE statistique_sous_statistique DROP FOREIGN KEY FK_CE8EE63D76A81463');
        $this->addSql('ALTER TABLE statistique_sous_statistique DROP FOREIGN KEY FK_CE8EE63DB92EDD7');
        $this->addSql('DROP TABLE artiste_sous_statistique');
        $this->addSql('DROP TABLE artiste_statistique');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE statistique_sous_statistique');
        $this->addSql('DROP INDEX IDX_9C07354F26ED0855 ON artiste');
        $this->addSql('ALTER TABLE artiste DROP depa, CHANGE note_id note INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste_sous_statistique (artiste_id INT NOT NULL, sous_statistique_id INT NOT NULL, INDEX IDX_DEE8BD4721D25844 (artiste_id), INDEX IDX_DEE8BD47B92EDD7 (sous_statistique_id), PRIMARY KEY(artiste_id, sous_statistique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE artiste_statistique (artiste_id INT NOT NULL, statistique_id INT NOT NULL, INDEX IDX_F8AAEFDF76A81463 (statistique_id), INDEX IDX_F8AAEFDF21D25844 (artiste_id), PRIMARY KEY(artiste_id, statistique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, valeur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE statistique_sous_statistique (statistique_id INT NOT NULL, sous_statistique_id INT NOT NULL, INDEX IDX_CE8EE63D76A81463 (statistique_id), INDEX IDX_CE8EE63DB92EDD7 (sous_statistique_id), PRIMARY KEY(statistique_id, sous_statistique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE artiste_sous_statistique ADD CONSTRAINT FK_DEE8BD4721D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_sous_statistique ADD CONSTRAINT FK_DEE8BD47B92EDD7 FOREIGN KEY (sous_statistique_id) REFERENCES sous_statistique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_statistique ADD CONSTRAINT FK_F8AAEFDF76A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_statistique ADD CONSTRAINT FK_F8AAEFDF21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statistique_sous_statistique ADD CONSTRAINT FK_CE8EE63D76A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statistique_sous_statistique ADD CONSTRAINT FK_CE8EE63DB92EDD7 FOREIGN KEY (sous_statistique_id) REFERENCES sous_statistique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD76A81463');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFDB92EDD7');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD21D25844');
        $this->addSql('DROP TABLE carte');
        $this->addSql('ALTER TABLE artiste ADD depa VARCHAR(255) NOT NULL, CHANGE note note_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354F26ED0855 FOREIGN KEY (note_id) REFERENCES note (id)');
        $this->addSql('CREATE INDEX IDX_9C07354F26ED0855 ON artiste (note_id)');
    }
}
