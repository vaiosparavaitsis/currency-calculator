<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * @package DoctrineMigrations
 */
final class Version20200920170708 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getDescription() : string
    {
        return '';
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema) : void
    {
        if (!$schema->hasTable('currencies')) {
            $table = $schema->createTable('currencies');
            $table->addColumn('id', Types::INTEGER)
                ->setAutoincrement(true)
                ->setUnsigned(true);

            $table->addColumn('name_from', Types::STRING);
            $table->addColumn('name_to', Types::STRING);
            $table->addColumn('slug', Types::STRING);

            $table->addColumn('ratio', Types::DECIMAL)
                ->setUnsigned(true)
                ->setPrecision(19)
                ->setScale(4);

            $table->setPrimaryKey(['id']);
            $table->addIndex(['name_from', 'name_to']);
            $table->addUniqueIndex(['slug']);
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema) : void
    {
        if ($schema->hasTable('currencies')) {
            $schema->dropTable('currencies');
        }
    }
}
