@extends('layout.layout_teacher')
@section('title', 'Đề kiểm tra')

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
                        <li class="breadcrumb-item active">Đề kiểm tra</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
{{--=============================================================--}}


{{--=============================================================--}}
{{--Nội dung chính--}}
@section('content')

    <style>
        #text-danger:hover{
            color: white;
            text-shadow: 1px 1px 1px black, 0 0 25px blue, 0 0 5px darkblue;
        }
        #text-success:hover{
            color: white;
            text-shadow: 1px 1px 1px black, 0 0 25px blue, 0 0 5px darkblue;
        }
    </style>

    <!-- Modal Test Subject-->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-add-test-subject') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>TẠO ĐỀ KIỂM TRA</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên đề kiểm tra</label>
                            <input type="text" class="form-control" name="inputTestName" required placeholder="Nhập tên đề kiểm tra">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu đề kiểm tra</label>
                            <input type="text" class="form-control" name="inputTestPassword" required placeholder="Nhập mật khẩu đề kiểm tra">
                        </div>
                        <div class="form-group">
                            <label for="">Môn học</label>
                            <select class="form-control" name="inputSubjectId" required>
                                <option value="">- - Chọn - -</option>
                                @php($subjects = DB::table('mon_hocs')->get())
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->ma_mon_hoc }} - {{ $subject->ten_mon_hoc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Mức kiểm tra (Độ khó)</label>
                            <select name="inputLevelTestId" class="form-control" required>
                                <option value="">- - Chọn - -</option>
                                @php($level_tests = DB::table('muc_kiem_tras')->get())
                                @foreach($level_tests as $level_test)
                                    <option value="{{ $level_test->id }}">{{ $level_test->ten_muc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Năm học</label>
                            <select name="inputYearId" class="form-control" required>
                                <option value="">- - Chọn - -</option>
                                @php($years = DB::table('nam_hocs')->get())
                                @foreach($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->nam }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Loại kiểm tra</label>
                            <select name="inputTypeTestId" class="form-control" required>
                                <option value="">- - Chọn - -</option>
                                @php($type_tests = DB::table('loai_kiem_tras')->get())
                                @foreach($type_tests as $type_test)
                                    <option value="{{ $type_test->id }}">{{ $type_test->ten_loai }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Thời gian</label>
                            <select name="inputTime" class="form-control" required>
                                <option value="">- - Chọn - -</option>
                                @php($type_tests = DB::table('loai_kiem_tras')->get())
                                @foreach($type_tests as $type_test)
                                    <option value="{{ $type_test->thoi_gian }}">{{ $type_test->thoi_gian }} phút</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số câu hỏi</label>
                            <input type="number" name="inputNumberQuestion" class="form-control" placeholder="Nhập số lượng câu hỏi" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Modal Test Subject-->

    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12">

                    <!-- Message -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <!-- /Message -->

                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>ĐỀ KIỂM TRA</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-plus"></i> Tạo đề thi
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:2%;">STT</th>
                                        <th scope="col" style="width:13%;">Mật khẩu</th>
                                        <th scope="col" style="width:15%;">Tên đề</th>
                                        <th scope="col" style="width:11%;">GV khởi tạo</th>
                                        <th scope="col" style="width:11%;">Môn học</th>
                                        <th scope="col" style="width:11%;">Năm học</th>
                                        <th scope="col" style="width:11%;">Loại kiểm tra</th>
                                        <th scope="col" style="width:11%;">Số câu hỏi</th>
                                        <th scope="col" style="width:11%;">Trạng thái</th>
                                        <th scope="col" style="width:5%;" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_test_subjecs as $key => $show_test_subjec)
                                    <tr>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Mật khẩu đề"><b>{{ $show_test_subjec->mat_khau }}</b></td>
                                        <td data-label="Tên đề"><b>{{ $show_test_subjec->ten_de }}</b></td>
                                        <td data-label="GV khởi tạo">
                                            @php($users = DB::table('users')->where('id',$show_test_subjec->ma_gv)->get())
                                            @foreach($users as $user)
                                            <b>{{ $user->name }}</b>
                                            @endforeach
                                        </td>
                                        <td data-label="Môn học">
                                            @php($subjects = DB::table('mon_hocs')->where('id',$show_test_subjec->mon_hoc)->get())
                                            @foreach($subjects as $subject)
                                                <b>{{ $subject->ten_mon_hoc }}</b>
                                            @endforeach
                                        </td>
                                        <td data-label="Năm học">
                                            @php($years = DB::table('nam_hocs')->where('id',$show_test_subjec->nam_hoc)->get())
                                            @foreach($years as $year)
                                                {{ $year->nam }}
                                            @endforeach
                                        </td>
                                        <td data-label="Loại kiểm tra">
                                            @php($type_tests = DB::table('loai_kiem_tras')->where('id',$show_test_subjec->loai_kiem_tra)->get())
                                            @foreach($type_tests as $type_test)
                                                {{ $type_test->ten_loai }}
                                            @endforeach
                                        </td>
                                        <td data-label="Số câu hỏi">
                                            {{ $show_test_subjec->so_cau }} câu
                                        </td>
                                        <td data-label="Trạng thái">
                                            @if ($show_test_subjec->trang_thai == 0 )
                                                <a href="{{ url('active-test-subject/'.$show_test_subjec->id) }}" title="Nhấp để Kích hoạt">
                                                    <b class="text-danger" id="text-danger">Chưa kích hoạt</b>
                                                </a>
                                            @else
                                                <a href="{{ url('inactive-test-subject/'.$show_test_subjec->id) }}" title="Nhấp để Hủy kích hoạt">
                                                    <b class="text-success" id="text-success">Đã kích hoạt</b>
                                                </a>
                                            @endif
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?')"
                                            href="{{ url('delete-test-subject/'.$show_test_subjec->id) }}" role="button" title="Xóa">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-success btn-xs"
                                            href="{{ url('view-detail-test-subject/'.$show_test_subjec->id) }}" role="button" title="Xem chi tiết đề kiểm tra">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
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

@endsection
{{--=============================================================--}}
