<?php
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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
//Trang đăng nhập
Route::get('page-login', [TeacherController::class, 'page_login']);

//Trang chủ giáo viên
Route::get('page-home-teacher', [TeacherController::class, 'page_home_teacher']);

