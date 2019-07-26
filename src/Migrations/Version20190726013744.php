<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190726013744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE r_student (id INT AUTO_INCREMENT NOT NULL, mentor_id INT DEFAULT NULL, name VARCHAR(20) NOT NULL COMMENT \'姓名\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_9E156EDADB403044 (mentor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE r_student ADD CONSTRAINT FK_9E156EDADB403044 FOREIGN KEY (mentor_id) REFERENCES r_student (id)');
        $this->addSql('ALTER TABLE r_cart ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE r_customer ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE r_student DROP FOREIGN KEY FK_9E156EDADB403044');
        $this->addSql('DROP TABLE r_student');
        $this->addSql('ALTER TABLE r_cart DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE r_customer DROP created_at, DROP updated_at');
    }
}
