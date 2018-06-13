<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180613164706 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tecnologias (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tecnologias_usuarios (tecnologias_id INT NOT NULL, usuarios_id INT NOT NULL, INDEX IDX_2399065DA88D11C (tecnologias_id), INDEX IDX_2399065F01D3B25 (usuarios_id), PRIMARY KEY(tecnologias_id, usuarios_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tecnologias_usuarios ADD CONSTRAINT FK_2399065DA88D11C FOREIGN KEY (tecnologias_id) REFERENCES tecnologias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tecnologias_usuarios ADD CONSTRAINT FK_2399065F01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tecnologias_usuarios DROP FOREIGN KEY FK_2399065DA88D11C');
        $this->addSql('DROP TABLE tecnologias');
        $this->addSql('DROP TABLE tecnologias_usuarios');
    }
}
