<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../app/controller/EmployeeController.php";

$auth = new EmployeeController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth->register();
} else {
    $auth->registerView();
}