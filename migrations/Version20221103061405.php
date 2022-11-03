<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221103061405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE direccion CHANGE cliente_id cliente_id INT DEFAULT NULL, CHANGE municipio_id municipio_id INT DEFAULT NULL, CHANGE provincias_id provincias_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE cliente_id cliente_id INT DEFAULT NULL, CHANGE direccion_id direccion_id INT DEFAULT NULL, CHANGE estado_id estado_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plato CHANGE pedido_id pedido_id INT DEFAULT NULL, CHANGE restaurante_id restaurante_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plato_alergenos DROP FOREIGN KEY FK_154F3317B0DB09EF');
        $this->addSql('ALTER TABLE plato_alergenos DROP FOREIGN KEY FK_154F3317B1C19196');
        $this->addSql('ALTER TABLE plato_alergenos ADD CONSTRAINT FK_154F3317B0DB09EF FOREIGN KEY (plato_id) REFERENCES plato (id)');
        $this->addSql('ALTER TABLE plato_alergenos ADD CONSTRAINT FK_154F3317B1C19196 FOREIGN KEY (alergenos_id) REFERENCES alergenos (id)');
        $this->addSql('ALTER TABLE plato_cantidad CHANGE plato_id plato_id INT DEFAULT NULL, CHANGE pedido_id pedido_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurante CHANGE pedido_id pedido_id INT DEFAULT NULL, CHANGE horarios_id horarios_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurante_categorias DROP FOREIGN KEY FK_92B1976B38B81E49');
        $this->addSql('ALTER TABLE restaurante_categorias DROP FOREIGN KEY FK_92B1976B5792B277');
        $this->addSql('ALTER TABLE restaurante_categorias ADD CONSTRAINT FK_92B1976B38B81E49 FOREIGN KEY (restaurante_id) REFERENCES restaurante (id)');
        $this->addSql('ALTER TABLE restaurante_categorias ADD CONSTRAINT FK_92B1976B5792B277 FOREIGN KEY (categorias_id) REFERENCES categorias (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE direccion CHANGE cliente_id cliente_id INT NOT NULL, CHANGE municipio_id municipio_id INT NOT NULL, CHANGE provincias_id provincias_id INT NOT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE direccion_id direccion_id INT NOT NULL, CHANGE cliente_id cliente_id INT NOT NULL, CHANGE estado_id estado_id INT NOT NULL');
        $this->addSql('ALTER TABLE plato CHANGE pedido_id pedido_id INT NOT NULL, CHANGE restaurante_id restaurante_id INT NOT NULL');
        $this->addSql('ALTER TABLE plato_alergenos DROP FOREIGN KEY FK_154F3317B0DB09EF');
        $this->addSql('ALTER TABLE plato_alergenos DROP FOREIGN KEY FK_154F3317B1C19196');
        $this->addSql('ALTER TABLE plato_alergenos ADD CONSTRAINT FK_154F3317B0DB09EF FOREIGN KEY (plato_id) REFERENCES plato (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plato_alergenos ADD CONSTRAINT FK_154F3317B1C19196 FOREIGN KEY (alergenos_id) REFERENCES alergenos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plato_cantidad CHANGE pedido_id pedido_id INT NOT NULL, CHANGE plato_id plato_id INT NOT NULL');
        $this->addSql('ALTER TABLE restaurante CHANGE horarios_id horarios_id INT NOT NULL, CHANGE pedido_id pedido_id INT NOT NULL');
        $this->addSql('ALTER TABLE restaurante_categorias DROP FOREIGN KEY FK_92B1976B38B81E49');
        $this->addSql('ALTER TABLE restaurante_categorias DROP FOREIGN KEY FK_92B1976B5792B277');
        $this->addSql('ALTER TABLE restaurante_categorias ADD CONSTRAINT FK_92B1976B38B81E49 FOREIGN KEY (restaurante_id) REFERENCES restaurante (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restaurante_categorias ADD CONSTRAINT FK_92B1976B5792B277 FOREIGN KEY (categorias_id) REFERENCES categorias (id) ON DELETE CASCADE');
    }
}
