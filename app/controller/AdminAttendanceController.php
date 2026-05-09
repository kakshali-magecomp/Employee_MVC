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
        if($attendance){
            echo "<script>alert('Record Deleted');</script>";
            header("Refresh:1; url=index.php?page=dashboard");
            exit();
        }
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
        require __DIR__ . '/../view/admin/editemployee.php';  
     }

     public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            header("Location: index.php?page=editemployee");
            exit();
        }    

        $id = trim($_POST['id'] ?? '');
        $employee_id = trim($_POST['employee_id'] ?? '');
        $attendance_date = trim($_POST['attendance_date'] ?? '');
        $punch_in = trim($_POST['punch_in'] ?? '');
        $punch_out = trim($_POST['punch_out'] ?? '');
        $working_hours = trim($_POST['working_hours'] ?? '');
        $late_time = trim($_POST['late_time'] ?? '');
        $status = trim($_POST['status'] ?? '');
        if ( empty($id) || empty($attendance_date) || empty($status))
        {
            echo "<script>alert('Required Fields Missing');</script>";
            header("Refresh:1; url=index.php?page=editemployee");
            exit();
        }
        $attendanceModel = new Attendance();
        $update = $attendanceModel->updateAttendance($id, $employee_id, $attendance_date, $punch_in, $punch_out, $working_hours, $late_time, $status);
        if ($update)
        {
            echo "<script>alert('Attendance Updated Successfully');</script>";
            header("Refresh:1; url=index.php?page=dashboard");
            exit();
        }
        echo "<script>alert('Update Failed');</script>";
        header("Refresh:1; url=index.php?page=editemployee");
        exit();
    
    }
}