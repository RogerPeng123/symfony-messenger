<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190726012639 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE r_cart (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, model VARCHAR(30) NOT NULL COMMENT \'车辆型号\', UNIQUE INDEX UNIQ_678C02D89395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE r_customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL COMMENT \'客户名称\', mobile VARCHAR(20) NOT NULL COMMENT \'客户联系电话\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE r_cart ADD CONSTRAINT FK_678C02D89395C3F3 FOREIGN KEY (customer_id) REFERENCES r_customer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE r_cart DROP FOREIGN KEY FK_678C02D89395C3F3');
        $this->addSql('DROP TABLE r_cart');
        $this->addSql('DROP TABLE r_customer');
    }
}
