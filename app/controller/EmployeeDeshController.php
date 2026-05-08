<?php

require_once __DIR__ . '/../model/Employeelogin.php';
require_once __DIR__ . '/../model/Attendance.php';

class EmployeeDeshController
{
    public function dashboardView(): void
    {
        if (!isset($_SESSION['employee']))
        {
            header("Location: index.php?page=login");
            exit;
        }

        $sessionEmployee = $_SESSION['employee'];
        $email = $sessionEmployee['email'] ?? null;

        if (!$email)
        {
            die("Employee email not found in session");
        }

        $employeeModel = new Employeelogin();
        $employee = $employeeModel->getEmployeeByEmail($email);

        if (!$employee)
        {
            die("Employee not found");
        }

        $attendanceModel = new Attendance();
        $todayAttendance = $attendanceModel->getTodayAttendance($employee['id']);
        $attendanceHistory = $attendanceModel->getAttendanceHistory($employee['id']);
        $monthlySummary = $attendanceModel->getMonthlySummary($employee['id']);
        require __DIR__ . '/../view/employee/dashboard.php';
    }
}
?>