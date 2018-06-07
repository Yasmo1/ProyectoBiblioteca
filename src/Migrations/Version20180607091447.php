<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180607091447 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actividad_postgrado (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, fechainicio DATETIME NOT NULL, fechafin DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asignatura_servicio_pregrado (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asignatura_servicio_pregrado_usuarios (asignatura_servicio_pregrado_id INT NOT NULL, usuarios_id INT NOT NULL, INDEX IDX_A3D14B2CD004686B (asignatura_servicio_pregrado_id), INDEX IDX_A3D14B2CF01D3B25 (usuarios_id), PRIMARY KEY(asignatura_servicio_pregrado_id, usuarios_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrera (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrera_asignatura_servicio_pregrado (carrera_id INT NOT NULL, asignatura_servicio_pregrado_id INT NOT NULL, INDEX IDX_43644DD7C671B40F (carrera_id), INDEX IDX_43644DD7D004686B (asignatura_servicio_pregrado_id), PRIMARY KEY(carrera_id, asignatura_servicio_pregrado_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organismos_postgrado (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, telefono VARCHAR(50) DEFAULT NULL, direccion LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organismos_postgrado_actividad_postgrado (organismos_postgrado_id INT NOT NULL, actividad_postgrado_id INT NOT NULL, INDEX IDX_DEC765AC6CDBD8FC (organismos_postgrado_id), INDEX IDX_DEC765ACAAFAEE0 (actividad_postgrado_id), PRIMARY KEY(organismos_postgrado_id, actividad_postgrado_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semestre (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semestre_asignatura_servicio_pregrado (semestre_id INT NOT NULL, asignatura_servicio_pregrado_id INT NOT NULL, INDEX IDX_D872F29E5577AFDB (semestre_id), INDEX IDX_D872F29ED004686B (asignatura_servicio_pregrado_id), PRIMARY KEY(semestre_id, asignatura_servicio_pregrado_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_actividad_postgrado (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asignatura_servicio_pregrado_usuarios ADD CONSTRAINT FK_A3D14B2CD004686B FOREIGN KEY (asignatura_servicio_pregrado_id) REFERENCES asignatura_servicio_pregrado (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE asignatura_servicio_pregrado_usuarios ADD CONSTRAINT FK_A3D14B2CF01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carrera_asignatura_servicio_pregrado ADD CONSTRAINT FK_43644DD7C671B40F FOREIGN KEY (carrera_id) REFERENCES carrera (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carrera_asignatura_servicio_pregrado ADD CONSTRAINT FK_43644DD7D004686B FOREIGN KEY (asignatura_servicio_pregrado_id) REFERENCES asignatura_servicio_pregrado (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE organismos_postgrado_actividad_postgrado ADD CONSTRAINT FK_DEC765AC6CDBD8FC FOREIGN KEY (organismos_postgrado_id) REFERENCES organismos_postgrado (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE organismos_postgrado_actividad_postgrado ADD CONSTRAINT FK_DEC765ACAAFAEE0 FOREIGN KEY (actividad_postgrado_id) REFERENCES actividad_postgrado (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semestre_asignatura_servicio_pregrado ADD CONSTRAINT FK_D872F29E5577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semestre_asignatura_servicio_pregrado ADD CONSTRAINT FK_D872F29ED004686B FOREIGN KEY (asignatura_servicio_pregrado_id) REFERENCES asignatura_servicio_pregrado (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE organismos_postgrado_actividad_postgrado DROP FOREIGN KEY FK_DEC765ACAAFAEE0');
        $this->addSql('ALTER TABLE asignatura_servicio_pregrado_usuarios DROP FOREIGN KEY FK_A3D14B2CD004686B');
        $this->addSql('ALTER TABLE carrera_asignatura_servicio_pregrado DROP FOREIGN KEY FK_43644DD7D004686B');
        $this->addSql('ALTER TABLE semestre_asignatura_servicio_pregrado DROP FOREIGN KEY FK_D872F29ED004686B');
        $this->addSql('ALTER TABLE carrera_asignatura_servicio_pregrado DROP FOREIGN KEY FK_43644DD7C671B40F');
        $this->addSql('ALTER TABLE organismos_postgrado_actividad_postgrado DROP FOREIGN KEY FK_DEC765AC6CDBD8FC');
        $this->addSql('ALTER TABLE semestre_asignatura_servicio_pregrado DROP FOREIGN KEY FK_D872F29E5577AFDB');
        $this->addSql('DROP TABLE actividad_postgrado');
        $this->addSql('DROP TABLE asignatura_servicio_pregrado');
        $this->addSql('DROP TABLE asignatura_servicio_pregrado_usuarios');
        $this->addSql('DROP TABLE carrera');
        $this->addSql('DROP TABLE carrera_asignatura_servicio_pregrado');
        $this->addSql('DROP TABLE organismos_postgrado');
        $this->addSql('DROP TABLE organismos_postgrado_actividad_postgrado');
        $this->addSql('DROP TABLE semestre');
        $this->addSql('DROP TABLE semestre_asignatura_servicio_pregrado');
        $this->addSql('DROP TABLE tipo_actividad_postgrado');
    }
}
