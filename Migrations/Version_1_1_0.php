<?php

declare(strict_types=1);

namespace MauticPlugin\MauticDbPluginTestBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\SchemaException;
use Mautic\IntegrationsBundle\Migration\AbstractMigration;

class Version_1_1_0 extends AbstractMigration
{
    private const TABLE = 'db_test';

    protected function isApplicable(Schema $schema): bool
    {
        try {
            return $schema->hasTable($this->concatPrefix(self::TABLE))
                && !$schema->getTable($this->concatPrefix(self::TABLE))->hasColumn('field');
        } catch (SchemaException $e) {
            return false;
        }
    }

    protected function up(): void
    {
        $this->addSql(
            sprintf(
                'ALTER TABLE `%s` ADD `field` VARCHAR(255) DEFAULT NULL',
                $this->concatPrefix(self::TABLE)
            )
        );
    }
}
