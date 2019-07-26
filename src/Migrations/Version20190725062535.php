<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190725062535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE r_user_extension (id INT AUTO_INCREMENT NOT NULL, u_id INT DEFAULT NULL, u_height INT NOT NULL COMMENT \'身高\', u_weight INT NOT NULL COMMENT \'体重\', bust NUMERIC(3, 2) NOT NULL COMMENT \'胸围\', waist NUMERIC(3, 2) NOT NULL COMMENT \'腰围\', hips NUMERIC(3, 2) NOT NULL COMMENT \'臀围\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_208033D4E4A59390 (u_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE r_user_extension ADD CONSTRAINT FK_208033D4E4A59390 FOREIGN KEY (u_id) REFERENCES r_user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE r_user_extension');
    }
}
