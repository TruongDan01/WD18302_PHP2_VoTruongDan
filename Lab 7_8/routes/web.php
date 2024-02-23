<?php

use Illuminate\framework\factory\Route;
use App\controllers\admin\FeedBackController;
use App\controllers\admin\CoursesController;
use App\controllers\admin\ClassesController;
use App\controllers\admin\DropZoneController;
use App\controllers\login\GoogleController;
use App\controllers\admin\SemestersController;
use App\controllers\admin\TeachersController;
use App\controllers\admin\UsersController;
use App\controllers\client\HomeController;
use App\controllers\client\ReviewsController;

use App\controllers\login\AuthController;

use App\controllers\client\CoursesController as ClientCoursesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', [FeedBackController::class, 'index']);
Route::get('/admin/feedback/new', [FeedBackController::class, 'store']);
Route::post('/admin/feedback/new', [FeedBackController::class, 'store']);
Route::get('/admin/feedback/list', [FeedBackController::class, 'show']);
Route::get('/admin/feedback/update', [FeedBackController::class, 'update']);
Route::get('/admin/course/list', [CoursesController::class, 'show']);
Route::get('/admin/course/new', [CoursesController::class, 'index']);
Route::get('/admin/course/add', [CoursesController::class, 'store']);
Route::post('/admin/course/add', [CoursesController::class, 'store']);

Route::get('/admin/teacher', [TeachersController::class, 'index']);
Route::get('/admin/teacher/new', [TeachersController::class, 'store']);
Route::post('/admin/teacher/new', [TeachersController::class, 'store']);
Route::post('/admin/teacher/update', [TeachersController::class, 'update']);
Route::post('/admin/teacher/destroy/{param}', [TeachersController::class, 'destroy']);
Route::post('/admin/classes/new', [ClassesController::class, 'store']);

Route::post('/admin/semesters/new', [SemestersController::class, 'store']);
Route::post('/admin/upload/image', [DropZoneController::class, 'store']);

Route::get('/admin/student', [UsersController::class, 'index']);
Route::post('/client/review/new', [ReviewsController::class, 'store']);

Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/danh-sach-mon-hoc', [ClientCoursesController::class, 'index']);
Route::get('/chi-tiet-mon-hoc', [ClientCoursesController::class, 'detail']);

Route::get('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/checkLogin', [AuthController::class, 'authLogin']);
Route::get('/admin/register', [AuthController::class, 'register']);
Route::post('/admin/register', [AuthController::class, 'register']);
Route::post('/admin/login/google', [GoogleController::class, 'login']);
Route::get('/dang-xuat', [AuthController::class, 'logOut']);