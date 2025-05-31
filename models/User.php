<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $fullname;
    public $email;
    public $password;
    public $created_at;

    public function __construct($db = null) {
        if ($db) {
            $this->conn = $db;
        } else {
            $database = new Database();
            $this->conn = $database->getConnection();
        }
    }

    public function create($data = null) {
        // Use passed data or object properties
        if ($data) {
            $fullname = $data['name'] ?? $data['fullname'];
            $email = $data['email'];
            $password = $data['password'];
            $phone = $data['phone'] ?? null;
            $location = $data['location'] ?? null;
        } else {
            $fullname = $this->fullname;
            $email = $this->email;
            $password = $this->password;
            $phone = null;
            $location = null;
        }

        $query = "INSERT INTO " . $this->table_name . "
                (name, email, password, phone, location, created_at)
                VALUES
                (:fullname, :email, :password, :phone, :location, :created_at)";

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $fullname = htmlspecialchars(strip_tags($fullname));
        $email = htmlspecialchars(strip_tags($email));
        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $created_at = date('Y-m-d H:i:s');

        // Bind values
        $stmt->bindParam(":fullname", $fullname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":location", $location);
        $stmt->bindParam(":created_at", $created_at);

        if($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function getByEmail($email) {
        $query = "SELECT id, name, email, password, phone, location
                FROM " . $this->table_name . "
                WHERE email = ?
                LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }
        return false;
    }

    public function emailExists() {
        $query = "SELECT id, name, password
                FROM " . $this->table_name . "
                WHERE email = ?
                LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function updateResetToken($userId, $token, $expires) {
        $query = "UPDATE " . $this->table_name . " 
                SET reset_token = :token, reset_token_expires = :expires 
                WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":expires", $expires);
        $stmt->bindParam(":id", $userId);
        
        return $stmt->execute();
    }

    public function getByResetToken($token) {
        $query = "SELECT * FROM " . $this->table_name . " 
                WHERE reset_token = :token";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":token", $token);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    public function updatePassword($userId, $password) {
        $query = "UPDATE " . $this->table_name . " 
                SET password = :password, reset_token = NULL, reset_token_expires = NULL 
                WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":id", $userId);
        
        return $stmt->execute();
    }
}
?>