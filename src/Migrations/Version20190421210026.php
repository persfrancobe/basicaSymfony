<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190421210026 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620D9F966B');
        $this->addSql('DROP INDEX UNIQ_140AB620D9F966B ON page');
        $this->addSql('ALTER TABLE page ADD description VARCHAR(255) DEFAULT NULL, ADD big_title VARCHAR(255) DEFAULT NULL, ADD title VARCHAR(255) DEFAULT NULL, ADD subtitle VARCHAR(255) DEFAULT NULL, DROP description_id, DROP type');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE page ADD description_id INT DEFAULT NULL, ADD type VARCHAR(55) NOT NULL COLLATE utf8mb4_unicode_ci, DROP description, DROP big_title, DROP title, DROP subtitle');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620D9F966B FOREIGN KEY (description_id) REFERENCES txt (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_140AB620D9F966B ON page (description_id)');
    }
}
