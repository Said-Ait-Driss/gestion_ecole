<?php

class User {
    private $id;
    private $name;
    private $email;
    
    public function __construct($id, $name, $email, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    // Retrieve a user by ID
    public static function getById($id) {
        // Code to query the database and retrieve a user by ID
        // Example implementation using PDO:
        $db = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
        $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new User($row['id'], $row['name'], $row['email']);
        } else {
            return null;
        }
    }

    // Save the user changes to the database
    public function save() {
        // Code to save the user data to the database
        // Example implementation using PDO:
        $db = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
        $stmt = $db->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }
}


?>