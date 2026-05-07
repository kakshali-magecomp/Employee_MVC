<?php

require_once __DIR__ . '/../model/Employeelogin.php';

class EmployeeController {

    public function registerView(): void
    {
        require __DIR__ . '/../view/employee/Register.php';
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once __DIR__ . '/../view/employee/Register.php';
            exit();
        }
        $name     = trim($_POST['name'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $mobile   = trim($_POST['mobile'] ?? '');
        $role     = trim($_POST['role'] ?? '');
        $status   = trim($_POST['status'] ?? '');

        $profile_image = $_FILES['profile_image']['name'] ?? '';

        if (!$name || !$email || !$password || !$mobile || !$profile_image || !$role || !$status) {
            echo "<script>alert('All fields are required');</script>";
            exit();
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $Employeelogin = new Employeelogin();
        $success = $Employeelogin->register($name, $email, $hashed, $mobile, $profile_image, $role, $status);

        if ($success) {
            echo "<script>alert('Registration Successfully.');</script>";
            header("Location: /EMPLOYEE_M_SYSTEM/public/?page=dashboard");
            exit();

        } else {
            echo "<script>alert('Registration failed. Try again.');</script>";
            header("Location: /EMPLOYEE_M_SYSTEM/public/?page=register");
            exit();
        }
    }
    public function LoginView(): void
    {
        require __DIR__ . '/../view/employee/Login.php';
    }

    public function Login(): void
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once __DIR__ . '/../view/employee/Login.php';
            exit();
        }

        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (!$email || !$password) {
            echo "<script>alert('Email and Password Required');</script>";
            exit();
        }

        // $hashed = password_hash($password, PASSWORD_DEFAULT);
        $Employeelogin = new Employeelogin();
        // $success = $Employeelogin->login($Employee_id);  
        $user = $Employeelogin->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user;
            echo "<script>alert('Login Successfully');</script>";
            header("Location: /EMPLOYEE_M_SYSTEM/public/?page=dashboard");
            exit();

        } else {

            echo "<script>alert('Invalid email or password');</script>";
            header("Location: /EMPLOYEE_M_SYSTEM/public/?page=login");
            exit();
        }
    }
    
}