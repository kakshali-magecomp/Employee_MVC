<?php

require_once __DIR__ . '/../model/Attendance.php';

class AdminAttendanceController
{
    public function index()
    {
        $attendanceModel = new Attendance();
        $attendanceData = $attendanceModel->getAllAttendancebtn();
        require __DIR__ . '/../view/admin/Attendance.php';
    }
    public function delete()
    {
         if (!isset($_SESSION['deleteattendance']))
        {
            header("Location: index.php?page=dashboard");
            exit;
        }

        $employeeId = $_SESSION['deleteattendance']['id'];
        $attendanceModel = new Attendance();
        $result = $attendanceModel->deleteAttendance($employeeId);
        require __DIR__ . '/../view/admin/dashboard.php';
    }
}