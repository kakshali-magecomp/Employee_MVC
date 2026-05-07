<?php

require_once __DIR__ . '/../model/Employeelogin.php';

class DashboardController {

    public function dashboardView(): void
    {
        $Employeelogin = new Employeelogin();
        $employee = $Employeelogin->getEmployee();
        require __DIR__ . '/../view/admin/dashboard.php';
    }
    
}
