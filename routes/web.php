<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\RoleController;


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

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class,'destroy']);


Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);

Route::get('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class, 'addPermissionToRole']);

Route::put('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class, 'givePermissionToRole']);


Route::resource('users',App\Http\Controllers\AdminUserController::class);


























Route::get('/', function () {
    return view('welcome');
});
Route::resource('/student',StudentController::class);

Route::get('Register', [AuthController::class, 'showRegisterForm'])->name('Register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('Login', [AuthController::class, 'showLoginForm'])->name('Login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('Dashboard', [DashboardController::class, 'showDashboard'])->name('Dashboard');

Route ::get ('/index', [UserController::class, 'index'])->name('index');

Route::get('index', [StudentController::class, 'index'])->name('students.index');
Route::get('create', [StudentController::class, 'create'])->name('students.create');
Route::post('student', [StudentController::class, 'store'])->name('students.store');
Route::get('student/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('student/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('student/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [AboutController::class, 'index'])->name('about');


Route::get('/service', [ServicesController::class, 'index'])->name('service');

Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact_us');






