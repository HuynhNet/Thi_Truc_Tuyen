@extends('student.layout.master_test')
@section('title', 'Result')
@section('content')
    <br><br>
    <div class="container-fluid">
        <div class="span12">
            <h3 style="text-align: center">Kết Quả - Kiểm tra {{ $thoiGian }} phút</h3>
            <p style="text-align: center">{{ $tenMonHoc }}</p>
            <br><br>
            <table class="table">
                <thead style="padding-left: 30px;">
                    <tr>
                        <th>Họ và tên</th>
                        <th>Số câu trả lời đúng</th>
                        <th>Điểm số</th>
                        <th>Xếp loại</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td scope="row">
                            <p>{{ $tenHS }}</p>
                        </td>
                        <td>{{ $soCauDung }}/{{ $tongCauHoi }}</td>
                        <td>{{ $diem }}</td>
                        <td>{{ $xepLoai }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
