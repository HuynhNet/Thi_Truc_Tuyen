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
        return view('layout.layout_teacher');
    }
}
