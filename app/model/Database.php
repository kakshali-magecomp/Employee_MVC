<?php

class Database
{
    private $host = "localhost";
    private $user = "magecomp";
    private $pass = "Admin@123";
    private $dbname = "Employee_m_system";

    public $conn;

    public function connect()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        if ($this->conn->connect_error) {
            die("Database Connection Failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}