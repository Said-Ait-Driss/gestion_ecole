<?php


class Response {
    private $statusCode;
    private $headers;
    private $content;

    public function __construct() {
        $this->statusCode = 200;
        $this->headers = [];
        $this->content = '';
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    public function setHeader($name, $value) {
        $this->headers[$name] = $value;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function renderView($view, $data = []) {
        // Extract the data to variables
        $viewFilePath  = __DIR__ ."/../views/$view";

        $data['page'] = $viewFilePath ;

        extract($data);
        // Start output buffering
        ob_start();

        // Include the view file
        include __DIR__ ."/../views/layout.php";

        // Get the content from the output buffer
        $this->content = ob_get_clean();
    }
    

    public function send() {
        // Set the HTTP status code
        http_response_code($this->statusCode);

        // Set the headers
        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }

        // Output the content
        echo $this->content;
    }
}

?>