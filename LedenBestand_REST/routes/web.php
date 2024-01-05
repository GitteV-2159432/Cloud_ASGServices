<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\soapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('leden',[MemberController::class,"index"]);
Route::get('/voegToe', [MemberController::class, "create"]);
Route::post('/toegevoegdLid', [MemberController::class, "store"]);

Route::get('/ws', function () {
    return redirect('http://localhost:3000');
});




use App\Http\Controllers\AttendanceController;
Route::get('/soap', [AttendanceController::class, "index"]);
Route::get('/soapMember',[AttendanceController::class, "memberForm"] );
Route::get('/soapActivity', [AttendanceController::class, "activityForm"]);
Route::get('/soapAddActivity', [AttendanceController::class, "addActivityForm"]);
Route::post('/get-member', [AttendanceController::class, "showMember"]);
Route::post('/get-activity', [AttendanceController::class, "showActivity"]);
Route::post('/add-activity', [AttendanceController::class, "NewActivity"]);


use App\Http\Controllers\WeatherController;
Route::get('/grpc', [WeatherController::class, "weatherform"]);
Route::post('/weather', [WeatherController::class, "getWeather"]);


Route::get('/{id}', [MemberController::class, "show"]);

