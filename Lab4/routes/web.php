<?php

use Illuminate\framework\factory\Route;
use App\controllers\admin\FeedBackController;
use App\controllers\admin\CoursesController;
use App\controllers\admin\TeachersController;
use App\controllers\admin\UsersController;
use App\controllers\client\HomeController;
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
Route::get('/admin/course/new', [CoursesController::class, 'index']);
Route::get('/admin/teacher', [TeachersController::class, 'index']);
Route::get('/admin/student', [UsersController::class, 'index']);

Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/danh-sach-mon-hoc', [ClientCoursesController::class, 'index']);
Route::get('/chi-tiet-mon-hoc', [ClientCoursesController::class, 'detail']);
