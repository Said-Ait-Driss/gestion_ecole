<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..');
$dotenv->load();

function env($key, $default = null)
{
    $value = $_ENV[$key] ?? $default;
    return $value;
}




?>