<?php

namespace App\Http\Controllers;

use App\GiaoVien;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

    //Trang loại kiểm tra thi cử
    protected function page_type_test()
    {
        return view('teacher.page.page_type_test');
    }
    //=====================================================================

    public function addTeacher(){
        return view('vendor.voyager.users.add_teacher');
    }

    public function postAddTeacher(Request $request){

        $teacher = new User;
        $tbl_teacher = new GiaoVien;
        $teacher->role_id = 3;
        $teacher->name = $request->input('name');
        $teacher->ma_hs = $request->input('code');
        $teacher->email = $request->input('email');
        $teacher->password = Hash::make($request->input('password'));
        $teacher->gioi_tinh = $request->input('gioiTinh');
        $teacher->sdt = $request->input('phone');
        $teacher->ngay_sinh = $request->input('date');
        $teacher->dia_chi = $request->input('address');
        $teacher->save();

        $tbl_teacher->ma_gv = $request->input('code');
        $tbl_teacher->save();

        $create_teacher = Session::get('create_teacher');
        Session::put('create_teacher');

        return redirect('/admin/users')->with('create_teacher', 'Đã thêm học sinh thành công');

    }
}
