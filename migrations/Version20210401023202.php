<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210401023202 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE instansi (id INT AUTO_INCREMENT NOT NULL, nama VARCHAR(255) NOT NULL, alamat VARCHAR(255) DEFAULT NULL, nomor_kontak VARCHAR(255) DEFAULT NULL, nama_pimpinan VARCHAR(255) DEFAULT NULL, tingkat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jawaban (id INT AUTO_INCREMENT NOT NULL, responden_id INT DEFAULT NULL, pertanyaan_id INT NOT NULL, jawaban INT NOT NULL, tanggal DATE NOT NULL, INDEX IDX_24D5B5642DF6B2FC (responden_id), INDEX IDX_24D5B5648E174348 (pertanyaan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE layanan (id INT AUTO_INCREMENT NOT NULL, instansi_id INT NOT NULL, nama VARCHAR(255) NOT NULL, deskripsi VARCHAR(255) DEFAULT NULL, INDEX IDX_F12FC75B10675A27 (instansi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pertanyaan (id INT AUTO_INCREMENT NOT NULL, pertanyaan VARCHAR(255) NOT NULL, deskripsi VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responden (id INT AUTO_INCREMENT NOT NULL, layanan_id INT NOT NULL, nama VARCHAR(255) NOT NULL, umur INT NOT NULL, jk VARCHAR(1) NOT NULL, pendidikan VARCHAR(255) NOT NULL, pekerjaan VARCHAR(255) NOT NULL, INDEX IDX_4B3046B829C27840 (layanan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, instansi_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nip VARCHAR(20) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D64910675A27 (instansi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jawaban ADD CONSTRAINT FK_24D5B5642DF6B2FC FOREIGN KEY (responden_id) REFERENCES responden (id)');
        $this->addSql('ALTER TABLE jawaban ADD CONSTRAINT FK_24D5B5648E174348 FOREIGN KEY (pertanyaan_id) REFERENCES pertanyaan (id)');
        $this->addSql('ALTER TABLE layanan ADD CONSTRAINT FK_F12FC75B10675A27 FOREIGN KEY (instansi_id) REFERENCES instansi (id)');
        $this->addSql('ALTER TABLE responden ADD CONSTRAINT FK_4B3046B829C27840 FOREIGN KEY (layanan_id) REFERENCES layanan (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64910675A27 FOREIGN KEY (instansi_id) REFERENCES instansi (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE layanan DROP FOREIGN KEY FK_F12FC75B10675A27');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64910675A27');
        $this->addSql('ALTER TABLE responden DROP FOREIGN KEY FK_4B3046B829C27840');
        $this->addSql('ALTER TABLE jawaban DROP FOREIGN KEY FK_24D5B5648E174348');
        $this->addSql('ALTER TABLE jawaban DROP FOREIGN KEY FK_24D5B5642DF6B2FC');
        $this->addSql('DROP TABLE instansi');
        $this->addSql('DROP TABLE jawaban');
        $this->addSql('DROP TABLE layanan');
        $this->addSql('DROP TABLE pertanyaan');
        $this->addSql('DROP TABLE responden');
        $this->addSql('DROP TABLE user');
    }
}
