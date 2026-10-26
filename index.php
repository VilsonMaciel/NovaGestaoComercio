<?php

date_default_timezone_set('America/Campo_Grande'); // Definindo fuso horário local

session_start();

$composerAutoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($composerAutoload)) {
    require_once $composerAutoload;
}

spl_autoload_register(function ($class) {
    $base_dir = __DIR__ . '/app/';
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$config = require __DIR__ . '/config/app.php';
define('BASE_URL', $config['base_folder']);

$router = new Core\Router();
require_once __DIR__ . '/app/Routes/routes.php';

$router->dispatch();
