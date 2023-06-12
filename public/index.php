<?php
    require_once __DIR__ . '/../app/App.php';
    // require __DIR__ . '../Request.php';

    // Create an instance of the App
    $app = new App();

    // Handle the request
    $app->handleRequest();
?>