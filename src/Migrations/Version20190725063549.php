<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190725063549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE r_user_address (id INT AUTO_INCREMENT NOT NULL, u_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL COMMENT \'详细地址\', INDEX IDX_DAD65B8FE4A59390 (u_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE r_user_address ADD CONSTRAINT FK_DAD65B8FE4A59390 FOREIGN KEY (u_id) REFERENCES r_user (id)');
        $this->addSql('DROP TABLE r_address');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE r_address (id INT AUTO_INCREMENT NOT NULL, u_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'详细地址\', INDEX IDX_2478AE68E4A59390 (u_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE r_address ADD CONSTRAINT FK_2478AE68E4A59390 FOREIGN KEY (u_id) REFERENCES r_user (id)');
        $this->addSql('DROP TABLE r_user_address');
    }
}
