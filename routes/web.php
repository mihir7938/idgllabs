<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::group(['prefix' => 'password'], function () {
    Route::get('/forget', [AuthController::class, 'forgetPassword'])->name('forget_password');
    Route::post('/reset', [AuthController::class, 'resetPassword'])->name('check_password_reset');
    Route::get('/reset/{token}', [AuthController::class, 'getChangePassword'])->name('reset_password_link');
    Route::post('/reset/new/{token}', [AuthController::class, 'postChangePassword'])->name('change_password');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/clients', [PageController::class, 'clients'])->name('clients');
    Route::get('/clients/add', [PageController::class, 'addClient'])->name('clients.add');
    Route::post('/clients/save', [PageController::class, 'saveClient'])->name('clients.add.save');
    Route::get('/clients/edit/{id}', [PageController::class, 'editClient'])->name('clients.edit');
    Route::post('/clients/update', [PageController::class, 'updateClient'])->name('clients.update.save');
    Route::post('/fetch-client-details', [PageController::class, 'fetchDetailsByCompany'])->name('clients.details.fetch');
    Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');
    Route::get('/certificates/export/csv', [PageController::class, 'exportCertificatesCsv'])->name('certificates.export.csv');
    Route::get('/certificates/export/excel', [PageController::class, 'exportCertificatesExcel'])->name('certificates.export.excel');
    Route::get('/certificates/add', [PageController::class, 'addCertificate'])->name('certificates.add');
    Route::post('/certificates/save', [PageController::class, 'saveCertificate'])->name('certificates.add.save');
    Route::get('/certificates/edit/{id}', [PageController::class, 'editCertificate'])->name('certificates.edit');
    Route::post('/certificates/update', [PageController::class, 'updateCertificate'])->name('certificates.update.save');
    Route::get('/certificates/print', [PageController::class, 'printCertificate'])->name('certificates.print');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/shapes', [AdminController::class, 'shapes'])->name('admin.shapes');
    Route::get('/shapes/add', [AdminController::class, 'addShape'])->name('admin.shapes.add');
    Route::post('/shapes/save', [AdminController::class, 'saveShape'])->name('admin.shapes.add.save');
    Route::get('/shapes/edit/{id}', [AdminController::class, 'editShape'])->name('admin.shapes.edit');
    Route::post('/shapes/update', [AdminController::class, 'updateShape'])->name('admin.shapes.update.save');
    Route::get('/shapes/delete/{id}', [AdminController::class, 'deleteShape'])->name('admin.shapes.delete');
    Route::get('/colors', [AdminController::class, 'colors'])->name('admin.colors');
    Route::get('/colors/add', [AdminController::class, 'addColor'])->name('admin.colors.add');
    Route::post('/colors/save', [AdminController::class, 'saveColor'])->name('admin.colors.add.save');
    Route::get('/colors/edit/{id}', [AdminController::class, 'editColor'])->name('admin.colors.edit');
    Route::post('/colors/update', [AdminController::class, 'updateColor'])->name('admin.colors.update.save');
    Route::get('/colors/delete/{id}', [AdminController::class, 'deleteColor'])->name('admin.colors.delete');
    Route::get('/clarities', [AdminController::class, 'clarities'])->name('admin.clarities');
    Route::get('/clarities/add', [AdminController::class, 'addClarity'])->name('admin.clarities.add');
    Route::post('/clarities/save', [AdminController::class, 'saveClarity'])->name('admin.clarities.add.save');
    Route::get('/clarities/edit/{id}', [AdminController::class, 'editClarity'])->name('admin.clarities.edit');
    Route::post('/clarities/update', [AdminController::class, 'updateClarity'])->name('admin.clarities.update.save');
    Route::get('/clarities/delete/{id}', [AdminController::class, 'deleteClarity'])->name('admin.clarities.delete');
    Route::get('/users', [AdminController::class, 'getUsers'])->name('admin.users');
    Route::get('/users/add', [AdminController::class, 'addUser'])->name('admin.users.add');
    Route::post('/users/save', [AdminController::class, 'saveUser'])->name('admin.users.add.save');
    Route::get('/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/users/update', [AdminController::class, 'updateUser'])->name('admin.users.update.save');
    Route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/users/change/{id}', [AdminController::class, 'changePassword'])->name('admin.users.change');
    Route::post('/users/change-password', [AdminController::class, 'updateChangePassword'])->name('admin.users.password.change');
});

Route::group(['prefix' => 'users', 'middleware' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
});