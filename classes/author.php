<?php
require_once 'db.php';

class Author {

    public $id;
    public $first_name;
    public $last_name;
    public $dob;
    public $job_title;
    public $favourite_artist;
    public $bio;
    public $biopic;

    public function __construct($props = null) {
        if ($props != null) {
            if (array_key_exists("id", $props)) {
                $this->id = $props["id"];
            }
            $this->first_name = $props["first_name"];
            $this->last_name  = $props["last_name"];
            $this->dob = $props["dob"];
            $this->job_title = $props["job_title"];
            $this->favourite_artist = $props["favourite_artist"];
            $this->bio = $props["bio"];
            $this->biopic  = $props["biopic"];
        }
    }

    public function save() {
        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();
        
            $params = [
                ":first_name" => $this->first_name,
                ":last_name"  => $this->last_name,
                ":dob" => $this->dob,
                ":job_title" => $this->job_title,
                ":favourite_artist" => $this->favourite_artist,
                ":bio" => $this->bio,
                ":biopic" => $this->biopic
            ];

            if ($this->id === null) {
                $sql = "INSERT INTO authors (first_name, last_name, dob, job_title, favourite_artist, bio, biopic) VALUES (:first_name, :last_name, :dob, :job_title, :favourite_artist, :bio, :biopic)";
            }
            else {
                $sql = "UPDATE authors SET " .
                "first_name = :first_name, " .
                "last_name = :last_name, " . 
                "dob = :dob, " . 
                "job_title = :job_title, " . 
                "favourite_artist = :favourite_artist, " . 
                "bio = :bio, " . 
                "biopic = :biopic " .
                "WHERE id = :id" ;
         

                $params[":id"] = $this->id;
            }
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);
        
            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }
        
            if ($stmt->rowCount() !== 1) {
                throw new Exception("Failed to save author.");
            }
        
            if ($this->id === null) {
                $this->id = $conn->lastInsertId();
            }
        }
        finally {
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
        
                $sql = "DELETE FROM authors WHERE id = :id" ;
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
                    throw new Exception("Failed to delete author.");
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
        $authors = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM authors";
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
                    $author = new Author($row);
                    $authors[] = $author;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $authors;
    }

    public static function findById($id) {
        $author = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM authors WHERE id = :id";
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
                $author = new Author($row);
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $author;
    }
}
?>