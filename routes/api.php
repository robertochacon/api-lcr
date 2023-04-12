<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntitysController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\DeliverysController;
use App\Http\Controllers\ShipmentsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::post('/register/', [AuthController::class, 'register']);
Route::post('/login/', [AuthController::class, 'login']);
Route::post('/refresh/', [AuthController::class, 'refresh']);

//home
Route::get('/home/', [HomeController::class, 'index']);
Route::get('/home/entity/{entity}', [HomeController::class, 'all']);

//entitys
Route::get('/entities/', [EntitysController::class, 'index']);
Route::get('/entities/{id}/', [EntitysController::class, 'watch']);
Route::post('/entities/', [EntitysController::class, 'register']);
Route::post('/entities/update/{id}/', [EntitysController::class, 'update']);
Route::post('/entities/delete/{id}/', [EntitysController::class, 'delete']);

//documents
Route::get('/documents/', [DocumentsController::class, 'index']);
Route::get('/documents/entity/{entity}', [DocumentsController::class, 'all']);
Route::get('/documents/{identification}/', [DocumentsController::class, 'watch']);
Route::post('/documents/', [DocumentsController::class, 'register']);
Route::post('/documents/update/{id}/', [DocumentsController::class, 'update']);
Route::post('/documents/delete/{id}/', [DocumentsController::class, 'delete']);

//deliverys
Route::get('/deliverys/', [DeliverysController::class, 'index']);
Route::get('/deliverys/entity/{entity}', [DeliverysController::class, 'all']);
Route::get('/deliverys/{identification}/', [DeliverysController::class, 'watch']);
Route::post('/deliverys/', [DeliverysController::class, 'register']);
Route::post('/deliverys/update/{id}/', [DeliverysController::class, 'update']);
Route::post('/deliverys/delete/{id}/', [DeliverysController::class, 'delete']);

//shipments
Route::get('/shipments/', [ShipmentsController::class, 'index']);
Route::get('/shipments/entity/{entity}', [ShipmentsController::class, 'all']);
Route::get('/shipments/{identification}/', [ShipmentsController::class, 'watch']);
Route::post('/shipments/', [ShipmentsController::class, 'register']);
Route::post('/shipments/update/{id}/', [ShipmentsController::class, 'update']);
Route::post('/shipments/delete/{id}/', [ShipmentsController::class, 'delete']);
Route::get('/shipments/assign_messenger/{id}/{delivery}', [ShipmentsController::class, 'assignMessenger']);
Route::get('/shipments/status/{id}/{status}', [ShipmentsController::class, 'statusShipment']);

//users
Route::get('/profile', [UserController::class, 'userProfile']);
Route::post('/users', [UserController::class, 'register']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/update/{id}/', [UserController::class, 'update']);
Route::post('/users/delete/{id}/', [UserController::class, 'delete']);
Route::post('/users/reset_password/{id}/', [UserController::class, 'reset_password']);