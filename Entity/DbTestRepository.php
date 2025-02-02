<?php

namespace MauticPlugin\MauticDbPluginTestBundle\Entity;

use Mautic\CoreBundle\Entity\CommonRepository;

class DbTestRepository extends CommonRepository
{
    public const ALIAS = 'dbt';

    public function getTableAlias(): string
    {
        return self::ALIAS;
    }
}
