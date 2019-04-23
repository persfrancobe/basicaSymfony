<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190422161852 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_534E6880989D9B62 ON work');
        $this->addSql('ALTER TABLE work ADD name_id INT DEFAULT NULL, ADD slug_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, DROP name, DROP slug');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E688071179CD6 FOREIGN KEY (name_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E6880311966CE FOREIGN KEY (slug_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E6880A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_534E688071179CD6 ON work (name_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_534E6880311966CE ON work (slug_id)');
        $this->addSql('CREATE INDEX IDX_534E6880A76ED395 ON work (user_id)');
        $this->addSql('DROP INDEX UNIQ_C0155143989D9B62 ON blog');
        $this->addSql('ALTER TABLE blog ADD name_id INT DEFAULT NULL, ADD slug_id INT DEFAULT NULL, ADD title_id INT DEFAULT NULL, DROP name, DROP slug, DROP title, CHANGE comments comments INT NOT NULL');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C015514371179CD6 FOREIGN KEY (name_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143311966CE FOREIGN KEY (slug_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143A9F87BD FOREIGN KEY (title_id) REFERENCES txt (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C015514371179CD6 ON blog (name_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0155143311966CE ON blog (slug_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0155143A9F87BD ON blog (title_id)');
        $this->addSql('DROP INDEX UNIQ_64C19C1989D9B62 ON category');
        $this->addSql('ALTER TABLE category ADD name_id INT DEFAULT NULL, ADD slug_id INT DEFAULT NULL, DROP name, DROP slug');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C171179CD6 FOREIGN KEY (name_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1311966CE FOREIGN KEY (slug_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C171179CD6 ON category (name_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C1311966CE ON category (slug_id)');
        $this->addSql('DROP INDEX UNIQ_389B783989D9B62 ON tag');
        $this->addSql('ALTER TABLE tag ADD slug_id INT DEFAULT NULL, ADD name_id INT DEFAULT NULL, DROP slug, DROP name');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783311966CE FOREIGN KEY (slug_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B78371179CD6 FOREIGN KEY (name_id) REFERENCES txt (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_389B783311966CE ON tag (slug_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_389B78371179CD6 ON tag (name_id)');
        $this->addSql('ALTER TABLE image DROP web_path, DROP slug, DROP ord');
        $this->addSql('ALTER TABLE news ADD title_id INT DEFAULT NULL, ADD slug_id INT DEFAULT NULL, DROP title');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950A9F87BD FOREIGN KEY (title_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950311966CE FOREIGN KEY (slug_id) REFERENCES txt (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1DD39950A9F87BD ON news (title_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1DD39950311966CE ON news (slug_id)');
        $this->addSql('ALTER TABLE txt DROP type');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C015514371179CD6');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143311966CE');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143A9F87BD');
        $this->addSql('DROP INDEX UNIQ_C015514371179CD6 ON blog');
        $this->addSql('DROP INDEX UNIQ_C0155143311966CE ON blog');
        $this->addSql('DROP INDEX UNIQ_C0155143A9F87BD ON blog');
        $this->addSql('ALTER TABLE blog ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD slug VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD title VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP name_id, DROP slug_id, DROP title_id, CHANGE comments comments INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0155143989D9B62 ON blog (slug)');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C171179CD6');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1311966CE');
        $this->addSql('DROP INDEX UNIQ_64C19C171179CD6 ON category');
        $this->addSql('DROP INDEX UNIQ_64C19C1311966CE ON category');
        $this->addSql('ALTER TABLE category ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD slug VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP name_id, DROP slug_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C1989D9B62 ON category (slug)');
        $this->addSql('ALTER TABLE image ADD web_path VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD slug VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD ord INT DEFAULT NULL');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950A9F87BD');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950311966CE');
        $this->addSql('DROP INDEX UNIQ_1DD39950A9F87BD ON news');
        $this->addSql('DROP INDEX UNIQ_1DD39950311966CE ON news');
        $this->addSql('ALTER TABLE news ADD title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP title_id, DROP slug_id');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B783311966CE');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B78371179CD6');
        $this->addSql('DROP INDEX UNIQ_389B783311966CE ON tag');
        $this->addSql('DROP INDEX UNIQ_389B78371179CD6 ON tag');
        $this->addSql('ALTER TABLE tag ADD slug VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP slug_id, DROP name_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_389B783989D9B62 ON tag (slug)');
        $this->addSql('ALTER TABLE txt ADD type VARCHAR(55) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E688071179CD6');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E6880311966CE');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E6880A76ED395');
        $this->addSql('DROP INDEX UNIQ_534E688071179CD6 ON work');
        $this->addSql('DROP INDEX UNIQ_534E6880311966CE ON work');
        $this->addSql('DROP INDEX IDX_534E6880A76ED395 ON work');
        $this->addSql('ALTER TABLE work ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD slug VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP name_id, DROP slug_id, DROP user_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_534E6880989D9B62 ON work (slug)');
    }
}
