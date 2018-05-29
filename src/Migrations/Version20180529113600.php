<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180529113600 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE noticias ADD categoria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE noticias ADD CONSTRAINT FK_253D9253397707A FOREIGN KEY (categoria_id) REFERENCES tematica_noticia (id)');
        $this->addSql('CREATE INDEX IDX_253D9253397707A ON noticias (categoria_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE noticias DROP FOREIGN KEY FK_253D9253397707A');
        $this->addSql('DROP INDEX IDX_253D9253397707A ON noticias');
        $this->addSql('ALTER TABLE noticias DROP categoria_id');
    }
}
