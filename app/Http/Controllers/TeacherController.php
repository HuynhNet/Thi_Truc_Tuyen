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
        return view('layout.layout_teacher');
    }

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

        return redirect('/admin/users')->with('create_teacher', 'Đã thêm học sinh thành công    ');

    }
}
