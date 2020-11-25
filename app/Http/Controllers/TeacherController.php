<?php

namespace App\Http\Controllers;

use App\GiaoVien;
use App\Http\Controllers\Controller;
use App\Imports\CauHoiImport;
use App\Models\User;
use App\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
    protected function edit_question_subject()
    {
        return view('teacher.page.edit_question_subject');
    }

    //Trang xem câu hỏi môn học
    protected function view_question_subject($id_subject)
    {
        $view_subject = MonHoc::find($id_subject);
        return view('teacher.page.view_question_subject',['view_subject'=>$view_subject]);
    }

    //Nhập vào câu hỏi môn học
    protected function import_file_excel(Request $request)
    {
        Excel::import(new CauHoiImport, $request->file('fileExcel')
            ->move(public_path('upload_file_excel'), $request->file('fileExcel')));
        return back();
    }

    //Trang loại kiểm tra thi cử
    protected function page_type_test()
    {
        return view('teacher.page.page_type_test');
    }

    //Trang mức độ kiểm tra thi cử
    protected function page_level_test()
    {
        return view('teacher.page.page_level_test');
    }

    //Trang học kỳ năm học
    protected function page_semester_year()
    {
        return view('teacher.page.page_semester_year');
    }

    //Trang đề kiểm tra
    protected function page_test_subject()
    {
        return view('teacher.page.test_subject');
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
