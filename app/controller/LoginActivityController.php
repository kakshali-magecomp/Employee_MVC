<?php

require_once __DIR__ . '/../model/Attendance.php';

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

        // if ($result === "already_punched_in")
        // {
        //     $_SESSION['message'] = "You already punched in today";
        //     $_SESSION['message_type'] = "error";
        //     header("Location: index.php?page=empdashboard");
        //     exit;
        // }

        // $_SESSION['message'] = "Punch In Successful";
        // $_SESSION['message_type'] = "success";

        // header("Location: index.php?page=empdashboard");
        // exit;
    }
}