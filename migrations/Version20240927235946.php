<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240927235946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE veterinarians_reports ADD animal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE veterinarians_reports ADD CONSTRAINT FK_FBBCF5E18E962C16 FOREIGN KEY (animal_id) REFERENCES animals (id)');
        $this->addSql('CREATE INDEX IDX_FBBCF5E18E962C16 ON veterinarians_reports (animal_id)');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE veterinarians_reports DROP FOREIGN KEY FK_FBBCF5E18E962C16');
        $this->addSql('DROP INDEX IDX_FBBCF5E18E962C16 ON veterinarians_reports');
        $this->addSql('ALTER TABLE veterinarians_reports DROP animal_id');
    }
}
