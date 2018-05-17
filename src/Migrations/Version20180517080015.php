<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180517080015 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE noticias (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(255) NOT NULL, resumen LONGTEXT NOT NULL, cuerpo LONGTEXT NOT NULL, publica TINYINT(1) NOT NULL, portada TINYINT(1) NOT NULL, image VARCHAR(255) DEFAULT NULL, fecha DATETIME NOT NULL, tematica VARCHAR(255) NOT NULL, autor_noticia VARCHAR(255) NOT NULL, autor_foto_portada VARCHAR(255) DEFAULT NULL, visitas INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE noticias');
    }
}
