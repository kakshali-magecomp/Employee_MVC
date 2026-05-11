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
    public function findByEmail($email)
    {
        $sql = "SELECT * FROM Employee WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt) die("Prepare failed: " . $this->conn->error);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $person = $result->fetch_assoc();
        $stmt->close();
        return $person;
    }
    
    public function getEmployee()
    {
        $sql = "SELECT * FROM Employee";
        $result = $this->conn->query($sql);
        $employee = [];

        while ($row = $result->fetch_assoc()) {
            $employee[] = $row;
        }
        return $employee;
    }
    
    public function getEmployeeByEmail($email)
    {
        $sql = "SELECT * FROM Employee WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt) die("Prepare failed: " . $this->conn->error);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $person = $result->fetch_assoc();
        $stmt->close();
        return $person;

    }

    public function getemployeeById($id)
    {
        $sql = "SELECT * FROM Employee WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt) die("Prepare failed: " . $this->conn->error);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $employee = $result->fetch_assoc();
        $stmt->close();
        return $employee;

    }

    public function updateemployee($id, $full_name, $email, $hashedPassword, $mobile, $profile_image, $role, $status)
    {
        $sql = "UPDATE Employee SET full_name = ?, email = ?, password = ?, mobile = ?, profile_image = ?, role = ?, status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt)
        {
            die("Prepare Failed : " . $this->conn->error);
        }
        $stmt->bind_param("sssssssi", $full_name, $email, $hashedPassword, $mobile, $profile_image, $role, $status, $id);
        $employee = $stmt->execute();
        if (!$employee)
        {
            die("Execute Failed : " . $stmt->error);
        }
        $stmt->close();
        return $employee;
    }
}