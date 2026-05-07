<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../app/controller/EmployeeController.php';
require_once __DIR__ . '/../app/controller/DashboardController.php';

$auth = new EmployeeController();
$dashboard = new DashboardController();

$page = $_GET['page'] ?? 'register';

switch ($page) {

    case 'register':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->register();
        } else {
            $auth->registerView();
        }

        break;

    case 'login':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->login();
        } else {
            $auth->loginView();
        }

        break;

    case 'dashboard':

        $dashboard->dashboardView();

        break;

    default:
        echo "404 Page Not Found";
}