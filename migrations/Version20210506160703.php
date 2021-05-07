<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506160703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('CREATE TABLE usuarios_caso_conciliatorio (usuarios_id INT NOT NULL, caso_conciliatorio_id INT NOT NULL, PRIMARY KEY(usuarios_id, caso_conciliatorio_id))');
        $this->addSql('CREATE INDEX IDX_52B896DF01D3B25 ON usuarios_caso_conciliatorio (usuarios_id)');
        $this->addSql('CREATE INDEX IDX_52B896D531FBA0F ON usuarios_caso_conciliatorio (caso_conciliatorio_id)');
        $this->addSql('ALTER TABLE usuarios_caso_conciliatorio ADD CONSTRAINT FK_52B896DF01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuarios_caso_conciliatorio ADD CONSTRAINT FK_52B896D531FBA0F FOREIGN KEY (caso_conciliatorio_id) REFERENCES caso_conciliatorio (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE usuarios_caso_conciliatorio');
    }
}
