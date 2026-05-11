<?php

class LoginActivityModel
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

    public function storeLogin($employeeId, $ipAddress, $deviceInfo)
    {
        $sql = "INSERT INTO login_activity (employee_id, ip_address, device_info) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $employeeId, $ipAddress, $deviceInfo);
        $stmt->execute();
    }
}
