<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126021739 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE car_color (car_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_B9FDCD3EC3C6F69F (car_id), INDEX IDX_B9FDCD3E7ADA1FB5 (color_id), PRIMARY KEY(car_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_color ADD CONSTRAINT FK_B9FDCD3EC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_color ADD CONSTRAINT FK_B9FDCD3E7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA76ED395');
        $this->addSql('DROP INDEX IDX_773DE69DA76ED395 ON car');
        $this->addSql('ALTER TABLE car DROP user_id');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9A76ED395');
        $this->addSql('DROP INDEX IDX_665648E9A76ED395 ON color');
        $this->addSql('ALTER TABLE color DROP user_id');
        $this->addSql('ALTER TABLE user ADD carid_id INT DEFAULT NULL, CHANGE fistname firstname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E90BFAE0 FOREIGN KEY (carid_id) REFERENCES car (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649E90BFAE0 ON user (carid_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE car_color');
        $this->addSql('ALTER TABLE car ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_773DE69DA76ED395 ON car (user_id)');
        $this->addSql('ALTER TABLE color ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_665648E9A76ED395 ON color (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E90BFAE0');
        $this->addSql('DROP INDEX IDX_8D93D649E90BFAE0 ON user');
        $this->addSql('ALTER TABLE user DROP carid_id, CHANGE firstname fistname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
