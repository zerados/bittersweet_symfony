<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170801001824 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE recipe_ingredients (recipe_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_9F925F2B59D8A214 (recipe_id), INDEX IDX_9F925F2B933FE08C (ingredient_id), PRIMARY KEY(recipe_id, ingredient_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6BAF78705E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipe_ingredients ADD CONSTRAINT FK_9F925F2B59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE recipe_ingredients ADD CONSTRAINT FK_9F925F2B933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recipe_ingredients DROP FOREIGN KEY FK_9F925F2B933FE08C');
        $this->addSql('DROP TABLE recipe_ingredients');
        $this->addSql('DROP TABLE ingredient');
    }
}
