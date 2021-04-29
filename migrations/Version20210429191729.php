<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429191729 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE caso_conciliatorio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE centro_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE solicitud_conciliacion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE caso_conciliatorio (id INT NOT NULL, 
                                                            fecha DATE DEFAULT NULL, 
                                                            idioma VARCHAR(100) DEFAULT NULL, 
                                                            motivo_rechazo TEXT DEFAULT NULL, 
                                                            registro_asistencia TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, 
                                                            detalle_asistencia VARCHAR(250) DEFAULT NULL, 
                                                            etapa VARCHAR(120) DEFAULT NULL, 
                                                            estado BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE centro (id INT NOT NULL, 
                                                nombre VARCHAR(250) NOT NULL, 
                                                direccion TEXT NOT NULL, 
                                                matricula VARCHAR(120) NOT NULL, 
                                                tipo VARCHAR(150) NOT NULL, 
                                                telefono BIGINT DEFAULT NULL, 
                                                correo VARCHAR(150) DEFAULT NULL, 
                                                departamento VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE solicitud_conciliacion (id INT NOT NULL, 
                                                                descripcion TEXT DEFAULT NULL, 
                                                                materia VARCHAR(120) DEFAULT NULL, 
                                                                tipo_conciliacion VARCHAR(120) DEFAULT NULL, 
                                                                fecha DATE DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE caso_conciliatorio_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE centro_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE solicitud_conciliacion_id_seq CASCADE');
        $this->addSql('DROP TABLE caso_conciliatorio');
        $this->addSql('DROP TABLE centro');
        $this->addSql('DROP TABLE solicitud_conciliacion');
    }
}
