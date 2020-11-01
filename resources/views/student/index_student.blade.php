@extends('student.layout.master')
@section('title', 'Student')
@section('content')

    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span4 ttsv">
                <h4>Thông tin sinh viên</h4>
                <hr>
                <div class="span3">
                    <p><strong>Mã sinh viên</strong> </p>
                    <p><strong>Họ tên</strong> </p>
                    <p><strong>Ngày sinh</strong> </p>
                    <p><strong>Lớp</strong> </p>
                    <p><strong>Giới tính</strong> </p>
                    <p><strong>Quê quán</strong> </p>
                    <p><strong>Nghành học</strong> </p>
                    <p><strong>Khóa học</strong> </p>
                </div>

                <div class="span5">
                    <p><span>B123456</span></p>
                    <p><span>Nguyễn Văn A</span></p>
                    <p><span>12-03-1998</span></p>
                    <p><span>KT16V1A6</span></p>
                    <p><span>Nam</span></p>
                    <p><span>Cần Thơ</span></p>
                    <p><span>Kỹ huật phần mềm</span></p>
                    <p><span>20 (2020)</span></p>
                </div>

            </div>

            <div class="span3">
                <h4>Thông tin cần biết</h4>
                <hr>
                <ul>
                    <li><a href="">Tin tức - Thông báo</a></li>
                    <li><a href="">Trao đổi ý kiến</a></li>
                    <li><a href="">Danh sách môn học</a></li>
                </ul>
            </div>

            <div class="span3">
                <h4>Danh Mục Môn Học</h4>
                <hr>
                <ul>
                    <li><a href="">Các môn học năm 2020</a></li>
                    <li><a href="">Khóa ngắn hạn</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection


