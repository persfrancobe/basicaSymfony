<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190428221021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, name_id INT DEFAULT NULL, title_id INT DEFAULT NULL, description_id INT DEFAULT NULL, suite_text_id INT DEFAULT NULL, image_id INT DEFAULT NULL, date DATETIME NOT NULL, comments INT NOT NULL, UNIQUE INDEX UNIQ_C015514371179CD6 (name_id), UNIQUE INDEX UNIQ_C0155143A9F87BD (title_id), UNIQUE INDEX UNIQ_C0155143D9F966B (description_id), UNIQUE INDEX UNIQ_C0155143E8BE2C4 (suite_text_id), UNIQUE INDEX UNIQ_C01551433DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_category (blog_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_72113DE6DAE07E97 (blog_id), INDEX IDX_72113DE612469DE2 (category_id), PRIMARY KEY(blog_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name_id INT DEFAULT NULL, description_id INT DEFAULT NULL, image_id INT DEFAULT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_64C19C171179CD6 (name_id), UNIQUE INDEX UNIQ_64C19C1D9F966B (description_id), UNIQUE INDEX UNIQ_64C19C13DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE name (id INT AUTO_INCREMENT NOT NULL, fr VARCHAR(255) NOT NULL, en VARCHAR(255) NOT NULL, slug_en VARCHAR(255) NOT NULL, slug_fr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title_id INT DEFAULT NULL, description_id INT DEFAULT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_1DD39950A9F87BD (title_id), UNIQUE INDEX UNIQ_1DD39950D9F966B (description_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, name_id INT DEFAULT NULL, description_id INT DEFAULT NULL, big_title_id INT DEFAULT NULL, title_id INT DEFAULT NULL, subtitle_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, date DATETIME NOT NULL, content LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_140AB62071179CD6 (name_id), UNIQUE INDEX UNIQ_140AB620D9F966B (description_id), UNIQUE INDEX UNIQ_140AB6206548553F (big_title_id), UNIQUE INDEX UNIQ_140AB620A9F87BD (title_id), UNIQUE INDEX UNIQ_140AB62010F3A34 (subtitle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name_id INT DEFAULT NULL, description_id INT DEFAULT NULL, image_id INT DEFAULT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_389B78371179CD6 (name_id), UNIQUE INDEX UNIQ_389B783D9F966B (description_id), UNIQUE INDEX UNIQ_389B7833DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE txt (id INT AUTO_INCREMENT NOT NULL, en LONGTEXT DEFAULT NULL, fr LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, hous_no VARCHAR(255) DEFAULT NULL, post_code VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work (id INT AUTO_INCREMENT NOT NULL, name_id INT DEFAULT NULL, description_id INT DEFAULT NULL, image_id INT DEFAULT NULL, user_id INT DEFAULT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_534E688071179CD6 (name_id), UNIQUE INDEX UNIQ_534E6880D9F966B (description_id), UNIQUE INDEX UNIQ_534E68803DA5256D (image_id), INDEX IDX_534E6880A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_tag (work_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_79E7E01FBB3453DB (work_id), INDEX IDX_79E7E01FBAD26311 (tag_id), PRIMARY KEY(work_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C015514371179CD6 FOREIGN KEY (name_id) REFERENCES name (id)');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143A9F87BD FOREIGN KEY (title_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143D9F966B FOREIGN KEY (description_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143E8BE2C4 FOREIGN KEY (suite_text_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C01551433DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE blog_category ADD CONSTRAINT FK_72113DE6DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_category ADD CONSTRAINT FK_72113DE612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C171179CD6 FOREIGN KEY (name_id) REFERENCES name (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1D9F966B FOREIGN KEY (description_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C13DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950A9F87BD FOREIGN KEY (title_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950D9F966B FOREIGN KEY (description_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB62071179CD6 FOREIGN KEY (name_id) REFERENCES name (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620D9F966B FOREIGN KEY (description_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6206548553F FOREIGN KEY (big_title_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620A9F87BD FOREIGN KEY (title_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB62010F3A34 FOREIGN KEY (subtitle_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B78371179CD6 FOREIGN KEY (name_id) REFERENCES name (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783D9F966B FOREIGN KEY (description_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B7833DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E688071179CD6 FOREIGN KEY (name_id) REFERENCES name (id)');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E6880D9F966B FOREIGN KEY (description_id) REFERENCES txt (id)');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E68803DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E6880A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE work_tag ADD CONSTRAINT FK_79E7E01FBB3453DB FOREIGN KEY (work_id) REFERENCES work (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work_tag ADD CONSTRAINT FK_79E7E01FBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog_category DROP FOREIGN KEY FK_72113DE6DAE07E97');
        $this->addSql('ALTER TABLE blog_category DROP FOREIGN KEY FK_72113DE612469DE2');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C01551433DA5256D');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C13DA5256D');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B7833DA5256D');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E68803DA5256D');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C015514371179CD6');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C171179CD6');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB62071179CD6');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B78371179CD6');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E688071179CD6');
        $this->addSql('ALTER TABLE work_tag DROP FOREIGN KEY FK_79E7E01FBAD26311');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143A9F87BD');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143D9F966B');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143E8BE2C4');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1D9F966B');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950A9F87BD');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950D9F966B');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620D9F966B');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6206548553F');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620A9F87BD');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB62010F3A34');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B783D9F966B');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E6880D9F966B');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E6880A76ED395');
        $this->addSql('ALTER TABLE work_tag DROP FOREIGN KEY FK_79E7E01FBB3453DB');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE blog_category');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE name');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE txt');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE work');
        $this->addSql('DROP TABLE work_tag');
    }
}
