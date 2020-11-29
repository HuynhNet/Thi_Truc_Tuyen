<?php
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckLogin;

//Trang đăng nhập
Route::get('page-login', [TeacherController::class, 'page_login']);

//Kiểm tra đăng nhập
Route::post('check-login', [AdminController::class, 'checkLogin'])->name('checkLogin');

//Đăng xuất
Route::get('logout', [TeacherController::class, 'logout']);

Route::middleware([CheckLogin::class])->group(function(){
    //================================================================
    /*TRANG GIÁO VIÊN*/
    //Trang chủ giáo viên
    Route::get('page-home-teacher', [TeacherController::class, 'page_home_teacher'])->name('homeTeacher');

    //Trang thông tin hồ sơ
    Route::get('page-profile-teacher', [TeacherController::class, 'page_profile_teacher']);

    /*----------------------------------------------------------------------------------------------*/
    //Trang môn học
    Route::get('page-subject', [TeacherController::class, 'page_subject']);

    //Thêm môn học CSDL
    Route::post('post-add-subject', [TeacherController::class, 'post_add_subject']);

    //Trang chỉnh sửa môn học
    Route::get('edit-subject/{id_subject}', [TeacherController::class, 'edit_subject']);

    //Cập nhật môn học
    Route::put('update-subject/{id_subject}', [TeacherController::class, 'update_subject']);

    //Kích hoạt môn học
    Route::get('active-subject/{id_subject}', [TeacherController::class, 'active_subject']);

    //Hủy Kích hoạt môn học
    Route::get('inactive-subject/{id_subject}', [TeacherController::class, 'inactive_subject']);
    /*----------------------------------------------------------------------------------------------*/


    /*----------------------------------------------------------------------------------------------*/
    //Trang xem câu hỏi môn học
    Route::get('view-question-subject/{id_subject}', [TeacherController::class, 'view_question_subject']);

    //Xóa câu hỏi môn học
    Route::get('delete-question-subject/{id_question}', [TeacherController::class, 'delete_question_subject']);

    //Thêm câu hỏi môn học
    Route::post('post-add-question-subject/{id_subject}', [TeacherController::class, 'post_add_question_subject']);

    //Nhập file Excel vào câu hỏi môn học
    Route::post('import-file-excel/{id_subject}', [TeacherController::class, 'import_file_excel']);

    //Trang chỉnh sửa câu hỏi môn học
    Route::get('edit-question-subject/{id_subject}/{id_question}', [TeacherController::class, 'edit_question_subject']);

    //Cập nhật câu hỏi môn học
    Route::put('update-question-subject/{id_subject}/{id_question}', [TeacherController::class, 'update_question_subject']);

    //Trang loại kiểm tra thi cử
    Route::get('page-type-test', [TeacherController::class, 'page_type_test']);

    //Xóa loại kiểm tra thi cử
    Route::get('delete-type-test/{id_type_test}', [TeacherController::class, 'delete_type_test']);

    //Thêm loại kiểm tra thi cử
    Route::post('post-add-type-test', [TeacherController::class, 'post_add_type_test']);

    //Trang mức độ kiểm tra thi cử
    Route::get('page-level-test', [TeacherController::class, 'page_level_test']);

    //Xóa mức độ kiểm tra thi cử
    Route::get('delete-level-test/{id_level_test}', [TeacherController::class, 'delete_level_test']);

    //Thêm mức độ kiểm tra thi cử
    Route::post('post-add-level-test', [TeacherController::class, 'post_add_level_test']);

    //Trang học kỳ năm học
    Route::get('page-semester-year', [TeacherController::class, 'page_semester_year']);

    //Xóa học kỳ năm học
    Route::get('delete-year/{id_year}', [TeacherController::class, 'delete_year']);

    //Thêm học kỳ năm học CSDL
    Route::post('post-add-semester-year', [TeacherController::class, 'post_add_semester_year']);
    /*----------------------------------------------------------------------------------------------*/



    //Trang đề kiểm tra
    Route::get('page-test-subject', [TeacherController::class, 'page_test_subject']);
    //================================================================

});








//================================================================
//Trang chủ học sinh
Route::get('student', [StudentController::class, 'studentHome'])->name('homeStudent');
Route::get('/exam-online', [StudentController::class, 'examOnline']);
Route::get('/check-account', [StudentController::class, 'checkAccount']);
Route::get('/task', [StudentController::class, 'task']);
//================================================================







Route::get('/student-logout', [StudentController::class, 'studentLogout'])->name('studentLogout');






//================================================================
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('add-student', [StudentController::class, 'addStudent']);
    Route::post('post-add-student', [StudentController::class, 'postAddStudent'])->name('postAddStudent');

    Route::get('add-teacher', [TeacherController::class, 'addTeacher']);
    Route::post('post-add-teacher', [TeacherController::class, 'postAddTeacher'])->name('postAddTeacher');
});
//================================================================
