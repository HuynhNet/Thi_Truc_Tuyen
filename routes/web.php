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

//Trang thông tin hồ sơ
Route::get('page-profile-teacher', [TeacherController::class, 'page_profile_teacher']);

//Trang môn học
Route::get('page-subject', [TeacherController::class, 'page_subject']);

//Trang chỉnh sửa môn học
Route::get('edit-subject', [TeacherController::class, 'edit_subject']);

//Trang xem câu hỏi môn học môn học
Route::get('view-question-subject', [TeacherController::class, 'view_question_subject']);

//Trang chỉnh sửa câu hỏi môn học
Route::get('edit-question-subject', [TeacherController::class, 'edit_question_subject']);
//================================================================



//Trang chủ học sinh
Route::get('student', [StudentController::class, 'studentHome']);
Route::get('/exam-online', [StudentController::class, 'examOnline']);
Route::get('/check-account', [StudentController::class, 'checkAccount']);
Route::get('/task', [StudentController::class, 'task']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
