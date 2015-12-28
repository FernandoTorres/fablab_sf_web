<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151228180725 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE likes_proyecto (id INT AUTO_INCREMENT NOT NULL, proyecto_id INT DEFAULT NULL, tipo TINYINT(1) NOT NULL, INDEX IDX_3CD328E5F625D1BA (proyecto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento (id INT AUTO_INCREMENT NOT NULL, documento LONGBLOB NOT NULL, etiqueta VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_B6B12EC76D5CA63A (etiqueta), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE links_proyecto (id INT AUTO_INCREMENT NOT NULL, proyecto_id INT DEFAULT NULL, link VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F60674F336AC99F1 (link), INDEX IDX_F60674F3F625D1BA (proyecto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE imagen_proyecto (id INT AUTO_INCREMENT NOT NULL, proyecto_id INT DEFAULT NULL, imagen LONGBLOB NOT NULL, etiqueta VARCHAR(255) NOT NULL, INDEX IDX_1EA1758BF625D1BA (proyecto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, autor VARCHAR(255) NOT NULL, visitas BIGINT NOT NULL, descripcion LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_6FD202B93A909126 (nombre), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_proyecto (proyecto_id INT NOT NULL, documento_id INT NOT NULL, INDEX IDX_3BD9ED40F625D1BA (proyecto_id), INDEX IDX_3BD9ED4045C0CF75 (documento_id), PRIMARY KEY(proyecto_id, documento_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE likes_proyecto ADD CONSTRAINT FK_3CD328E5F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE links_proyecto ADD CONSTRAINT FK_F60674F3F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE imagen_proyecto ADD CONSTRAINT FK_1EA1758BF625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE documento_proyecto ADD CONSTRAINT FK_3BD9ED40F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documento_proyecto ADD CONSTRAINT FK_3BD9ED4045C0CF75 FOREIGN KEY (documento_id) REFERENCES documento (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documento_proyecto DROP FOREIGN KEY FK_3BD9ED4045C0CF75');
        $this->addSql('ALTER TABLE likes_proyecto DROP FOREIGN KEY FK_3CD328E5F625D1BA');
        $this->addSql('ALTER TABLE links_proyecto DROP FOREIGN KEY FK_F60674F3F625D1BA');
        $this->addSql('ALTER TABLE imagen_proyecto DROP FOREIGN KEY FK_1EA1758BF625D1BA');
        $this->addSql('ALTER TABLE documento_proyecto DROP FOREIGN KEY FK_3BD9ED40F625D1BA');
        $this->addSql('DROP TABLE likes_proyecto');
        $this->addSql('DROP TABLE documento');
        $this->addSql('DROP TABLE links_proyecto');
        $this->addSql('DROP TABLE imagen_proyecto');
        $this->addSql('DROP TABLE proyecto');
        $this->addSql('DROP TABLE documento_proyecto');
    }
}
