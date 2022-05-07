<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('/employee',function(Request $request) {
        $emp = [
            [
                "name" => "Emp",
                "email" => "ss@gmail.com",
                "phone" => "09888888",
            ],
            [
                "name" => "Emp",
                "email" => "ss@gmail.com",
                "phone" => "09888888",
            ],
            [
                "name" => "Emp",
                "email" => "ss@gmail.com",
                "phone" => "09888888",
            ],
            [
                "name" => "Emp",
                "email" => "ss@gmail.com",
                "phone" => "09888888",
            ],
        ];
        return response()->json([
            'status'=> "OK",
            'employee'=> $emp
        ]);
    });
    Route::get('/employee/{id}',function(Request $request,$id) {
        $emp = [
                "id" => $id,
                "name" => "Emp",
                "email" => "ss@gmail.com",
                "phone" => "09888888",
        ];
        return response()->json([
            'status'=> "OK",
            'employee'=> $emp
        ]);
    });
    Route::post('/employee-register',function(Request $request) {

        $emp = [
                "name" => $request->name,
                "email" => $request->email,
        ];
        return response()->json([
            'status'=> "OK",
            'employee'=> $emp
        ]);
    });
});