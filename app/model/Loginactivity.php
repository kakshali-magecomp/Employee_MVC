<?php

require_once __DIR__ . '/Database.php';

class Loginactivity
{
    private $conn;

    public function __construct()
    {
        $db = new Database();

        $this->conn = $db->connect();

        if (!$this->conn)
        {
            die("Database Connection Failed");
        }
    }

    public function Login($employeeId)
    {
        $today = date('Y-m-d');
        $currentDateTime = date('H:i:s A');
        $status = "Present";
        $sql = "INSERT INTO login_activity (employee_id, login_time, logout_time, ip_address, device_info) VALUES (?, ?, ?, ?, ?,)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt)
        {
            die("Prepare Failed : " . $this->conn->error);
        }

        $stmt->bind_param("isss",$employeeId, $today, $currentDateTime, $status);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}