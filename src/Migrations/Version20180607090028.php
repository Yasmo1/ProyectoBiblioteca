<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180607090028 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE asignatura_servicio_pregrado (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asignatura_servicio_pregrado_usuarios (asignatura_servicio_pregrado_id INT NOT NULL, usuarios_id INT NOT NULL, INDEX IDX_A3D14B2CD004686B (asignatura_servicio_pregrado_id), INDEX IDX_A3D14B2CF01D3B25 (usuarios_id), PRIMARY KEY(asignatura_servicio_pregrado_id, usuarios_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asignatura_servicio_pregrado_usuarios ADD CONSTRAINT FK_A3D14B2CD004686B FOREIGN KEY (asignatura_servicio_pregrado_id) REFERENCES asignatura_servicio_pregrado (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE asignatura_servicio_pregrado_usuarios ADD CONSTRAINT FK_A3D14B2CF01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asignatura_servicio_pregrado_usuarios DROP FOREIGN KEY FK_A3D14B2CD004686B');
        $this->addSql('DROP TABLE asignatura_servicio_pregrado');
        $this->addSql('DROP TABLE asignatura_servicio_pregrado_usuarios');
    }
}
