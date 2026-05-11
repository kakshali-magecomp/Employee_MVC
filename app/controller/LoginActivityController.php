<?php

require_once __DIR__ . '/../model/Attendance.php';
require_once __DIR__ . '/../model/LoginActivityModel.php';


class LoginActivityController
{
    public function Login()
    {
        if (!isset($_SESSION['employee']))
        {
            header("Location: index.php?page=login");
            exit;
        }

        $employeeId = $_SESSION['employee']['id'];
        $attendanceModel = new Attendance();
        $result = $attendanceModel->Login($employeeId);
    }
}