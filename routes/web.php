<?php

use App\Http\Controllers\Dashboard\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\TaskController;


Route::group(['middleware' => 'guest'], function () {
    Route::view('login', 'dashboard.auth.login')->name('login');
    Route::post('/login', [AuthController::class,'login'])->name('singIn');
});
Route::get('/department-managers',[DepartmentController::class,'departmentManagers'])->name('department.managers');
Route::get('/task-users',[TaskController::class,'taskUsers'])->name('task.users');
Route::get('/user-departments',[UserController::class,'userDepartments'])->name('user.departments');


Route::group(['middleware' => 'auth','as'=>'dashboard.'], function () {
    Route::delete('/logout', [AuthController::class,'logout'])->name('logout');
    Route::view('/','dashboard.home')->name('home');
    Route::resource('users',UserController::class);
    Route::resource('departments',DepartmentController::class);
    Route::resource('tasks',TaskController::class);
});
