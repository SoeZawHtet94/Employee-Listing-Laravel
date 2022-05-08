<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EmployeeInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\Employee;

class EmployeeRepository implements EmployeeInterface 
{

    public function EmployeeRegister($employeeData){
        $message = "";
        # check email is already exist
        $checkEmail = DB::table('employees')->where('email', $employeeData['email'])->first();
        if(empty($checkEmail)){
            try{
                Employee::insert([
                    "name"              => $employeeData['name'],
                    "email"             => $employeeData['email'],
                    "date_of_birth"     => $employeeData['dateofbirth'],
                    "phone_no"          => $employeeData['phno'],
                    "nrc_no"            => $employeeData['nrcno'],
                    "address"           => $employeeData['address'],
                    "gender"            => $employeeData['gender'],
                    "maritual_status"   => $employeeData['maritualstatus'],
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now()
                    ]);
                $message = "Save successfully";
                return response()->json([
                    'status'=> "OK",
                    'message'=> $message
                ]);
                    
            }catch (Throwable $e) {
                Log::channel('debuglog')->debug($e->getMessage(). 'Fail to save data in emplyee table!');
                $message = "Fail to save!";
                // return $message;	
                return response()->json([
                    'status'=> "NG",
                    'message'=> $message
                ]);
            } 
        } else {
            $message = "Email is already exist!";
            return response()->json([
                'status'=> "NG",
                'message'=> $message
            ]);
        }
    }

    public function EmployeeUpdate($employeeData){
        $message = "";
        # check email is already exist
        $checkEmail = DB::table('employees')
                        ->where('id', $employeeData['id'])
                        ->where('email','<>', $employeeData['email'])
                        ->first();
        if(empty($checkEmail)){
            try{
                Employee::where('id',$employeeData['id'])
                    ->update([
                        'name'              => $employeeData['name'],
                        'email'             => $employeeData['email'],
                        "date_of_birth"     => $employeeData['dateofbirth'],
                        "phone_no"          => $employeeData['phno'],
                        "nrc_no"            => $employeeData['nrcno'],
                        "address"           => $employeeData['address'],
                        "gender"            => $employeeData['gender'],
                        "maritual_status"   => $employeeData['maritualstatus'],
                        'updated_at'        => Carbon::now()
                    ]);

                $message = "Update successfully";
                return $message;	
            }catch (Throwable $e) {
                Log::channel('debuglog')->debug($e->getMessage(). 'Fail to update data in emplyee table!');
                $message = "Fail to update!";
                return $message;	
            } 
        } else {
            $message = "Email is already exist!";
            return $message;
        }
    }

    public function EmployeeDelete($id){
        $message = "";
        # check email is already exist
        $checkEmail = DB::table('employees')
                        ->where('id', $id)
                        ->first();
        if(!empty($checkEmail)){
            try{
                Employee::where('id',$id)->delete();
                $message = "Delete successfully";
                return response()->json([
                    'status'=> "OK",
                    'message'=> $message
                ]);
            }catch (Throwable $e) {
                Log::channel('debuglog')->debug($e->getMessage(). 'Fail to update data in emplyee table!');
                $message = "Fail to update!";
                return response()->json([
                    'status'=> "NG",
                    'message'=> $message
                ]);	
            } 
        } else {
            $message = "This data is already delete!";
            return response()->json([
                'status'=> "NG",
                'message'=> $message
            ]);
        }
    }

    public function EmployeeInfo(){
        $message = "";
        # check email is already exist
        $empData = Employee::paginate(20);
        if(!empty($empData)){
            $totalEmployeeData = [];
                foreach($empData as $value){
                    $Data = [];
                    $Data['id'] = $value['id'];
                    $Data['name'] = $value['name'];
                    $Data['date_of_birth'] = $value['date_of_birth'];
                    $Data['email'] = $value['email'];
                    $Data['phone_no'] = $value['phone_no'];
                    $Data['nrc_no'] = $value['nrc_no'];
                    $Data['address'] = $value['address'];
                    $Data['gender'] = $value['gender'];
                    $Data['maritual_status'] = $value['maritual_status'];

                    array_push($totalEmployeeData,$Data);
                }
                return response()->json([
                    'status'=> "OK",
                    'employee'=> $totalEmployeeData
                ]);
        } else {
            $message = "Data is not found!";
            return response()->json([
                'status'=> "NG",
                'message'=> $message
            ]);
        }
    }

    public function EmployeeDetail($id){
        $message = "";
        # check email is already exist
        $empData = DB::table('employees')
                    ->where('id', $id)
                    ->first();
        if(!empty($empData)){
            $EmployeeData = [];

            $EmployeeData['id'] = $empData->id;
            $EmployeeData['name'] = $empData->name;
            $EmployeeData['date_of_birth'] = $empData->date_of_birth;
            $EmployeeData['email'] = $empData->email;
            $EmployeeData['phone_no'] = $empData->phone_no;
            $EmployeeData['nrc_no'] = $empData->nrc_no;
            $EmployeeData['address'] = $empData->address;
            $EmployeeData['gender'] = $empData->gender;
            $EmployeeData['maritual_status'] = $empData->maritual_status;

            return response()->json([
                'status'=> "OK",
                'employee'=> $EmployeeData
            ]);
        } else {
            $message = "Data is not found!";
            return response()->json([
                'status'=> "NG",
                'message'=> $message
            ]);
        }
    }
}