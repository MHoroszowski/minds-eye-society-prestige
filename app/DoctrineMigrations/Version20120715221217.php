<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120715221217 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE Location (id INT AUTO_INCREMENT NOT NULL, parent_location_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_A7E8EB9D6D6133FE (parent_location_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Location ADD CONSTRAINT FK_A7E8EB9D6D6133FE FOREIGN KEY (parent_location_id) REFERENCES Location(id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE Location DROP FOREIGN KEY FK_A7E8EB9D6D6133FE");
        $this->addSql("DROP TABLE Location");
    }
}
