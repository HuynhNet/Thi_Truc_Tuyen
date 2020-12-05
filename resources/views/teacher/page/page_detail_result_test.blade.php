@extends('layout.layout_teacher')
@section('title', 'Chi tiết kết quả kiểm tra')

{{--=============================================================--}}
{{--Phân cấp cha con--}}
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                </div><!-- /.col -->
                <div class="col-sm-10">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-teacher') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-result-test/'.$user_ids->id) }}">Kết quả kiểm tra</a></li>
                        <li class="breadcrumb-item active">Chi tiết kết quả kiểm tra</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
{{--=============================================================--}}


{{--=============================================================--}}
{{--Nội dung chính--}}
@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b><i class="ion ion-clipboard mr-1"></i> CHI TIẾT ĐỀ KIỂM TRA</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">

                            <!-- Title -->
                            <div class="row m-2">
                                <div class="col-sm-12">
                                    <h5><b style="text-transform: uppercase;">KẾT QUẢ THI {{ $test_ids->ten_de }}</b></h5>
                                    <h6>
                                        Môn học:
                                        @php($subjects = DB::table('mon_hocs')->where('id',$test_ids->mon_hoc)->get())
                                        @foreach($subjects as $subject)
                                            <b>{{ $subject->ten_mon_hoc }}</b>
                                        @endforeach
                                    </h6>
                                    <h6>
                                        Loại kiểm tra:
                                        @php($type_tests = DB::table('loai_kiem_tras')->where('id',$test_ids->loai_kiem_tra)->get())
                                        @foreach($type_tests as $type_test)
                                            <b>{{ $type_test->ten_loai }}</b>
                                        @endforeach
                                    </h6>
                                    <h6>
                                        Năm học:
                                        @php($years = DB::table('nam_hocs')->where('id',$test_ids->nam_hoc)->get())
                                        @foreach($years as $year)
                                            <b>{{ $year->nam }}</b>
                                        @endforeach
                                    </h6>
                                </div>
                            </div>
                            <!-- /Title -->

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:3%;">STT</th>
                                        <th scope="col" style="width:26%;">Họ và tên</th>
                                        <th scope="col" style="width:10%;">Điểm thi 10/10</th>
                                        <th scope="col" style="width:13%;">Xếp loại</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($detail_result_tests as $key => $result_test)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Họ và tên:&ensp;">
                                                @php($get_students = DB::table('users')->where('ma_hs', $result_test->ma_hs)->get())
                                                @foreach($get_students as $get_student)
                                                <b>{{ $get_student->name }}</b>
                                                @endforeach
                                            </td>
                                            <td data-label="Điểm thi:&ensp;" class="text-center">
                                                <b>{{ $result_test->diem }}</b>
                                            </td>
                                            <td data-label="Xếp loại:&ensp;" class="text-center">
                                                <b>{{ $result_test->xep_loai }}</b>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm" style="margin:20px 0">
                                {{ $detail_result_tests->links() }}
                            </ul>
                            <!-- /pagination -->

                        </div>
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>



    <script>
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        function validateForm() {
            var x = document.forms["myForm"]["fileExcel"].value;
            if (x == "") {
                alert("Vui lòng chọn File Excel");
                return false;
            }
        }
    </script>

@endsection
{{--=============================================================--}}
