<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190422184208 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1311966CE');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C171179CD6');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1311966CE FOREIGN KEY (slug_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C171179CD6 FOREIGN KEY (name_id) REFERENCES txt (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C171179CD6');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1311966CE');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C171179CD6 FOREIGN KEY (name_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1311966CE FOREIGN KEY (slug_id) REFERENCES image (id)');
    }
}
