<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180520233308 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE quienreserva (id INT AUTO_INCREMENT NOT NULL, quienautoriza_id INT DEFAULT NULL, sala_id INT DEFAULT NULL, nombre VARCHAR(100) NOT NULL, departamento VARCHAR(100) NOT NULL, correo VARCHAR(100) NOT NULL, horainicio DATETIME NOT NULL, horafin DATETIME NOT NULL, cantidadparticipantes INT NOT NULL, objetivo LONGTEXT DEFAULT NULL, publica TINYINT(1) NOT NULL, INDEX IDX_30C95DD880106798 (quienautoriza_id), INDEX IDX_30C95DD8C51CDF3F (sala_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salas (id INT AUTO_INCREMENT NOT NULL, responsable_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, capacidad INT NOT NULL, descripcion LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_FEDB54053C59D72 (responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quienreserva ADD CONSTRAINT FK_30C95DD880106798 FOREIGN KEY (quienautoriza_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE quienreserva ADD CONSTRAINT FK_30C95DD8C51CDF3F FOREIGN KEY (sala_id) REFERENCES salas (id)');
        $this->addSql('ALTER TABLE salas ADD CONSTRAINT FK_FEDB54053C59D72 FOREIGN KEY (responsable_id) REFERENCES usuarios (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE quienreserva DROP FOREIGN KEY FK_30C95DD8C51CDF3F');
        $this->addSql('DROP TABLE quienreserva');
        $this->addSql('DROP TABLE salas');
    }
}
