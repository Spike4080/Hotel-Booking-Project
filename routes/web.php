<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\MustBeAdminUser;
use App\Http\Middleware\MustBeGuestUser;
use App\Http\Middleware\MustBeLoginUser;
use Illuminate\Support\Facades\Route;

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



Route::middleware(MustBeLoginUser::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/logout', [LogoutController::class, 'destory']);

    Route::get('/users/user/profile', [UserController::class, 'index']);
    Route::get('/users/user/records', [UserController::class, 'show']);
    // Edit User Profile
    Route::get('/users/user/{user}/profile/edit', [UserController::class, 'editProfile']);
    Route::patch('/users/user/{user}/profile/update', [UserController::class, 'updateProfile']);
    Route::delete('/users/user/{user}/profile/delete', [UserController::class, 'deleteProfile']);

    // Doctors
    Route::get('/doctors', [DoctorController::class, 'index']);
    Route::get('/doctors/{doctor}/detail', [DoctorController::class, 'detail']);

    Route::get('/users/{user}/records', [UserController::class, 'showRecord']);
    Route::get('/doctors/{doctor}/booking/create', [BookingController::class, 'createBook']);
    Route::post('/doctors/{doctor}/booking/store', [BookingController::class, 'storeBook']);

    Route::get('/users/{user}/bookings/{booking}/edit', [BookingController::class, 'edit']);
    Route::patch('/users/{user}/bookings/{booking}/update', [BookingController::class, 'update']);
    Route::delete('/users/{user}/bookings/{booking}/delete', [BookingController::class, 'delete']);

    Route::get('/users/{user}/medicalRecords', [MedicalRecordController::class, 'show']);
});

Route::middleware(MustBeGuestUser::class)->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware(MustBeAdminUser::class)->group(function () {
    Route::get('/admin/users', [AdminController::class, 'showUsers']);
    Route::get('/admin/doctors', [AdminController::class, 'showDoctors']);
    // 
    Route::get('/admin/doctors/create', [AdminController::class, 'create']);
    Route::post('/admin/doctors/store', [AdminController::class, 'store']);
    // 
    Route::get('/admin/schedules/create', [AdminController::class, 'createTime']);
    Route::post('/admin/schedules/store', [AdminController::class, 'storeTime']);
    Route::get('/admin/medicalRecords/create', [AdminController::class, 'createRecord']);
    Route::post('/admin/medicalRecords/store', [AdminController::class, 'storeRecord']);
    Route::get('/admin/medicalRecords', [AdminController::class, 'showRecords']);

    Route::get('/admin/Booking', [AdminController::class, 'showBook']);

    Route::get('/admin/doctors/{doctor}/profile', [AdminController::class, 'index']);

    Route::patch('/admin/users/roles/edit', [AdminController::class, 'editRole']);
});
