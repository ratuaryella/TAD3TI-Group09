<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319215615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE layanan (id INT AUTO_INCREMENT NOT NULL, instansi_id INT NOT NULL, nama VARCHAR(255) NOT NULL, deskripsi VARCHAR(255) DEFAULT NULL, INDEX IDX_F12FC75B10675A27 (instansi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE layanan ADD CONSTRAINT FK_F12FC75B10675A27 FOREIGN KEY (instansi_id) REFERENCES instansi (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE layanan');
    }
}
