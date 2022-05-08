<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/user',function(Request $request) {
        return $request->user();
    });
    Route::get('/employee-list',[EmployeeController::class,'employeeList']);

    Route::get('/employee/{id}',[EmployeeController::class,'detail']);

    Route::post('/employee-register', [EmployeeController::class,'register']);

    Route::delete('employee-delete/{id}', 'EmployeeController@delete');
});