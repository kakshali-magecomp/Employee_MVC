<?php

require_once __DIR__ . '/../model/Database.php';

class Employeelogin  
{
    private $conn;

    public function __construct()
    {
        $db = new Database(); 
        $this->conn = $db->connect();

        if (!$this->conn) {
            die("Database connection failed");
        }
    }

    public function register($name, $email, $hashed, $mobile, $profile_image, $role, $status)
    {
        $sql = "INSERT INTO Employee (full_name, email, password, mobile, profile_image, role, status) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("sssssss",$name, $email, $hashed, $mobile, $profile_image, $role, $status);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }
}