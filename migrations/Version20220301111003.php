<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301111003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule ADD numero_moteur VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE declaration CHANGE lieu_de_perte lieu_de_perte VARCHAR(200) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE moto CHANGE modele modele VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE marque marque VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE couleur couleur VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_serie numero_serie VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_matricule numero_matricule VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE signaller CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenoms prenoms VARCHAR(200) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE first_name first_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu_de_naissance lieu_de_naissance VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cin cin VARCHAR(12) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(200) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(200) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user_login CHANGE username username VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vehicule DROP numero_moteur, CHANGE modele modele VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE marque marque VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE couleur_interne couleur_interne VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE couleur_externe couleur_externe VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_matricule numero_matricule VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_serie numero_serie VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE carburant carburant VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
