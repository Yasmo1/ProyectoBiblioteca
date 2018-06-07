<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180607081002 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE biblioteca (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, horario VARCHAR(255) NOT NULL, descripcion LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE biblioteca_servicios_biblioteca (biblioteca_id INT NOT NULL, servicios_biblioteca_id INT NOT NULL, INDEX IDX_A3BC38E66A5EDAE9 (biblioteca_id), INDEX IDX_A3BC38E692460D64 (servicios_biblioteca_id), PRIMARY KEY(biblioteca_id, servicios_biblioteca_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE biblioteca_servicios_biblioteca ADD CONSTRAINT FK_A3BC38E66A5EDAE9 FOREIGN KEY (biblioteca_id) REFERENCES biblioteca (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE biblioteca_servicios_biblioteca ADD CONSTRAINT FK_A3BC38E692460D64 FOREIGN KEY (servicios_biblioteca_id) REFERENCES servicios_biblioteca (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salas ADD biblioteca_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salas ADD CONSTRAINT FK_FEDB5406A5EDAE9 FOREIGN KEY (biblioteca_id) REFERENCES biblioteca (id)');
        $this->addSql('CREATE INDEX IDX_FEDB5406A5EDAE9 ON salas (biblioteca_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE biblioteca_servicios_biblioteca DROP FOREIGN KEY FK_A3BC38E66A5EDAE9');
        $this->addSql('ALTER TABLE salas DROP FOREIGN KEY FK_FEDB5406A5EDAE9');
        $this->addSql('DROP TABLE biblioteca');
        $this->addSql('DROP TABLE biblioteca_servicios_biblioteca');
        $this->addSql('DROP INDEX IDX_FEDB5406A5EDAE9 ON salas');
        $this->addSql('ALTER TABLE salas DROP biblioteca_id');
    }
}
