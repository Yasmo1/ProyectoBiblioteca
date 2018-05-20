<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180520214432 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE respuesta_comentario (id INT AUTO_INCREMENT NOT NULL, comentario_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, correo VARCHAR(255) NOT NULL, cuerpo_comentario LONGTEXT NOT NULL, fecha DATETIME NOT NULL, publicado TINYINT(1) NOT NULL, INDEX IDX_D0EAB5FCF3F2D7EC (comentario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE respuesta_comentario ADD CONSTRAINT FK_D0EAB5FCF3F2D7EC FOREIGN KEY (comentario_id) REFERENCES comentarios (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE respuesta_comentario');
    }
}
