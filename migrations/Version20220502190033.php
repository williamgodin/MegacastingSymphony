<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502190033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_8EC5A68DC90409EC ON postuler');
        $this->addSql('sp_rename \'postuler.identifiant\', \'identifiantPersonne\', \'COLUMN\'');
        $this->addSql('ALTER TABLE postuler ADD identifiantCasting INT');
        $this->addSql('ALTER TABLE postuler ADD CONSTRAINT FK_8EC5A68DC8CB16F8 FOREIGN KEY (identifiantPersonne) REFERENCES personne (Id_Personne)');
        $this->addSql('ALTER TABLE postuler ADD CONSTRAINT FK_8EC5A68D36C192B FOREIGN KEY (identifiantCasting) REFERENCES Casting (Id_Casting)');
        $this->addSql('CREATE INDEX IDX_8EC5A68DC8CB16F8 ON postuler (identifiantPersonne)');
        $this->addSql('CREATE INDEX IDX_8EC5A68D36C192B ON postuler (identifiantCasting)');
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
        $this->addSql('ALTER TABLE postuler DROP CONSTRAINT FK_8EC5A68DC8CB16F8');
        $this->addSql('ALTER TABLE postuler DROP CONSTRAINT FK_8EC5A68D36C192B');
        $this->addSql('DROP INDEX IDX_8EC5A68DC8CB16F8 ON postuler');
        $this->addSql('DROP INDEX IDX_8EC5A68D36C192B ON postuler');
        $this->addSql('ALTER TABLE postuler ADD identifiant INT');
        $this->addSql('ALTER TABLE postuler DROP COLUMN identifiantPersonne');
        $this->addSql('ALTER TABLE postuler DROP COLUMN identifiantCasting');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_8EC5A68DC90409EC ON postuler (identifiant)');
    }
}
