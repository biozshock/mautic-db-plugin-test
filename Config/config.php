<?php

return [
    'name'        => 'DB Plugin Migrations Test',
    'description' => 'Tests DB plugin migrations',
    'version'     => '1.1.0',
    'services'    => [
        'integrations' => [
            'mautic.integration.dbplugin' => [
                'class' => MauticPlugin\MauticDbPluginTestBundle\Integration\MauticDbPluginIntegration::class,
                'tags'  => [
                    'mautic.integration',
                    'mautic.basic_integration',
                ],
            ],
        ],
    ],
];
