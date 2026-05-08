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
        $id = $_GET['id'] ?? null;
        if (!$id)
        {
            die("Invalid Attendance ID");
        }
        $attendanceModel = new Attendance();
        $attendance = $attendanceModel->deleteAttendance($id);
        require __DIR__ . '/../view/admin/dashboard.php';
    }
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id)
        {
            die("Invalid Attendance ID");
        }
        $attendanceModel = new Attendance();
        $attendance = $attendanceModel->getAttendanceById($id);
        // $updateattendance = $attendance ->updateAttendance($id);
        require __DIR__ . '/../view/admin/editemployee.php';
    
    //     if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    //     {
    //         require __DIR__ . '/../view/admin/dashboard.php';
    //         exit();
    //     }
    //     $id = trim($_POST['id'] ?? '');
    //     $full_name = trim($_POST['full_name'] ?? '');
    //     $attendance_date = trim($_POST['attendance_date'] ?? '');
    //     $punch_in = trim($_POST['punch_in'] ?? '');
    //     $punch_out = trim($_POST['punch_out'] ?? '');
    //     $working_hours = trim($_POST['working_hours'] ?? '');
    //     $late_time = trim($_POST['late_time'] ?? '');
    //     $status = trim($_POST['status'] ?? '');
    
    //     $attendanceModel = new Attendance();
    //     $attendance = $attendanceModel->getAttendanceById($id);

    //     if($attendance)
    //     {
    //         $_SESSION['admin'] = $attendance;
    //         echo "<script>alert('Employee Record Edit Successful');</script>";
    //         header("Refresh:1; url=index.php?page=dashboard");
    //         exit(); 
    //     }

    //     $updateattendance = $attendance->updateAttendance($id, $full_name, $attendance_date, $punch_in, $punch_out, $working_hours, $late_time, $status);
    //     echo "<script>alert('Invalid');</script>";
    //     header("Refresh:1; url=index.php?page=editemployee");
    //     exit();
    
     }
}