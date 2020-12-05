<?php

namespace App\Http\Controllers;

use App\CauHoi;
use App\ChiTietCauHoi;
use App\ChiTietDe;
use App\DeKiemTra;
use App\GiaoVien;
use App\Http\Controllers\Controller;
use App\KetQua;
use App\LoaiKiemTra;
use App\Models\User;
use App\MonHoc;
use App\MucKiemTra;
use App\NamHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Excel;

class TeacherController extends Controller
{
    //Trang đăng nhập
    protected function page_login()
    {
        return view('page.login');
    }

    //Dăng xuất
    protected function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    //Trang chủ giáo viên
    protected function page_home_teacher()
    {
        if (Auth::check() && Auth::user()->role_id == 3) {
            return view('teacher.index_teacher');
        }else{
            return redirect('/');
        }
    }

    //Trang thông tin giáo viên
    protected function page_profile_teacher()
    {
        return view('teacher.profile.layout_profile');
    }


    /*===================================================================*/
    //Trang môn học
    protected function page_subject()
    {
        $show_subjects = MonHoc::latest()->paginate(10);
        return view('teacher.page.page_subject',['show_subjects'=>$show_subjects]);
    }

    //Thêm môn học
    protected function post_add_subject(Request $request)
    {
        $add_subject = new MonHoc();
        $add_subject->ma_mon_hoc = $request->input('inputSubjectCode');
        $add_subject->ten_mon_hoc = $request->input('inputSubjectName');

        //Upload hình ảnh
        if ($request->hasFile('inputFileImage')) {
            $file_image = $request->file('inputFileImage');
            $imageName = time().'-'.$file_image->getClientOriginalName();
            $file_image->move(public_path('image_subject'), $imageName);
            $add_subject->hinh_anh = $imageName;
        }
        $add_subject->trang_thai = 0;
        $add_subject->save();

        return redirect()->back()->with('success','Đã thêm môn học');
    }

    //Kích hoạch môn học
    protected function active_subject($id_subject)
    {
        MonHoc::where('id', $id_subject)->update(['trang_thai' => 1]);
        return redirect()->back()->with('success','Đã kích hoạt môn học');
    }

    //Hủy Kích hoạch môn học
    protected function inactive_subject($id_subject)
    {
        MonHoc::where('id', $id_subject)->update(['trang_thai' => 0]);
        return redirect()->back()->with('success','Đã Hủy kích hoạt môn học');
    }

    //Trang chỉnh sửa môn học
    protected function edit_subject($id_subject)
    {
        $edit_subject = MonHoc::find($id_subject);
        return view('teacher.page.edit_subject',['edit_subject'=>$edit_subject]);
    }

    //Cập nhật môn học
    protected function update_subject(Request $request, $id_subject)
    {
        $update_subject = MonHoc::find($id_subject);
        $update_subject->ten_mon_hoc = $request->input('inputSubjectName');

        //Upload hình ảnh
        if ($request->hasFile('inputFileImage')) {
            $file_image = $request->file('inputFileImage');
            $imageName = time().'-'.$file_image->getClientOriginalName();
            $file_image->move(public_path('image_subject'), $imageName);
            $update_subject->hinh_anh = $imageName;
        }

        $update_subject->save();

        return redirect('page-subject')->with('success','Đã cập nhật môn học');
    }
    /*===================================================================*/

    //Trang chỉnh sửa câu hỏi môn học
    protected function edit_question_subject($id_subject, $id_question)
    {
        $subject_ids = MonHoc::find($id_subject);
        $edit_question = CauHoi::find($id_question);
        return view('teacher.page.edit_question_subject',['subject_ids'=>$subject_ids, 'edit_question'=>$edit_question]);
    }

    //Xóa câu hỏi môn học
    protected function delete_question_subject($id_question)
    {
        $delete_question = CauHoi::findOrFail($id_question);
        if (!(empty($delete_question->hinh_anh))){
            unlink(public_path('image_question_subject/').$delete_question->hinh_anh);
        }
        $delete_question->delete();
        return redirect()->back()->with('success','Đã xóa một câu hỏi');
    }

    //Trang xem câu hỏi môn học
    protected function view_question_subject($id_subject)
    {
        $view_subject = MonHoc::find($id_subject);
        $show_questions = CauHoi::where('mon_hoc', $id_subject)->latest()->paginate(10);
        return view('teacher.page.view_question_subject',
        ['view_subject'=>$view_subject, 'show_questions'=>$show_questions]);
    }

    //Thêm câu hỏi môn học CSDL
    protected function post_add_question_subject(Request $request, $id_subject)
    {
        $this->validate($request,[
            'inputContent'=>'unique:cau_hois,noi_dung'
        ],[
            'inputContent.unique'=>'Nội dung đã tồn tại'
        ]);

        $add_question = new CauHoi();
        $add_question->mon_hoc = $id_subject;
        $add_question->noi_dung = $request->input('inputContent');
        $add_question->a = $request->input('inputA');
        $add_question->b = $request->input('inputB');
        $add_question->c = $request->input('inputC');
        $add_question->d = $request->input('inputD');
        $add_question->dap_an_dung = $request->input('inputCorrect');

        //Upload hình ảnh
        if ($request->hasFile('inputFileImage')) {
            $file_image = $request->file('inputFileImage');
            $imageName = time().'-'.$file_image->getClientOriginalName();
            $file_image->move(public_path('image_question_subject'), $imageName);
            $add_question->hinh_anh = $imageName;
        }
        $add_question->save();
        return redirect()->back()->with('success','Đã thêm câu hỏi môn học');
    }

    //Cập nhật câu hỏi môn học CSDL
    protected function update_question_subject(Request $request, $id_subject, $id_question)
    {
        $update_question = CauHoi::find($id_question);
        $update_question->noi_dung = $request->input('inputContent');
        $update_question->a = $request->input('inputA');
        $update_question->b = $request->input('inputB');
        $update_question->c = $request->input('inputC');
        $update_question->d = $request->input('inputD');
        $update_question->dap_an_dung = $request->input('inputCorrect');

        //Upload hình ảnh
        if ($request->hasFile('inputFileImage')) {
            $file_image = $request->file('inputFileImage');
            $imageName = time().'-'.$file_image->getClientOriginalName();
            $file_image->move(public_path('image_question_subject'), $imageName);
            $update_question->hinh_anh = $imageName;
        }
        $update_question->save();
        return redirect('view-question-subject/'.$id_subject)->with('success','Đã Cập nhật câu hỏi');
    }

    //Nhập vào câu hỏi môn học
    protected function import_file_excel(Request $request, $id_subject)
    {
        $this->validate($request, [
            'fileExcel'  => 'mimes:xls,xlsx,csv'
        ],[
            'fileExcel.mimes' => 'Bắt buộc file có phần mở rộng: xls, xlsx, csv'
        ]);

        if ($request->hasFile('fileExcel')) {
            // load file ra object PHPExcel
            $objPHPExcel = \PHPExcel_IOFactory::load($request->file('fileExcel'));

            // Set sheet sẽ được đọc dữ liệu
            $provinceSheet = $objPHPExcel->setActiveSheetIndex(0);

            // Lấy số row lớn nhất trong sheet
            $highestRow    = $provinceSheet->getHighestRow();

            // For chạy từ 2 vì row 1 là title
            for ($row = 2; $row <= $highestRow; $row++) {
                CauHoi::create([
                    // lấy dữ liệu từng ô theo col và row
                    'noi_dung' => $provinceSheet->getCellByColumnAndRow(0, $row)->getValue(),
                    'a' => $provinceSheet->getCellByColumnAndRow(1, $row)->getValue(),
                    'b' => $provinceSheet->getCellByColumnAndRow(2, $row)->getValue(),
                    'c' => $provinceSheet->getCellByColumnAndRow(3, $row)->getValue(),
                    'd' => $provinceSheet->getCellByColumnAndRow(4, $row)->getValue(),
                    'dap_an_dung' => $provinceSheet->getCellByColumnAndRow(5, $row)->getValue(),
                    'mon_hoc' => $id_subject
                ]);
            }
        }

        return redirect()->back()->with('success', 'Đã nhập Excel thành công');
    }

    //Trang loại kiểm tra thi cử
    protected function page_type_test()
    {
        $show_type_tests = LoaiKiemTra::latest()->get();
        return view('teacher.page.page_type_test',['show_type_tests'=>$show_type_tests]);
    }

    //Trang loại kiểm tra thi cử
    protected function delete_type_test($id_type_test)
    {
        LoaiKiemTra::destroy($id_type_test);
        return redirect()->back()->with('success', 'Đã Xóa loại kiểm tra');
    }

    //Thêm loại kiểm tra thi cử CSDL
    protected function post_add_type_test(Request $request)
    {
        $this->validate($request, [
            'inputTypeTestName'  => 'unique:loai_kiem_tras,ten_loai'
        ],[
            'inputTypeTestName.unique' => 'Tên loại kiểm tra đã tồn tại'
        ]);
        $add_type_test = new LoaiKiemTra();
        $add_type_test->ten_loai = $request->input('inputTypeTestName');
        $add_type_test->thoi_gian = $request->input('inputTypeTestMinute');
        $add_type_test->save();

        return redirect()->back()->with('success', 'Đã Thêm loại kiểm tra');
    }

    //Trang mức độ kiểm tra thi cử
    protected function page_level_test()
    {
        $show_level_tests = MucKiemTra::latest()->get();
        return view('teacher.page.page_level_test',['show_level_tests'=>$show_level_tests]);
    }

    //Xóa mức độ kiểm tra thi cử
    protected function delete_level_test($id_level_test)
    {
        MucKiemTra::destroy($id_level_test);
        return redirect()->back()->with('success', 'Đã Xóa mức kiểm tra');
    }

    //Thêm mức độ kiểm tra thi cử
    protected function post_add_level_test(Request $request)
    {
        $this->validate($request, [
            'inputLevelTestName'  => 'unique:muc_kiem_tras,ten_muc'
        ],[
            'inputLevelTestName.unique' => 'Tên Mức kiểm tra đã tồn tại'
        ]);
        $add_level_test = new MucKiemTra();
        $add_level_test->ten_muc = $request->input('inputLevelTestName');
        $add_level_test->save();

        return redirect()->back()->with('success', 'Đã Thêm mức kiểm tra');
    }

    //Trang học kỳ năm học
    protected function page_semester_year()
    {
        $show_years = NamHoc::latest()->get();
        return view('teacher.page.page_semester_year',['show_years'=>$show_years]);
    }

    //Xóa học kỳ năm học
    protected function delete_year($id_year)
    {
        NamHoc::destroy($id_year);
        return redirect()->back()->with('success', 'Đã Xóa năm học');
    }

    //Thêm học kỳ năm học CSDL
    protected function post_add_semester_year(Request $request)
    {
        $this->validate($request, [
            'inputYear'  => 'unique:nam_hocs,nam'
        ],[
            'inputYear.unique' => 'Tên Năm học đã tồn tại'
        ]);
        $add_semester_year = new NamHoc();
        $add_semester_year->nam = $request->input('inputYear');
        $add_semester_year->save();

        return redirect()->back()->with('success', 'Đã Thêm năm học');
    }

    //Trang đề kiểm tra
    protected function page_test_subject()
    {
        $show_test_subjecs = DeKiemTra::where('ma_gv', Auth::id())->latest()->paginate(5);
        return view('teacher.page.test_subject',['show_test_subjecs'=>$show_test_subjecs]);
    }

    //Xóa đề kiểm tra
    protected function delete_test_subject($id_test)
    {
        DeKiemTra::destroy($id_test);
        return redirect()->back()->with('success', 'Đã Xóa đề kiểm tra');
    }

    //Kích hoạt đề kiểm tra
    protected function active_test_subject($id_test)
    {
        DeKiemTra::where('id', $id_test)->update(['trang_thai' => 1]);
        return redirect()->back()->with('success', 'Đã Kích hoạt đề kiểm tra');
    }

    //Hủy Kích hoạt đề kiểm tra
    protected function inactive_test_subject($id_test)
    {
        DeKiemTra::where('id', $id_test)->update(['trang_thai' => 0]);
        return redirect()->back()->with('success', 'Đã Hủy kích hoạt đề kiểm tra');
    }

    //Xem kết quả kiểm tra
    protected function page_result_test($id_user)
    {
        $user_ids = User::find($id_user);
        $view_result_tests = DeKiemTra::where([['ma_gv','=',$id_user],['trang_thai','=',1]])->latest()->paginate(20);
        return view('teacher.page.page_result_test',
        ['user_ids'=>$user_ids, 'view_result_tests'=>$view_result_tests]);
    }

    //Xem chi tiết kết quả kiểm tra
    protected function view_detail_result_test($id_user, $id_test)
    {
        $user_ids = User::find($id_user);
        $test_ids = DeKiemTra::find($id_test);
        $detail_result_tests = KetQua::where('de_kiem_tra',$id_test)->latest()->paginate(20);

        return view('teacher.page.page_detail_result_test',
        ['user_ids'=>$user_ids, 'test_ids'=>$test_ids, 'detail_result_tests'=>$detail_result_tests]);
    }

    //Xem chi tiết đề kiểm tra
    protected function view_detail_test_subject($id_test)
    {
        $detail_tests = DeKiemTra::find($id_test);
        $show_subject_tests = MonHoc::where('id',$detail_tests->mon_hoc)->first();
        $details = ChiTietDe::where('de_kiem_tra', $id_test)->paginate(20);
        return view('teacher.page.view_detail_test_subject',
        [
            'detail_tests'=>$detail_tests,
            'show_subject_tests'=>$show_subject_tests,
            'details'=>$details
        ]);
    }

    //Thêm đề kiểm tra
    protected function post_add_test_subject(Request $request)
    {
        $add_test_subject = new DeKiemTra();
        $add_test_subject->ma_gv = Auth::id();
        $add_test_subject->ten_de = $request->input('inputTestName');
        $add_test_subject->mat_khau = $request->input('inputTestPassword');
        $add_test_subject->muc_kiem_tra = $request->input('inputLevelTestId');
        $add_test_subject->nam_hoc = $request->input('inputYearId');
        $add_test_subject->mon_hoc = $request->input('inputSubjectId');
        $add_test_subject->loai_kiem_tra = $request->input('inputTypeTestId');
        $add_test_subject->thoi_gian = $request->input('inputTime');
        $add_test_subject->so_cau = $request->input('inputNumberQuestion');
        $add_test_subject->trang_thai = 0; //Chưa kích hoạt đề thi
        $add_test_subject->save();

        //Lấy để kiểm tra mới lớn nhất vừa thêm
        $test_latest = DB::table('de_kiem_tras')->latest()->first();


        //Thêm dữ liệu các câu hỏi vào bảng chi tiết đề kiểm tra
        $questions = DB::table('cau_hois')->get();

        foreach ($questions as $key => $question){
            $add_test_detail = new ChiTietDe();
            $add_test_detail->cau_hoi = $question->id;
            $add_test_detail->de_kiem_tra = $test_latest->id;
            $add_test_detail->save();

            //Lấy tất cả chi tiết đề
            $detail_tests = DB::table('chi_tiet_des')->get();

            //Tạo mới để ngoài vòng lặp nhé
            $add_detail_question = new ChiTietCauHoi();

            foreach ($detail_tests as $detail_test){
                $get_questions = DB::table('cau_hois')->where('id', $detail_test->cau_hoi)->get();
                foreach ($get_questions as $get_question){
                    $add_detail_question->noi_dung = $get_question->noi_dung;
                    $add_detail_question->a = $get_question->a;
                    $add_detail_question->b = $get_question->b;
                    $add_detail_question->c = $get_question->c;
                    $add_detail_question->d = $get_question->d;
                    $add_detail_question->dap_an = $get_question->dap_an_dung;
                    $add_detail_question->chi_tiet_de = $detail_test->id;
                    $add_detail_question->save();
                }
            }

            $count_detail_test = DB::table('chi_tiet_des')->count();
            if ($count_detail_test == $test_latest->so_cau) {
                break;
            }else{
                continue;
            }
        }
        return redirect()->back()->with('success', 'Đã Thêm đề kiểm tra');
    }
    //=====================================================================







    //=====================================================================
    public function addTeacher(){
        return view('vendor.voyager.users.add_teacher');
    }

    public function postAddTeacher(Request $request){

        $teacher = new User;
        $tbl_teacher = new GiaoVien;
        $teacher->role_id = 3;
        $teacher->name = $request->input('name');
        $teacher->ma_gv = $request->input('code');
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
