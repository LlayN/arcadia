<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240927233337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animals (id INT AUTO_INCREMENT NOT NULL, breed_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, INDEX IDX_966C69DDA8B4A30F (breed_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDA8B4A30F FOREIGN KEY (breed_id) REFERENCES breeds (id)');
        $this->addSql('ALTER TABLE livings ADD animals_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livings ADD CONSTRAINT FK_6FC43157132B9E58 FOREIGN KEY (animals_id) REFERENCES animals (id)');
        $this->addSql('CREATE INDEX IDX_6FC43157132B9E58 ON livings (animals_id)');
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livings DROP FOREIGN KEY FK_6FC43157132B9E58');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDA8B4A30F');
        $this->addSql('DROP TABLE animals');
        $this->addSql('DROP INDEX IDX_6FC43157132B9E58 ON livings');
        $this->addSql('ALTER TABLE livings DROP animals_id');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
