<?php

require_once __DIR__ . '/../framework/Application.php';

use \framework\Application;

$config = [
    'dbConnection' => [
        'dsn' => 'mysql:host=localhost;dbname=DZEmployee',
        'username' => 'root',
        'password' => ''
    ]
];

$application = new Application();
$application->run($config);