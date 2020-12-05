<?php
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckLoginStudent;

//Trang đăng nhập
Route::get('/', [TeacherController::class, 'page_login']);

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

    //Xóa đề kiểm tra
    Route::get('delete-test-subject/{id_test}', [TeacherController::class, 'delete_test_subject']);

    //Kích hoạt đề kiểm tra
    Route::get('active-test-subject/{id_test}', [TeacherController::class, 'active_test_subject']);

    //Hủy Kích hoạt đề kiểm tra
    Route::get('inactive-test-subject/{id_test}', [TeacherController::class, 'inactive_test_subject']);

    //Thêm đề kiểm tra
    Route::post('post-add-test-subject', [TeacherController::class, 'post_add_test_subject']);

    //Xem chi tiết đề kiểm tra
    Route::get('view-detail-test-subject/{id_test}', [TeacherController::class, 'view_detail_test_subject']);

    //Xem kết quả kiểm tra
    Route::get('page-result-test/{id_user}', [TeacherController::class, 'page_result_test']);

    //Xem chi tiết kết quả kiểm tra
    Route::get('view-detail-result-test/{id_user}/{id_test}', [TeacherController::class, 'view_detail_result_test']);
    //================================================================
});




Route::middleware([CheckLoginStudent::class])->group(function(){
    //================================================================
    //Trang chủ học sinh
    Route::get('student', [StudentController::class, 'studentHome'])->name('homeStudent');

    Route::get('/exam-online/{studentCode}', [StudentController::class, 'examOnline']);

    Route::get('/check-account/{deKiemTraId}', [StudentController::class, 'checkAccount']);
    Route::post('/post-check-account', [StudentController::class, 'postCheckAccount'])->name('postCheckAccount');

    Route::get('/task', [StudentController::class, 'task'])->name('task');
    Route::get('/student-logout', [StudentController::class, 'studentLogout'])->name('studentLogout');

    Route::get('/get-question', [StudentController::class, 'getQuestion'])->name('getQuestion');

    Route::get('/student-logout', [StudentController::class, 'studentLogout'])->name('studentLogout');

    Route::get('/update-answer', [StudentController::class, 'updateAnswer'])->name('updateAnswer');

    Route::get('/finish-testing/{deKiemTraId}/{hocSinhId}', [StudentController::class, 'finishTest']);
    //================================================================
});



//================================================================
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('add-student', [StudentController::class, 'addStudent']);
    Route::post('post-add-student', [StudentController::class, 'postAddStudent'])->name('postAddStudent');

    Route::get('add-teacher', [TeacherController::class, 'addTeacher']);
    Route::post('post-add-teacher', [TeacherController::class, 'postAddTeacher'])->name('postAddTeacher');
});
//================================================================
