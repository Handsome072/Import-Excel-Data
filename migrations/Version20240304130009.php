<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304130009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE excel_data (id INT AUTO_INCREMENT NOT NULL, cmpt_affaire VARCHAR(255) DEFAULT NULL, cmpt_event VARCHAR(255) DEFAULT NULL, cmpt_dernier_event VARCHAR(255) DEFAULT NULL, num_fiche INT DEFAULT NULL, libelle_civilite VARCHAR(255) DEFAULT NULL, prop_actuel_vehicule VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, num_nom_voie VARCHAR(255) DEFAULT NULL, complement_adresse_1 VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, tel_domicile INT DEFAULT NULL, tel_portable INT DEFAULT NULL, tel_job INT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, date_mise_circulation DATE DEFAULT NULL, date_achat DATE DEFAULT NULL, date_dernier_event DATE DEFAULT NULL, libelle_marque VARCHAR(255) DEFAULT NULL, libelle_modele VARCHAR(255) DEFAULT NULL, version VARCHAR(255) DEFAULT NULL, vin VARCHAR(255) DEFAULT NULL, immatriculation VARCHAR(255) DEFAULT NULL, type_prospect VARCHAR(255) DEFAULT NULL, kilometrage INT DEFAULT NULL, energie VARCHAR(255) DEFAULT NULL, vendeur_vn VARCHAR(255) DEFAULT NULL, vendeur_vo VARCHAR(255) DEFAULT NULL, commentaire_facturation VARCHAR(255) DEFAULT NULL, type_vn_vo VARCHAR(255) DEFAULT NULL, num_vn_vo VARCHAR(255) DEFAULT NULL, intermediaire_vente_vn VARCHAR(255) DEFAULT NULL, date_evenement DATE DEFAULT NULL, origine_evenement VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE excel_data');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
