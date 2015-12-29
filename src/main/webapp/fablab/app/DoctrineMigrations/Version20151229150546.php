<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151229150546 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('DELETE FROM user_roles');
        $this->addSql('DELETE FROM role');
        $this->addSql('DELETE FROM user');
        $this->addSql('ALTER TABLE role ADD role VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_57698A6A57698A6A ON role (role)');
        $this->addSql('INSERT INTO role(id,name,role) VALUES (1,"ROL_ADMIN","ROL_ADMIN")');
        $this->addSql('INSERT INTO role(id,name,role) VALUES (2,"ROL_USER","ROL_USER")');
        $this->addSql('INSERT INTO user (id, username, password, email, isActive, rut, rutVerificador, telefono, fechaInicio) values (1,"admin", "$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC", "localhost", 1, 9999999, "9", 999999999, \'2015-12-27\')');
        $this->addSql('INSERT INTO user_roles(user_id,role_id) VALUES (1,1)');
        $this->addSql('INSERT INTO user_roles(user_id,role_id) VALUES (1,2)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('DELETE FROM user_roles');
        $this->addSql('DELETE FROM role');
        $this->addSql('DELETE FROM user');
        $this->addSql('DROP INDEX UNIQ_57698A6A57698A6A ON role');
        $this->addSql('ALTER TABLE role DROP role');
    }
}
