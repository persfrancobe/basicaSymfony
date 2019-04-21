<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190421174216 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950D664FC4E');
        $this->addSql('DROP INDEX UNIQ_1DD39950D664FC4E ON news');
        $this->addSql('ALTER TABLE news CHANGE desription_id description_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950D9F966B FOREIGN KEY (description_id) REFERENCES txt (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1DD39950D9F966B ON news (description_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950D9F966B');
        $this->addSql('DROP INDEX UNIQ_1DD39950D9F966B ON news');
        $this->addSql('ALTER TABLE news CHANGE description_id desription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950D664FC4E FOREIGN KEY (desription_id) REFERENCES txt (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1DD39950D664FC4E ON news (desription_id)');
    }
}
