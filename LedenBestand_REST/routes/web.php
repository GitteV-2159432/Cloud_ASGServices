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

Route::get('/leden',[MemberController::class,"index"]);
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

use App\Http\Controllers\FeestbegeleidingController;
Route::get('/people', [FeestbegeleidingController::class, "peopleView"]);
Route::get('/associations',[FeestbegeleidingController::class, "associationView"]);
Route::get('/events', [FeestbegeleidingController::class, "eventView"]);
Route::get('/addPerson', [FeestbegeleidingController::class, "personForm"]);
Route::post('/addedPerson', [FeestbegeleidingController::class, "createPerson"]);
Route::get('/addEvent', [FeestbegeleidingController::class, "eventForm"]);
Route::post('/addedEvent', [FeestbegeleidingController::class, "createEvent"]);
Route::get('/addAssociation', [FeestbegeleidingController::class, "associationForm"]);
Route::post('/addedAssociation', [FeestbegeleidingController::class, "createAssociation"]);
Route::post('/get-association', [FeestbegeleidingController::class, "showAssociation"]);
Route::post('/get-person', [FeestbegeleidingController::class, "showPerson"]);

use App\Http\Controllers\UpdatesController;
Route::get('/updates', [UpdatesController::class, "subscribe"]);
Route::get('/sendUpdate', [UpdatesController::class, "updateForm"]);
Route::post('/sendtoMQTT', [UpdatesController::class, "sendUpdate"]);

Route::get('/{id}', [MemberController::class, "show"]);

