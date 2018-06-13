<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180613145131 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sitios_web_crai (id INT AUTO_INCREMENT NOT NULL, administrador_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, tecnologiautilizada VARCHAR(255) DEFAULT NULL, ipmontadoservicio VARCHAR(50) NOT NULL, descripcion LONGTEXT DEFAULT NULL, INDEX IDX_E87C3B5B48DFEBB7 (administrador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sitios_web_crai ADD CONSTRAINT FK_E87C3B5B48DFEBB7 FOREIGN KEY (administrador_id) REFERENCES usuarios (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sitios_web_crai');
    }
}
