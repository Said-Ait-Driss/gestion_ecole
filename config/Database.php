<?php
require_once __DIR__ . '/../helpers/getenv.php';

class DatabaseConnection {
    private static $instance;
    private $connection;
    private $host;
    private $dbname;
    private $username;
    private $password;

    
    public function __construct() {
        $this->host = env("DB_HOST");
        $this->dbname = env("DB_NAME");
        $this->username = env("DB_USERNAME");
        $this->password = env("DB_PASSWORD");
    }

    public function initConnection(){
        
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
        try {
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }
    
    public static function getInstance($host, $dbname, $username, $password) {
        if (!isset(self::$instance)) {
            self::$instance = new self($host, $dbname, $username, $password);
        }
        
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }

    //

    public function query($sql, $params = []) {
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalRecords($sql){
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchColumn();
    }
}



?>