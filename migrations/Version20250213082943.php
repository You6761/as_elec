<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250213082943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD numero VARCHAR(20) NOT NULL, ADD type_habitat VARCHAR(50) NOT NULL, ADD estimation_travaux VARCHAR(50) NOT NULL, ADD plus_de_details LONGTEXT DEFAULT NULL, DROP client_nom, DROP client_email, DROP montant');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis ADD client_nom VARCHAR(255) NOT NULL, ADD client_email VARCHAR(255) NOT NULL, ADD montant NUMERIC(10, 2) NOT NULL, DROP nom, DROP prenom, DROP ville, DROP adresse, DROP numero, DROP type_habitat, DROP estimation_travaux, DROP plus_de_details');
    }
}
