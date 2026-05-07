<?php
require_once __DIR__ . '/../model/Employeelogin.php';

class EmployeeDeshController {

     public function dashboardView(): void
    {
        $Employeelogin = new Employeelogin();
        $employee = $Employeelogin->getEmployeeByEmail();
        require __DIR__ . '/../view/employee/dashboard.php';
    }
}