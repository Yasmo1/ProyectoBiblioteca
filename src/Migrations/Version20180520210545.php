<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180520210545 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, departamento_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, cargo VARCHAR(255) DEFAULT NULL, funcion VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, correo VARCHAR(255) NOT NULL, telefono VARCHAR(50) DEFAULT NULL, direccionparticular LONGTEXT DEFAULT NULL, dni VARCHAR(20) DEFAULT NULL, numerocelular VARCHAR(20) DEFAULT NULL, estado_civil VARCHAR(255) DEFAULT NULL, categoriadocente VARCHAR(50) DEFAULT NULL, categoria_cientifica VARCHAR(50) DEFAULT NULL, INDEX IDX_EF687F25A91C08D (departamento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios_grupos_de_trabajo (usuarios_id INT NOT NULL, grupos_de_trabajo_id INT NOT NULL, INDEX IDX_A7AA3FE7F01D3B25 (usuarios_id), INDEX IDX_A7AA3FE7BD18D15 (grupos_de_trabajo_id), PRIMARY KEY(usuarios_id, grupos_de_trabajo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usuarios ADD CONSTRAINT FK_EF687F25A91C08D FOREIGN KEY (departamento_id) REFERENCES departamentos (id)');
        $this->addSql('ALTER TABLE usuarios_grupos_de_trabajo ADD CONSTRAINT FK_A7AA3FE7F01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuarios_grupos_de_trabajo ADD CONSTRAINT FK_A7AA3FE7BD18D15 FOREIGN KEY (grupos_de_trabajo_id) REFERENCES grupos_de_trabajo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE usuarios_grupos_de_trabajo DROP FOREIGN KEY FK_A7AA3FE7F01D3B25');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('DROP TABLE usuarios_grupos_de_trabajo');
    }
}
