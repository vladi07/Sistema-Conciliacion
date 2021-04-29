<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429200934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE actividad_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE agenda_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE documentacion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE permisos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE salas_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE actividad (id INT NOT NULL, 
                                                    descripcion TEXT DEFAULT NULL, 
                                                    fecha DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE agenda (id INT NOT NULL, 
                                                usuario VARCHAR(100) DEFAULT NULL, 
                                                materia VARCHAR(120) DEFAULT NULL, 
                                                fecha DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE documentacion (id INT NOT NULL, 
                                                    tipo_documento VARCHAR(200) DEFAULT NULL, 
                                                    ruta TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE permisos (id INT NOT NULL,
                                                nombre VARCHAR (200) DEFAULT NULL,
                                                descripcion VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE salas (id INT NOT NULL, 
                                            nombre VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE actividad_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE agenda_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE documentacion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE permisos_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE salas_id_seq CASCADE');
        $this->addSql('DROP TABLE actividad');
        $this->addSql('DROP TABLE agenda');
        $this->addSql('DROP TABLE documentacion');
        $this->addSql('DROP TABLE permisos');
        $this->addSql('DROP TABLE salas');
    }
}
