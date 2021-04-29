<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429180421 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE roles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE usuario_externo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE usuarios_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE roles (id INT NOT NULL, 
                                                descripcion VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE usuario_externo (id INT NOT NULL, 
                                                            tipo_usuario VARCHAR(150) DEFAULT NULL, 
                                                            tipo_documento VARCHAR(150) DEFAULT NULL, 
                                                            orden_judicial VARCHAR(150) DEFAULT NULL, 
                                                            autoridad_emite VARCHAR(180) DEFAULT NULL, 
                                                            fecha_emision DATE DEFAULT NULL, 
                                                            creado_por VARCHAR(100) DEFAULT NULL, 
                                                            fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE usuarios (id INT NOT NULL, 
                                                    usuario VARCHAR(100) DEFAULT NULL, 
                                                    clave VARCHAR(100) DEFAULT NULL, 
                                                    tipo VARCHAR(120) DEFAULT NULL, 
                                                    estado BOOLEAN DEFAULT NULL, 
                                                    creado_por VARCHAR(120) DEFAULT NULL, 
                                                    fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE roles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE usuario_externo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE usuarios_id_seq CASCADE');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE usuario_externo');
        $this->addSql('DROP TABLE usuarios');
    }
}
