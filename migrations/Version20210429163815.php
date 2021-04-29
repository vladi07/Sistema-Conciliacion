<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429163815 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE persona_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE persona (id INT NOT NULL, 
                                                nombres VARCHAR(180) NOT NULL, 
                                                primer_apellido VARCHAR(150) NOT NULL, 
                                                segundo_apellido VARCHAR(150) DEFAULT NULL, 
                                                documento_identidad BIGINT NOT NULL, 
                                                expedido VARCHAR(50) NOT NULL, 
                                                fecha_nacimiento DATE DEFAULT NULL, 
                                                genero VARCHAR(100) DEFAULT NULL, 
                                                correo VARCHAR(150) DEFAULT NULL, 
                                                telefono BIGINT DEFAULT NULL, 
                                                grado_academico VARCHAR(120) DEFAULT NULL, 
                                                domicilio VARCHAR(180) DEFAULT NULL, 
                                                departamento VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE persona_id_seq CASCADE');
        $this->addSql('DROP TABLE persona');
    }
}
