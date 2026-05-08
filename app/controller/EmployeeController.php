<?php

require_once __DIR__ . '/../model/Employeelogin.php';
require_once __DIR__ . '/../model/Loginactivity.php';

class EmployeeController
{
    public function registerView(): void
    {
        require __DIR__ . '/../view/employee/Register.php';
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            require __DIR__ . '/../view/employee/Register.php';

            exit();
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $mobile = trim($_POST['mobile'] ?? '');
        $role = trim($_POST['role'] ?? '');
        $status = trim($_POST['status'] ?? '');
        $profile_image = "";

        if (!empty($_FILES['profile_image']['name']))
        {
            $profile_image = time() . '_' . $_FILES['profile_image']['name'];
            move_uploaded_file( $_FILES['profile_image']['temp_name'], 
            __DIR__ . '../public/uploads/'.$profile_image);
        }

        if (!$name || !$email || !$password || !$mobile || !$role || !$status)
        {
            echo "<script>alert('All fields are required');</script>";
            header("Refresh:1; url=index.php?page=register");
            exit();
        }

        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $employeeModel = new Employeelogin();
        $empvalid = $employeeModel->findByEmail($email);

        if ($empvalid['email'])
        {
            $_SESSION['employee'] = $empvalid ;
            echo "<script>alert('Employee alredy exist');</script>";
            header("Refresh:1; url=index.php?page=register");
            exit();
        }

        $success = $employeeModel->register($name,$email,$hashedPassword,$mobile,$profile_image,$role,$status);
        if ($success)
        {
            echo "<script>alert('Registration Successful');</script>";
            header("Refresh:1; url=index.php?page=login");
            exit();
        }
        else
        {
            echo "<script>alert('Registration Failed');</script>";
            header("Refresh:1; url=index.php?page=register");
            exit();
        }
    }

    public function loginView(): void
    {
        require __DIR__ . '/../view/employee/Login.php';
    }
    public function login(): void
    {
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            require __DIR__ . '/../view/employee/Login.php';
            exit();
        }

        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (!$email || !$password)
        {
            echo "<script>alert('Email and Password Required');</script>";
            header("Refresh:1; url=index.php?page=login");
            exit();
        }

        $employeeModel = new Employeelogin();
        $user = $employeeModel->findByEmail($email);
        // $emp = $employeeModel -> insertEmployee($email);

        if (!$user)
        {
            echo "<script>alert('User Not Found');</script>";
            header("Refresh:1; url=index.php?page=login");
            exit();
        }

        if (!password_verify($password, $user['password']))
        {
            echo "<script>alert('Invalid Password');</script>";
            header("Refresh:1; url=index.php?page=login");
            exit();
        }

        if ($user['status'] !== 'active')
        {
            echo "<script>alert('Your Account Is Inactive');</script>";
            header("Refresh:1; url=index.php?page=login");
            exit();
        }

        if ($user['role'] === 'admin')
        {
            $_SESSION['admin'] = $user;
            echo "<script>alert('Admin Login Successful');</script>";
            header("Refresh:1; url=index.php?page=dashboard");
            exit();
        }

        if ($user['role'] === 'employee')
        {
            $_SESSION['employee'] = $user;
            echo "<script>alert('Employee Login Successful');</script>";
            header("Refresh:1; url=index.php?page=empdashboard");
            exit();
        }

        echo "<script>alert('Invalid Role');</script>";
        header("Refresh:1; url=index.php?page=login");
        exit();
    }
}