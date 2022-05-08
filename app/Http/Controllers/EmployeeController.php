<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\EmployeeInterface;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EmployeeValidationRequest;
use App\Http\Requests\EmployeeValidationUpdate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
class EmployeeController extends Controller
{
    public $employeeRepo;
    public function __construct(EmployeeInterface $EmployeeRepo)
    {
        $this->employeeRepo   = $EmployeeRepo;
    }

    public function register(Request $request)
    {
        $result = $this->employeeRepo->EmployeeRegister($request);
        return $result;
    }

    public function update(EmployeeValidationUpdate $request)
    {
        $result = $this->employeeRepo->EmployeeUpdate($request);
        return $result;
    }

    public function delete($id)
    {
        $result = $this->employeeRepo->EmployeeDelete($id);
        return $result;
    }

    public function detail($id)
    {
        $result = $this->employeeRepo->EmployeeDetail($id);
        return $result;
    }
    public function employeeList()
    {
        $result = $this->employeeRepo->EmployeeInfo();
        return $result;
    }
}
