<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\admin\AdminsController;


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


Route::prefix('/admin')->group(function(){
    Route::match(['get', 'post'], '/login', [AdminsController::Class, 'login']);
    
    Route::group(['middleware'=>['admin']], function(){
         Route::get('/dashboard', [AdminsController::Class, 'dashboard']);
         Route::match(['get', 'post'], '/update-password', [AdminsController::Class, 'updatePassword']);
         Route::match(['get', 'post'], '/update-details', [AdminsController::Class, 'updateDetails']);
         Route::post('/check-current-password', [AdminsController::Class, 'checkCurrentPassword']);
         Route::get('/logout', [AdminsController::Class, 'logout']);
         
         //Content Management Pages Routes
         Route::get('/cms-page', [CmsController::class, 'index']);
         Route::post('/status-update', [CmsController::class, 'update']);
         Route::match(['get', 'post'], '/edit-cms-page/{id?}', [CmsController::Class, 'edit']);
         Route::get('/delete-cms-page/{id}', [CmsController::class, 'destroy']);
         
         //  Subadmins Module Routes
         Route::get("/subadmins", [AdminsController::class, "viewSubadmin"]);
         Route::match(['get', 'post'], '/edit-sub-admin/{id?}', [AdminsController::class, 'AddEditSubAdmin']);
         Route::get('/delete-sub-admin/{id}', [AdminsController::class, 'deleteSubAdmin']);
         Route::post('/update-status', [AdminsController::class, 'updateStatus']);
         Route::match(['get','post'], "/update_role/{id}", [AdminsController::class, "updateRole"]);
    });
});