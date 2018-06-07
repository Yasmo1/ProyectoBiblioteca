<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180607121453 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE investigaciones (id INT AUTO_INCREMENT NOT NULL, jefe_proyecto_id INT DEFAULT NULL, tipo VARCHAR(255) NOT NULL, tema VARCHAR(255) NOT NULL, fechainicio DATETIME DEFAULT NULL, fechafin DATETIME DEFAULT NULL, INDEX IDX_7BBC2D4CE47E8F6F (jefe_proyecto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pii (id INT AUTO_INCREMENT NOT NULL, jefe_proyecto_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, descripcion LONGTEXT DEFAULT NULL, tipo VARCHAR(255) NOT NULL, INDEX IDX_2BE1B850E47E8F6F (jefe_proyecto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultados (id INT AUTO_INCREMENT NOT NULL, fechainicio DATETIME NOT NULL, fechafin DATETIME NOT NULL, proyecto VARCHAR(255) NOT NULL, resultado LONGTEXT DEFAULT NULL, autor VARCHAR(255) NOT NULL, tiporesultado VARCHAR(255) NOT NULL, relevancia LONGTEXT NOT NULL, lineainvestigacion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE investigaciones ADD CONSTRAINT FK_7BBC2D4CE47E8F6F FOREIGN KEY (jefe_proyecto_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE pii ADD CONSTRAINT FK_2BE1B850E47E8F6F FOREIGN KEY (jefe_proyecto_id) REFERENCES usuarios (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE investigaciones');
        $this->addSql('DROP TABLE pii');
        $this->addSql('DROP TABLE resultados');
    }
}
