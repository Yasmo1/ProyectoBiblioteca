<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180702183626 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resultados ADD jefe_proyecto_id INT DEFAULT NULL, DROP autor');
        $this->addSql('ALTER TABLE resultados ADD CONSTRAINT FK_F04BD9DE47E8F6F FOREIGN KEY (jefe_proyecto_id) REFERENCES usuarios (id)');
        $this->addSql('CREATE INDEX IDX_F04BD9DE47E8F6F ON resultados (jefe_proyecto_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resultados DROP FOREIGN KEY FK_F04BD9DE47E8F6F');
        $this->addSql('DROP INDEX IDX_F04BD9DE47E8F6F ON resultados');
        $this->addSql('ALTER TABLE resultados ADD autor VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP jefe_proyecto_id');
    }
}
