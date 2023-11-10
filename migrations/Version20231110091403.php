<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110091403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "managers_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "orders_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "managers" (id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "orders" (id INT NOT NULL, manager_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E52FFDEE783E3463 ON "orders" (manager_id)');
        $this->addSql('ALTER TABLE "orders" ADD CONSTRAINT FK_E52FFDEE783E3463 FOREIGN KEY (manager_id) REFERENCES "managers" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE "managers_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "orders_id_seq" CASCADE');
        $this->addSql('ALTER TABLE "orders" DROP CONSTRAINT FK_E52FFDEE783E3463');
        $this->addSql('DROP TABLE "managers"');
        $this->addSql('DROP TABLE "orders"');
    }
}
