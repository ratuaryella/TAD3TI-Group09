<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319220530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jawaban (id INT AUTO_INCREMENT NOT NULL, responden_id INT DEFAULT NULL, pertanyaan_id INT NOT NULL, INDEX IDX_24D5B5642DF6B2FC (responden_id), INDEX IDX_24D5B5648E174348 (pertanyaan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pertanyaan (id INT AUTO_INCREMENT NOT NULL, pertanyaan VARCHAR(255) NOT NULL, deskripsi VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responden (id INT AUTO_INCREMENT NOT NULL, layanan_id INT NOT NULL, nama VARCHAR(255) NOT NULL, umur INT NOT NULL, jk VARCHAR(1) NOT NULL, pendidikan VARCHAR(255) NOT NULL, pekerjaan VARCHAR(255) NOT NULL, INDEX IDX_4B3046B829C27840 (layanan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jawaban ADD CONSTRAINT FK_24D5B5642DF6B2FC FOREIGN KEY (responden_id) REFERENCES responden (id)');
        $this->addSql('ALTER TABLE jawaban ADD CONSTRAINT FK_24D5B5648E174348 FOREIGN KEY (pertanyaan_id) REFERENCES pertanyaan (id)');
        $this->addSql('ALTER TABLE responden ADD CONSTRAINT FK_4B3046B829C27840 FOREIGN KEY (layanan_id) REFERENCES layanan (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jawaban DROP FOREIGN KEY FK_24D5B5648E174348');
        $this->addSql('ALTER TABLE jawaban DROP FOREIGN KEY FK_24D5B5642DF6B2FC');
        $this->addSql('DROP TABLE jawaban');
        $this->addSql('DROP TABLE pertanyaan');
        $this->addSql('DROP TABLE responden');
    }
}
