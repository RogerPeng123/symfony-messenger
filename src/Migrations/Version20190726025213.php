<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190726025213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE r_product (id INT AUTO_INCREMENT NOT NULL, product_name VARCHAR(20) NOT NULL COMMENT \'商品名称\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE r_feature (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, info VARCHAR(255) NOT NULL COMMENT \'功能说明\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_36E1B48F4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE r_feature ADD CONSTRAINT FK_36E1B48F4584665A FOREIGN KEY (product_id) REFERENCES r_product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE r_feature DROP FOREIGN KEY FK_36E1B48F4584665A');
        $this->addSql('DROP TABLE r_product');
        $this->addSql('DROP TABLE r_feature');
    }
}
