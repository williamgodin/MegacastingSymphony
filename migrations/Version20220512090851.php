<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512090851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Casting (postulations_id INT, Id_Casting INT IDENTITY NOT NULL, Intitule NVARCHAR(50) NOT NULL, Reference INT NOT NULL, Date_debut_publication DATETIME2(6) NOT NULL, Nbr_poste INT NOT NULL, Localisation NVARCHAR(50) NOT NULL, Description_poste NVARCHAR(250) NOT NULL, Description_profil NVARCHAR(250) NOT NULL, Coordonnees NVARCHAR(250) NOT NULL, Duree_diffusion DATETIME2(6) NOT NULL, Id_Contrat INT NOT NULL, Id_Metier INT NOT NULL, Id_Professionnel INT NOT NULL, PRIMARY KEY (Id_Casting))');
        $this->addSql('CREATE INDEX IDX_1EA683CC2D1C3652 ON Casting (postulations_id)');
        $this->addSql('CREATE INDEX IDX_1EA683CC3E490AAF ON Casting (Id_Contrat)');
        $this->addSql('CREATE INDEX IDX_1EA683CCF2CA3FF4 ON Casting (Id_Metier)');
        $this->addSql('CREATE INDEX IDX_1EA683CC604120E2 ON Casting (Id_Professionnel)');
        $this->addSql('CREATE TABLE Civilite (Id_Civilite INT IDENTITY NOT NULL, Genre NVARCHAR(50) NOT NULL, PRIMARY KEY (Id_Civilite))');
        $this->addSql('CREATE TABLE Domaine_de_métier (Id_Domaine_metier INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Id_Domaine_metier))');
        $this->addSql('CREATE TABLE Métier (Id_Metier INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Id_Domaine_metier INT NOT NULL, PRIMARY KEY (Id_Metier))');
        $this->addSql('CREATE INDEX IDX_572112AC80E84B86 ON Métier (Id_Domaine_metier)');
        $this->addSql('CREATE TABLE Type_de_contrat (Id_Contrat INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Id_Contrat))');
        $this->addSql('CREATE TABLE artiste (login NVARCHAR(255) NOT NULL, roles VARCHAR(MAX) NOT NULL, password NVARCHAR(255) NOT NULL, Id_Personne INT NOT NULL, PRIMARY KEY (Id_Personne))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:json)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'artiste\', N\'COLUMN\', roles');
        $this->addSql('CREATE TABLE personne (Id_Personne INT IDENTITY NOT NULL, Nom NVARCHAR(50) NOT NULL, Prenom NVARCHAR(50) NOT NULL, Ville NVARCHAR(50) NOT NULL, Adresse NVARCHAR(50) NOT NULL, Email NVARCHAR(50) NOT NULL, Telephone NVARCHAR(50), Id_Civilite INT NOT NULL, Profil NVARCHAR(255) NOT NULL, PRIMARY KEY (Id_Personne))');
        $this->addSql('CREATE INDEX IDX_FCEC9EF37D1AC2 ON personne (Id_Civilite)');
        $this->addSql('CREATE TABLE postuler (id INT IDENTITY NOT NULL, date_postulation DATETIME2(6), identifiantPersonne INT, identifiantCasting INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_8EC5A68DC8CB16F8 ON postuler (identifiantPersonne)');
        $this->addSql('CREATE INDEX IDX_8EC5A68D36C192B ON postuler (identifiantCasting)');
        $this->addSql('CREATE TABLE professionnel (loginlourd NVARCHAR(255) NOT NULL, passwordlourd NVARCHAR(255) NOT NULL, Id_Personne INT NOT NULL, PRIMARY KEY (Id_Personne))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT IDENTITY NOT NULL, body VARCHAR(MAX) NOT NULL, headers VARCHAR(MAX) NOT NULL, queue_name NVARCHAR(255) NOT NULL, created_at DATETIME2(6) NOT NULL, available_at DATETIME2(6) NOT NULL, delivered_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CC3E490AAF FOREIGN KEY (Id_Contrat) REFERENCES Type_de_contrat (Id_Contrat)');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CCF2CA3FF4 FOREIGN KEY (Id_Metier) REFERENCES Métier (Id_Metier)');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CC604120E2 FOREIGN KEY (Id_Professionnel) REFERENCES professionnel (Id_Personne)');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CC2D1C3652 FOREIGN KEY (postulations_id) REFERENCES postuler (id)');
        $this->addSql('ALTER TABLE Métier ADD CONSTRAINT FK_572112AC80E84B86 FOREIGN KEY (Id_Domaine_metier) REFERENCES Domaine_de_métier (Id_Domaine_metier)');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354F20FFC8FB FOREIGN KEY (Id_Personne) REFERENCES personne (Id_Personne) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EF37D1AC2 FOREIGN KEY (Id_Civilite) REFERENCES Civilite (Id_Civilite)');
        $this->addSql('ALTER TABLE postuler ADD CONSTRAINT FK_8EC5A68DC8CB16F8 FOREIGN KEY (identifiantPersonne) REFERENCES personne (Id_Personne)');
        $this->addSql('ALTER TABLE postuler ADD CONSTRAINT FK_8EC5A68D36C192B FOREIGN KEY (identifiantCasting) REFERENCES Casting (Id_Casting)');
        $this->addSql('ALTER TABLE professionnel ADD CONSTRAINT FK_7A28C10F20FFC8FB FOREIGN KEY (Id_Personne) REFERENCES personne (Id_Personne) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE postuler DROP CONSTRAINT FK_8EC5A68D36C192B');
        $this->addSql('ALTER TABLE personne DROP CONSTRAINT FK_FCEC9EF37D1AC2');
        $this->addSql('ALTER TABLE Métier DROP CONSTRAINT FK_572112AC80E84B86');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CCF2CA3FF4');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CC3E490AAF');
        $this->addSql('ALTER TABLE artiste DROP CONSTRAINT FK_9C07354F20FFC8FB');
        $this->addSql('ALTER TABLE postuler DROP CONSTRAINT FK_8EC5A68DC8CB16F8');
        $this->addSql('ALTER TABLE professionnel DROP CONSTRAINT FK_7A28C10F20FFC8FB');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CC2D1C3652');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CC604120E2');
        $this->addSql('DROP TABLE Casting');
        $this->addSql('DROP TABLE Civilite');
        $this->addSql('DROP TABLE Domaine_de_métier');
        $this->addSql('DROP TABLE Métier');
        $this->addSql('DROP TABLE Type_de_contrat');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE postuler');
        $this->addSql('DROP TABLE professionnel');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
