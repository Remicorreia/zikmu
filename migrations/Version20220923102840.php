<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923102840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, label_id INT NOT NULL, note_id INT NOT NULL, departement_id INT NOT NULL, photo VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, style INT NOT NULL, gestuel INT NOT NULL, genre VARCHAR(10) NOT NULL, depa VARCHAR(255) NOT NULL, INDEX IDX_9C07354F33B92F39 (label_id), INDEX IDX_9C07354F26ED0855 (note_id), INDEX IDX_9C07354FCCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_statistique (artiste_id INT NOT NULL, statistique_id INT NOT NULL, INDEX IDX_F8AAEFDF21D25844 (artiste_id), INDEX IDX_F8AAEFDF76A81463 (statistique_id), PRIMARY KEY(artiste_id, statistique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_sous_statistique (artiste_id INT NOT NULL, sous_statistique_id INT NOT NULL, INDEX IDX_DEE8BD4721D25844 (artiste_id), INDEX IDX_DEE8BD47B92EDD7 (sous_statistique_id), PRIMARY KEY(artiste_id, sous_statistique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, numero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, structure VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, valeur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_statistique (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistique (id INT AUTO_INCREMENT NOT NULL, signification VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistique_sous_statistique (statistique_id INT NOT NULL, sous_statistique_id INT NOT NULL, INDEX IDX_CE8EE63D76A81463 (statistique_id), INDEX IDX_CE8EE63DB92EDD7 (sous_statistique_id), PRIMARY KEY(statistique_id, sous_statistique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354F33B92F39 FOREIGN KEY (label_id) REFERENCES label (id)');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354F26ED0855 FOREIGN KEY (note_id) REFERENCES note (id)');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354FCCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE artiste_statistique ADD CONSTRAINT FK_F8AAEFDF21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_statistique ADD CONSTRAINT FK_F8AAEFDF76A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_sous_statistique ADD CONSTRAINT FK_DEE8BD4721D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_sous_statistique ADD CONSTRAINT FK_DEE8BD47B92EDD7 FOREIGN KEY (sous_statistique_id) REFERENCES sous_statistique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statistique_sous_statistique ADD CONSTRAINT FK_CE8EE63D76A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statistique_sous_statistique ADD CONSTRAINT FK_CE8EE63DB92EDD7 FOREIGN KEY (sous_statistique_id) REFERENCES sous_statistique (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354F33B92F39');
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354F26ED0855');
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354FCCF9E01E');
        $this->addSql('ALTER TABLE artiste_statistique DROP FOREIGN KEY FK_F8AAEFDF21D25844');
        $this->addSql('ALTER TABLE artiste_statistique DROP FOREIGN KEY FK_F8AAEFDF76A81463');
        $this->addSql('ALTER TABLE artiste_sous_statistique DROP FOREIGN KEY FK_DEE8BD4721D25844');
        $this->addSql('ALTER TABLE artiste_sous_statistique DROP FOREIGN KEY FK_DEE8BD47B92EDD7');
        $this->addSql('ALTER TABLE statistique_sous_statistique DROP FOREIGN KEY FK_CE8EE63D76A81463');
        $this->addSql('ALTER TABLE statistique_sous_statistique DROP FOREIGN KEY FK_CE8EE63DB92EDD7');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE artiste_statistique');
        $this->addSql('DROP TABLE artiste_sous_statistique');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE sous_statistique');
        $this->addSql('DROP TABLE statistique');
        $this->addSql('DROP TABLE statistique_sous_statistique');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
