<?php 
namespace App\Repositories\Interfaces;

interface EmployeeInterface
{
    # register the employee data
    public function EmployeeRegister($employeeData);

    # update the employee data
    public function EmployeeUpdate($employeeData);

    # delete the employee data
    public function EmployeeDelete($id);

    # delete the employee data
    public function EmployeeInfo();

    # delete the employee data
    public function EmployeeDetail($id);


}