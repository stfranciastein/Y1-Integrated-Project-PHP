<?php
require_once 'db.php';

class User {

    public $id;
    public $username;
    public $email;
    public $site_admin;
    public $profilepic_url;
    public $pass_word;

    public function __construct($props = null) {
        if ($props != null) {
            if (array_key_exists("id", $props)) {
                $this->id = $props["id"];
            }
            $this->username = $props["username"];
            $this->email  = $props["email"];
            $this->site_admin = $props["site_admin"];
            $this->profilepic_url = $props["profilepic_url"];
            $this->pass_word = $props["pass_word"];
        }
    }

    public function save() {
        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();
            $hash_word = password_hash($this->pass_word, PASSWORD_DEFAULT);
        
            $params = [
                ":username" => $this->username,
                ":email" => $this->email,
                ":site_admin" => $this->site_admin,
                ":profilepic_url" => $this->profilepic_url,
                ":pass_word" => $hash_word,
            ];
    
            if ($this->id === null) {
                $sql = "INSERT INTO users (username, email, site_admin, profilepic_url, pass_word) VALUES (:username, :email, :site_admin, :profilepic_url, :pass_word)";
            } else {
                $sql = "UPDATE users SET " .
                    "username = :username, " .
                    "email = :email, " .
                    "site_admin = :site_admin, " .
                    "profilepic_url = :profilepic_url, " .
                    "pass_word = :pass_word " .
                    "WHERE id = :id";
    
                $params[":id"] = $this->id;
            }
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);
        
            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = " . $error_info[0] . "; error message = " . $error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }
        
            if ($stmt->rowCount() !== 1) {
                throw new Exception("Failed to save user.");
            }
        
            if ($this->id === null) {
                $this->id = $conn->lastInsertId();
            }
        } finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    }
    

    public function delete() {
        $db = null;
        try {
            if ($this->id !== null) {
                $db = new DB();
                $db->open();
                $conn = $db->getConnection();
        
                $sql = "DELETE FROM users WHERE id = :id" ;
                $params = [
                    ":id" => $this->id
                ];
                $stmt = $conn->prepare($sql);
                $status = $stmt->execute($params);
        
                if (!$status) {
                    $error_info = $stmt->errorInfo();
                    $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                    throw new Exception("Database error executing database query: " . $message);
                }
        
                if ($stmt->rowCount() !== 1) {
                    throw new Exception("Failed to delete user.");
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    }

    public static function findAll() {
        $users = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM users";
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $user = new User($row);
                    $users[] = $user;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $users;
    }

    public static function findById($id) {
        $user = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM users WHERE id = :id";
            $params = [
                ":id" => $id
            ];
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user = new User($row);
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $user;
    }

    public static function findByUsername($username) {
        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();
    
            $sql = "SELECT * FROM users WHERE username = :username";
            $params = [
                ":username" => $username
            ];
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);
    
            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }
    
            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return new User($row);
            }
            return null; // Return null if no user found with the given username
        } finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    }
    
}
?>