<?php
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
//================================================================
/*TRANG GIÁO VIÊN*/
//Trang đăng nhập
Route::get('page-login', [TeacherController::class, 'page_login']);

//Trang chủ giáo viên
Route::get('page-home-teacher', [TeacherController::class, 'page_home_teacher']);
//================================================================


//Trang chủ học sinh
Route::get('student', [StudentController::class, 'studentHome']);
Route::get('/exam-online', [StudentController::class, 'examOnline']);
Route::get('/check-account', [StudentController::class, 'checkAccount']);
Route::get('/task', [StudentController::class, 'task']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
