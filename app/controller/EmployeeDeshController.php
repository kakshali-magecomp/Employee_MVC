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
        $id = $sessionEmployee['id'] ?? null;

        if (!$id)
        {
            die("Employee email not found in session");
        }

        $employeeModel = new Employeelogin();
        $employee = $employeeModel->getemployeeById($id);

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
    public function editemployee()
    {
        $id = $_GET['id'] ?? null;
        if (!$id)
        {
            die("Invalid Employee ID");
        }
        $employeeModel = new  Employeelogin();
        $employee = $employeeModel->getemployeeById($id);
        require __DIR__ . '/../view/employee/editprofile.php'; 
    }

    public function updateemployee()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            header("Location: index.php?page=editprofile");
            exit();
        }    

        $id = trim($_POST['id'] ?? '');
        $full_name = trim($_POST['full_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $mobile = trim($_POST['mobile'] ?? '');
        $role = trim($_POST['role'] ?? '');
        $profile_image = "";

        if (!empty($_FILES['profile_image']['name']))
        {
            $profile_image = time() . '_' . $_FILES['profile_image']['name'];
            move_uploaded_file( $_FILES['profile_image']['temp_name'], 
            __DIR__ . '../public/uploads/'.$profile_image);
        }

        if ( empty($id) || empty($full_name) || empty($email) || empty($password) || empty($mobile) || empty($role) )
        {
            echo "<script>alert('Required Fields Missing');</script>";
            header("Refresh:1; url=index.php?page=editprofile");
            exit();
        }

        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $employee = new Employeelogin();
        $update = $employee->updateemployee($id, $full_name, $email, $hashedPassword, $mobile, $profile_image, $role);
        if ($update)
        {
            echo "<script>alert('Profile Updated Successfully');</script>";
            header("Refresh:1; url=index.php?page=empdashboard");
            exit();
        }
        echo "<script>alert('Update Failed');</script>";
        header("Refresh:1; url=index.php?page=editprofile");
        exit();
    
    }
}
?>