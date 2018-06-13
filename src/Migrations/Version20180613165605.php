<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180613165605 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sitios_web_crai_tecnologias (sitios_web_crai_id INT NOT NULL, tecnologias_id INT NOT NULL, INDEX IDX_8A0EC0C463A9D6A6 (sitios_web_crai_id), INDEX IDX_8A0EC0C4DA88D11C (tecnologias_id), PRIMARY KEY(sitios_web_crai_id, tecnologias_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sitios_web_crai_tecnologias ADD CONSTRAINT FK_8A0EC0C463A9D6A6 FOREIGN KEY (sitios_web_crai_id) REFERENCES sitios_web_crai (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sitios_web_crai_tecnologias ADD CONSTRAINT FK_8A0EC0C4DA88D11C FOREIGN KEY (tecnologias_id) REFERENCES tecnologias (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sitios_web_crai_tecnologias');
    }
}
