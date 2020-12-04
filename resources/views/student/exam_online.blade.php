@extends('student.layout.master')
@section('title', 'Exam online')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span4">
                <h4>Danh sách môn học</h4>
                <hr>
                <ul>
                    @foreach($monHoc as $monHoc)
                        <li>
                            <a href="">{{ $monHoc->ten_mon_hoc }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="span5">
                <h4>Thông tin môn học</h4>
                <hr>
                <div style="border: 1px solid #1a1a1a; border-radius: 5px; padding-left: 10px; padding-right: 10px;">
                    <h5><strong>- Thông báo đổi phòng học</strong></h5>
                    <span>01/11/2020 - Thay đổi sang phòng 105</span>
                    <hr style="border-bottom: 1px solid black;">

                    <h5><strong>- Thông báo đổi phòng học</strong></h5>
                    <span>01/12/2020 - Thay đổi sang phòng 109</span>
                    <hr style="border-bottom: 1px solid black;">

                    <h5><strong>- Thi cuối kỳ</strong></h5>
                    <span><a target="_blank" href="{{ url('/check-account', 1) }}">Bắt đầu thi</a></span>
                    <hr style="border-bottom: 1px solid black;">
                </div>

            </div>

            <div class="span3">
                <h4>Tìm kiếm môn học</h4>
                <hr>
                <form action="">
                    <div class="span5">
                        <div class="form-group">
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="form-group" style="float:right;">
                        <a type="submit" href="" class="btn btn-default">Tìm</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
