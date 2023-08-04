<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230804073714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bar (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, cp INT NOT NULL, address VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, date_creation DATETIME NOT NULL, INDEX IDX_76FF8CAA7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar_type_bar (bar_id INT NOT NULL, type_bar_id INT NOT NULL, INDEX IDX_607B132089A253A (bar_id), INDEX IDX_607B13202B4D4E02 (type_bar_id), PRIMARY KEY(bar_id, type_bar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar_service (bar_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_73B8BECE89A253A (bar_id), INDEX IDX_73B8BECEED5CA9E6 (service_id), PRIMARY KEY(bar_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar_bier (bar_id INT NOT NULL, bier_id INT NOT NULL, INDEX IDX_562C8BFB89A253A (bar_id), INDEX IDX_562C8BFBA75A5028 (bier_id), PRIMARY KEY(bar_id, bier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar_user (bar_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8A53C27B89A253A (bar_id), INDEX IDX_8A53C27BA76ED395 (user_id), PRIMARY KEY(bar_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, bar_id INT DEFAULT NULL, user_id INT DEFAULT NULL, comment LONGTEXT NOT NULL, value INT NOT NULL, date_creation DATETIME NOT NULL, INDEX IDX_9474526C89A253A (bar_id), INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_bar (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, role LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA7E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE bar_type_bar ADD CONSTRAINT FK_607B132089A253A FOREIGN KEY (bar_id) REFERENCES bar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar_type_bar ADD CONSTRAINT FK_607B13202B4D4E02 FOREIGN KEY (type_bar_id) REFERENCES type_bar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar_service ADD CONSTRAINT FK_73B8BECE89A253A FOREIGN KEY (bar_id) REFERENCES bar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar_service ADD CONSTRAINT FK_73B8BECEED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar_bier ADD CONSTRAINT FK_562C8BFB89A253A FOREIGN KEY (bar_id) REFERENCES bar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar_bier ADD CONSTRAINT FK_562C8BFBA75A5028 FOREIGN KEY (bier_id) REFERENCES bier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar_user ADD CONSTRAINT FK_8A53C27B89A253A FOREIGN KEY (bar_id) REFERENCES bar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar_user ADD CONSTRAINT FK_8A53C27BA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C89A253A FOREIGN KEY (bar_id) REFERENCES bar (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA7E3C61F9');
        $this->addSql('ALTER TABLE bar_type_bar DROP FOREIGN KEY FK_607B132089A253A');
        $this->addSql('ALTER TABLE bar_type_bar DROP FOREIGN KEY FK_607B13202B4D4E02');
        $this->addSql('ALTER TABLE bar_service DROP FOREIGN KEY FK_73B8BECE89A253A');
        $this->addSql('ALTER TABLE bar_service DROP FOREIGN KEY FK_73B8BECEED5CA9E6');
        $this->addSql('ALTER TABLE bar_bier DROP FOREIGN KEY FK_562C8BFB89A253A');
        $this->addSql('ALTER TABLE bar_bier DROP FOREIGN KEY FK_562C8BFBA75A5028');
        $this->addSql('ALTER TABLE bar_user DROP FOREIGN KEY FK_8A53C27B89A253A');
        $this->addSql('ALTER TABLE bar_user DROP FOREIGN KEY FK_8A53C27BA76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C89A253A');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE bar');
        $this->addSql('DROP TABLE bar_type_bar');
        $this->addSql('DROP TABLE bar_service');
        $this->addSql('DROP TABLE bar_bier');
        $this->addSql('DROP TABLE bar_user');
        $this->addSql('DROP TABLE bier');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE type_bar');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
