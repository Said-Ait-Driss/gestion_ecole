<?php
// Request.php

class Request {
    private $method;
    private $uri;
    private $queryParams;
    private $bodyParams;
    private $headers;

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->queryParams = $_GET;
        $this->bodyParams = $_POST;
        $this->headers = $this->getHeaders();
    }

    public function getMethod() {
        return $this->method;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getQueryParam($name, $default = 1) {
        return isset($this->queryParams[$name]) ? $this->queryParams[$name] : $default;
    }

    public function getBodyParam($name, $default = null) {
        return isset($this->bodyParams[$name]) ? $this->bodyParams[$name] : $default;
    }

    public function getBodyParams($default = null) {
        return isset($this->bodyParams) ? $this->bodyParams: $default;
    }


    public function getHeader($name) {
        return isset($this->headers[$name]) ? $this->headers[$name] : null;
    }

    private function getHeaders() {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) === 'HTTP_') {
                $name = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5))))); // Convert underscore-separated words to hyphen-separated words
                $headers[$name] = $value;
            }
        }
        return $headers;
    }
}

