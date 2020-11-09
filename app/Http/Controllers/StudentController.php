<?php

namespace App\Http\Controllers;

use App\HocSinh;
use App\Models\User;
use Illuminate\Http\Request;
use validate;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function studentHome(){
        return view('student.index_student');
    }


    public function examOnline(){
        return view('student.exam_online');
    }


    public function checkAccount(Request $request){
        return view('student.check_account');
    }


    public function task(){

        return view('student.task');
    }

    public function addStudent(){
        return view('vendor.voyager.users.add_student');
    }

    public function postAddStudent(Request $request){

        $student = new User;
        $tbl_student = new HocSinh;
        $student->role_id = 4;
        $student->name = $request->input('name');
        $student->ma_hs = $request->input('code');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('password'));
        $student->gioi_tinh = $request->input('gioiTinh');
        $student->sdt = $request->input('phone');
        $student->ngay_sinh = $request->input('date');
        $student->dia_chi = $request->input('address');
        $student->save();

        $tbl_student->ma_hs = $request->input('code');
        $tbl_student->save();

        $create_student = Session::get('create_student');
        Session::put('create_student');

        return redirect('/admin/users')->with('create_student', 'Đã thêm học sinh thành công    ');

    }

    public function destroy($id)
    {
        //
    }
}
