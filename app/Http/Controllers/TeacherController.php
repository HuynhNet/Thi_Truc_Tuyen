<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //Trang đăng nhập
    protected function page_login()
    {
        return view('page.login');
    }

    //Trang chủ giáo viên
    protected function page_home_teacher()
    {
        return view('teacher.index_teacher');
    }

    //Trang thông tin giáo viên
    protected function page_profile_teacher()
    {
        return view('teacher.profile.layout_profile');
    }

    //Trang môn học
    protected function page_subject()
    {
        return view('teacher.page.page_subject');
    }

    //Trang chỉnh sửa môn học
    protected function edit_subject()
    {
        return view('teacher.page.edit_subject');
    }

    //Trang chỉnh sửa câu hỏi môn học
    protected function edit_question_subject()
    {
        return view('teacher.page.edit_question_subject');
    }

    //Trang xem câu hỏi môn học
    protected function view_question_subject()
    {
        return view('teacher.page.view_question_subject');
    }
}
