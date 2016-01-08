<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160108155341 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE imagen_maquina (id INT AUTO_INCREMENT NOT NULL, maquina_id INT DEFAULT NULL, imagen LONGBLOB NOT NULL, INDEX IDX_68C9EB7941420729 (maquina_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maquina (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_AA3B503D3A909126 (nombre), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_maquina (maquina_id INT NOT NULL, documento_id INT NOT NULL, INDEX IDX_7F8380CB41420729 (maquina_id), INDEX IDX_7F8380CB45C0CF75 (documento_id), PRIMARY KEY(maquina_id, documento_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE imagen_maquina ADD CONSTRAINT FK_68C9EB7941420729 FOREIGN KEY (maquina_id) REFERENCES maquina (id)');
        $this->addSql('ALTER TABLE documento_maquina ADD CONSTRAINT FK_7F8380CB41420729 FOREIGN KEY (maquina_id) REFERENCES maquina (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documento_maquina ADD CONSTRAINT FK_7F8380CB45C0CF75 FOREIGN KEY (documento_id) REFERENCES documento (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE imagen_maquina DROP FOREIGN KEY FK_68C9EB7941420729');
        $this->addSql('ALTER TABLE documento_maquina DROP FOREIGN KEY FK_7F8380CB41420729');
        $this->addSql('DROP TABLE imagen_maquina');
        $this->addSql('DROP TABLE maquina');
        $this->addSql('DROP TABLE documento_maquina');
    }
}
