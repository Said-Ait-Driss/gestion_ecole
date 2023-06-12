<?php
// index.php

// Load configuration
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/Response.php';

// Define the App class
class App {

    private $request;
    private $response;

    public function __construct() {
        session_start();
        $db = new DatabaseConnection();
        try {
            $db->initConnection();
            $GLOBALS['db'] = $db;
        } catch (PDOException $e) {
                echo 'Database connection failed: ' . $e->getMessage();
            }


        // Make the $db instance available globally
        $this->request = new Request();
        $this->response = new Response();
    }


    public function handleRequest() {
        // Handle the request logic here
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = $_SERVER['REQUEST_URI'];

        $requestPath = $this->parseUrl($requestPath);
        // Load routes
        $routes = require __DIR__ .  '/../routes/routes.php';;

        // Find matching route
        $matchedRoute = $this->findMatchingRoute($requestPath, $routes);

        // Handle the matched route
        if ($matchedRoute) {
            $handler = $matchedRoute['handler'];
            $params = $matchedRoute['params'];
            $this->callHandler($handler, $params);
        } else {
            $this->handleNotFoundPageRequest();
        }
    }

    private function findMatchingRoute($requestPath, $routes) {
        foreach ($routes as $route => $handler) {
            $pattern = '/^' . str_replace('/', '\/', $route) . '$/';
            $matches = [];
            $exact_path = str_replace('/ecole/','/',$requestPath); // this should be in .env or config file
            if (preg_match($pattern,$exact_path, $matches)) {
                array_shift($matches); // Remove the full match
                $params = $matches;
                return [
                    'handler' => $handler,
                    'params' => $params
                ];
            }
        }

        return null;
    }

    
    private function callHandler($handler, $params) {
        if (is_callable($handler)) {
            // if is method

            call_user_func_array($handler, $params);
        
        } else if (is_string($handler) && strpos($handler, '@') !== false) {
            // if is class
            $parts = explode('@', $handler);
            $className = $parts[0];
            $methodName = $parts[1];
            
            $className = str_replace('\\', '/', $className);

            $controllerPath = __DIR__ . '/../controllers/' . $className . '.php';

            if (file_exists($controllerPath)) {
                require_once $controllerPath;
        
                // Create an instance of the controller
                $controller = new $className();

                // Call the method on the controller
                if (method_exists($controller, $methodName)) {
                    call_user_func_array([$controller, $methodName], [$this->request, $this->response]);
                } else {
                    $this->handleNotFoundPageRequest();
                }
            }
            else {
                $this->handleNotFoundPageRequest();
            }
            
        } else {
            $this->handleNotFoundPageRequest();
        }
    }
    
    private function parseUrl($requestPath){
        $requestPath = parse_url($requestPath, PHP_URL_PATH);
        $requestPath = trim($requestPath, '/'); // we must get ecole from .env or config file later on 
        $segments = explode('ecole', $requestPath);
        $requestPath = "".end($segments);
        return $requestPath;
    }

    private function handleNotFoundPageRequest() {
        header("HTTP/1.0 404 Not Found");
        echo "404 Page Not Found";
    }
}
