<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210207205903 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tarticle (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarticle_tcategory (tarticle_id INT NOT NULL, tcategory_id INT NOT NULL, INDEX IDX_9E296D45B4627E77 (tarticle_id), INDEX IDX_9E296D45255850EA (tcategory_id), PRIMARY KEY(tarticle_id, tcategory_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tcategory (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tuser (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tarticle_tcategory ADD CONSTRAINT FK_9E296D45B4627E77 FOREIGN KEY (tarticle_id) REFERENCES tarticle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarticle_tcategory ADD CONSTRAINT FK_9E296D45255850EA FOREIGN KEY (tcategory_id) REFERENCES tcategory (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarticle_tcategory DROP FOREIGN KEY FK_9E296D45B4627E77');
        $this->addSql('ALTER TABLE tarticle_tcategory DROP FOREIGN KEY FK_9E296D45255850EA');
        $this->addSql('DROP TABLE tarticle');
        $this->addSql('DROP TABLE tarticle_tcategory');
        $this->addSql('DROP TABLE tcategory');
        $this->addSql('DROP TABLE tuser');
    }
}
