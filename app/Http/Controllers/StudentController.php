<?php

namespace App\Http\Controllers;

use App\HocSinh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use validate;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function studentHome(){
        return view('student.index_student');
    }


    public function examOnline($studentCode){

        $monHoc = DB::table('hoc_sinhs')
                    ->join('lops', 'hoc_sinhs.id_lop', '=', 'lops.id')
                    ->join('lop_monhocs', 'lop_monhocs.lop', '=', 'lops.id')
                    ->join('mon_hocs', 'mon_hocs.id', '=', 'lop_monhocs.mon_hoc')
                    ->where('hoc_sinhs.ma_hs', $studentCode)
                    ->select('mon_hocs.*')
                    ->get();

//        echo $monHoc;
        return view('student.exam_online')->with([
            'monHoc' => $monHoc
        ]);
    }


    public function checkAccount(Request $request, $deKiemTraId){
        $deKiemTra = DB::table('de_kiem_tras')->where('id', $deKiemTraId)->get();
        return view('student.check_account')->with([
            'deKiemTra' => $deKiemTra
        ]);
    }

    public function postCheckAccount(Request $request){
        $deKiemTraId = $request->input('deKiemTraId');
        $pass = $request->input('password');
        $passDe = DB::table('de_kiem_tras')->where('id', '=', $deKiemTraId)->select('mat_khau','thoi_gian')->get();

        $cauHois = DB::table('chi_tiet_des')
            ->join('chi_tiet_cau_hois', 'chi_tiet_cau_hois.chi_tiet_de', '=', 'chi_tiet_des.id')
            ->where('chi_tiet_des.de_kiem_tra', $deKiemTraId)
            ->select('chi_tiet_cau_hois.*')
            ->get();

        $showCauHoi = DB::table('chi_tiet_des')
            ->join('chi_tiet_cau_hois', 'chi_tiet_cau_hois.chi_tiet_de', '=', 'chi_tiet_des.id')
            ->where('chi_tiet_des.de_kiem_tra', $deKiemTraId)
            ->select('chi_tiet_cau_hois.*')
            ->take(2)
            ->get();

        if($pass == $passDe[0]->mat_khau){
            return view('student.task')->with([
                    'cauHois' => $cauHois,
                    'thoiGian' => $passDe[0]->thoi_gian,
                    'deKiemTraId' => $deKiemTraId,
                    'showCauHoi' => $showCauHoi
                ]);
        }else{
            return redirect()->back()->with('message', 'Mật khẩu không chính xác');
        }

    }

    public function getAnswer(Request $request){
        $key = $request->key;
        $deKiemTraId = $request->deKiemTraId;
        $chiTietCauHoiId = $request->chiTietCauHoiId;

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

    public function studentLogout(){
        Auth::logout();
        return redirect()->route('homeStudent');
    }
}
