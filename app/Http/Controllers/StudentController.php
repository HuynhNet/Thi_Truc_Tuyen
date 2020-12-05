<?php

namespace App\Http\Controllers;

use App\BaiLam;
use App\HocSinh;
use App\KetQua;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
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
        $deKiemTra = DB::table('de_kiem_tras')->where('id', $deKiemTraId)->select('id')->get();
        return view('student.check_account')->with([
            'deKiemTra' => $deKiemTra[0]->id
        ]);
    }

    public function postCheckAccount(Request $request){
        $deKiemTraId = $request->input('deKiemTraId');
        $hs_id = $request->input('hs_id');

        $ma_mon = DB::table('de_kiem_tras')
                    ->join('mon_hocs', 'mon_hocs.id', '=', 'de_kiem_tras.mon_hoc')
                    ->where('de_kiem_tras.id', $deKiemTraId)
                    ->select('mon_hocs.id')
                    ->get();

        $pass = $request->input('password');
        $passDe = DB::table('de_kiem_tras')->where('id', '=', $deKiemTraId)->select('mat_khau','thoi_gian')->get();

        if($pass == $passDe[0]->mat_khau){

            $getBaiLamId = DB::table('bai_lams')
                        ->where('ma_hs', $hs_id)
                        ->where('ma_de', $deKiemTraId)
                        ->first();

            if($getBaiLamId === null){

                $baiLam = new BaiLam;
                $baiLam->ma_hs = $hs_id;
                $baiLam->ma_de = $deKiemTraId;
                $baiLam->ma_mon = $ma_mon[0]->id;
                $baiLam->thoi_gian_bat_dau_lam = Carbon::now('Asia/Ho_Chi_Minh');
                $baiLam->save();


                $chiTietBaiLams = DB::table('chi_tiet_bai_lams')
                    ->where('bai_lam', $baiLam->id)
                    ->get();

                $baiLamId = $baiLam->id;
                $thoiGianBatDauLam = $baiLam->thoi_gian_bat_dau_lam;

                $cauHois = DB::table('chi_tiet_des')
                    ->join('chi_tiet_cau_hois', 'chi_tiet_cau_hois.chi_tiet_de', '=', 'chi_tiet_des.id')
                    ->where('chi_tiet_des.de_kiem_tra', $deKiemTraId)
                    ->select('chi_tiet_cau_hois.*')
                    ->get();

                return view('student.task')->with([
                    'cauHois' => $cauHois,
                    'thoiGian' => $passDe[0]->thoi_gian,
                    'deKiemTraId' => $deKiemTraId,
                    'cauHois' => $cauHois,
                    'chiTietBaiLam' => $chiTietBaiLams,
                    'baiLamId' => $baiLamId,
                    'thoiGianBatDauLam' => $thoiGianBatDauLam,
                    'maMon' => $ma_mon,
                    'hocSinhId' => $hs_id
                ]);

            }else{
                $baiLamId = DB::table('bai_lams')
                    ->where('ma_hs', $hs_id)
                    ->where('ma_de', $deKiemTraId)
                    ->select('id')
                    ->get();

                $chiTietBaiLams = DB::table('chi_tiet_bai_lams')
                    ->where('bai_lam', $baiLamId[0]->id)
                    ->get();

                $thoiGianBatDauLam = DB::table('bai_lams')->where('id', $baiLamId[0]->id)
                                        ->select('thoi_gian_bat_dau_lam')->get();

                $cauHois = DB::table('chi_tiet_des')
                    ->join('chi_tiet_cau_hois', 'chi_tiet_cau_hois.chi_tiet_de', '=', 'chi_tiet_des.id')
                    ->where('chi_tiet_des.de_kiem_tra', $deKiemTraId)
                    ->select('chi_tiet_cau_hois.*')
                    ->get();

                return view('student.task')->with([
                    'cauHois' => $cauHois,
                    'thoiGian' => $passDe[0]->thoi_gian,
                    'deKiemTraId' => $deKiemTraId,
                    'cauHois' => $cauHois,
                    'chiTietBaiLam' => $chiTietBaiLams,
                    'baiLamId' => $baiLamId[0]->id,
                    'thoiGianBatDauLam' => $thoiGianBatDauLam[0]->thoi_gian_bat_dau_lam,
                    'maMon' => $ma_mon,
                    'hocSinhId' => $hs_id
                ]);
            }

        }else{
            return redirect()->back()->with('message', 'Mật khẩu không chính xác');
        }

    }

    public function updateAnswer(Request $request){
        $baiLamId = $request->baiLam;
        $chiTietCauHoiId = $request->chiTietCauHoi;
        $dapAnChon = $request->dapAnChon;

        DB::table('chi_tiet_bai_lams')
            ->updateOrInsert(
                ['bai_lam' => $baiLamId, 'chi_tiet_cau_hoi' => $chiTietCauHoiId],
                ['dap_an_chon' => $dapAnChon]
            );
    }

    public function finishTest($deKiemTraId, $hocSinhId){

        $ma_mon = DB::table('de_kiem_tras')
            ->join('mon_hocs', 'mon_hocs.id', '=', 'de_kiem_tras.mon_hoc')
            ->where('de_kiem_tras.id', $deKiemTraId)
            ->select('mon_hocs.id')
            ->get();

        $monHocId = $ma_mon[0]->id;

        $getBaiLamId = DB::table('bai_lams')
            ->where('ma_hs', '=', $hocSinhId)
            ->where('ma_de', '=', $deKiemTraId)
            ->select('id')
            ->get();

        $listBaiLam = DB::table('chi_tiet_bai_lams')->where('bai_lam', $getBaiLamId[0]->id)->get();

        $cauHois = DB::table('chi_tiet_des')
            ->join('chi_tiet_cau_hois', 'chi_tiet_cau_hois.chi_tiet_de', '=', 'chi_tiet_des.id')
            ->where('chi_tiet_des.de_kiem_tra', $deKiemTraId)
            ->select('chi_tiet_cau_hois.*')
            ->get();


        $tongCauHoi = DB::table('de_kiem_tras')->where('id',$deKiemTraId)->select('so_cau')->get();
        $soCauDung = 0;

        foreach ($cauHois as $cauHoi){
            foreach ($listBaiLam as $value){
                if(($value->chi_tiet_cau_hoi == $cauHoi->id) && ($value->dap_an_chon == $cauHoi->dap_an)){
                    $soCauDung++;
                }
            }
        }

        $diem = ($soCauDung / $tongCauHoi[0]->so_cau) * 10;
        if($diem >= 8){
            $xepLoai = 'Giỏi';
        }elseif ($diem >= 6.5 && $diem < 8){
            $xepLoai = 'Khá';
        }elseif ($diem >= 5 && $diem < 6.5){
            $xepLoai = 'Trung Bình';
        }else{
            $xepLoai = 'Kém';
        }

        $maHS = DB::table('users')->where('id', $hocSinhId)->select('ma_hs')->get();
        $tenHS = DB::table('users')->where('id', $hocSinhId)->select('name')->get();

        $thoiGian = DB::table('de_kiem_tras')->where('id', $deKiemTraId)->select('thoi_gian')->get();
        $tenMonHoc = DB::table('mon_hocs')->where('id', $monHocId)->select('ten_mon_hoc')->get();

        $ketQua = DB::table('ket_quas')
                    ->where('de_kiem_tra', $deKiemTraId)
                    ->where('mon_hoc', $monHocId)
                    ->where('ma_hs', $maHS[0]->ma_hs)
                    ->first();

        if($ketQua === null){
            $kq = new KetQua;
            $kq->de_kiem_tra = $deKiemTraId;
            $kq->mon_hoc = $monHocId;
            $kq->ma_hs = $maHS[0]->ma_hs;
            $kq->diem = $diem;
            $kq->xep_loai = $xepLoai;
            $kq->save();
        }else{
            $ketQuaId = $ketQua = DB::table('ket_quas')
                ->where('de_kiem_tra', $deKiemTraId)
                ->where('mon_hoc', $monHocId)
                ->where('ma_hs', $maHS[0]->ma_hs)
                ->select('id')
                ->get();

            DB::table('ket_quas')
                ->where('id', $ketQuaId[0]->id)
                ->update(['diem' => $diem, 'xep_loai' => $xepLoai]);
        }

        return view('student.result')->with([
            'tongCauHoi' => $tongCauHoi[0]->so_cau,
            'soCauDung' => $soCauDung,
            'thoiGian' => $thoiGian[0]->thoi_gian,
            'tenMonHoc' => $tenMonHoc[0]->ten_mon_hoc,
            'diem' => $diem,
            'xepLoai' => $xepLoai,
            'tenHS' => $tenHS[0]->name
        ]);
    }

    public function getQuestion(Request $request){

            $key = $request->key;
            $chiTietCauHoiId = $request->chiTietCauHoiId;

            $showCauHois = DB::table('chi_tiet_cau_hois')
                ->where('id', $chiTietCauHoiId)
                ->get();

            Session::forget('listQuestions');
            $request->session()->put('listQuestions', $showCauHois);

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
        return response()->json(['url'=>url('/')]);
    }
}
