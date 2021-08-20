<?php

use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/src/config.php');
$container = $builder->build();

$pdo = new PDO(
    'mysql:host='   . $container->get('db_host')
                    . ';port=' 
                    . $container->get('db_port')
                    . ';dbname='
                    . $container->get('db_name')
    ,
    $container->get('db_user'),
    $container->get('db_passwd'),
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

return [
    'paths' => [
        'migrations' => __DIR__ . '/src/db/migrations',
        'seeds' => __DIR__ . '/src/db/seeds'
    ],
    'environments' => [
        'default_environment' => 'development',
        'development' => [
            'adapater' => 'mysql',
            'name' => 'example',
            'connection' => $pdo,
            'charset' => 'utf8'
        ]
    ]
];