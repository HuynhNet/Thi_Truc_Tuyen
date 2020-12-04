@extends('layout.layout_teacher')
@section('title', 'Chi tiết đề kiểm tra')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-test-subject') }}">Đề kiểm tra</a></li>
                        <li class="breadcrumb-item active">Chi tiết đề kiểm tra</li>
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

    <!-- Modal Add Question-->
    {{--<div class="modal fade" id="modelAddQuestion" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url('post-add-question-subject/'.$view_subject->id) }}" enctype="multipart/form-data"
                      class="needs-validation" novalidate method="POST">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title"><b>THÊM CÂU HỎI MỚI</b></h6>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="inputContent" rows="3" class="form-control" placeholder="Nhập nội dung câu hỏi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label> <br>
                            <input type="file" id="file" name="inputFileImage"/>
                        </div>
                        <div class="form-group">
                            <label for="">Đáp án A</label>
                            <textarea name="inputA" rows="2" class="form-control" placeholder="Nhập nội dung đáp án" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Đáp án B</label>
                            <textarea name="inputB" rows="2" class="form-control" placeholder="Nhập nội dung đáp án" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Đáp án C</label>
                            <textarea name="inputC" rows="2" class="form-control" placeholder="Nhập nội dung đáp án" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Đáp án D</label>
                            <textarea name="inputD" rows="2" class="form-control" placeholder="Nhập nội dung đáp án" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn đáp án Đúng</label>
                            <select name="inputCorrect" class="form-control">
                                <option value="">- - Chọn Đáp án - -</option>
                                <option value="A">Đáp án A</option>
                                <option value="B">Đáp án B</option>
                                <option value="C">Đáp án C</option>
                                <option value="D">Đáp án D</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-close"></i> Đóng
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>--}}
    <!-- Modal Add Question-->


    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12">

                    <!-- Message -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('fileExcel') }}</strong>
                        </div>
                    @endif

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
                                <b><i class="ion ion-clipboard mr-1"></i> CHI TIẾT ĐỀ KIỂM TRA</b>
                            </h3>
                            <div class="card-tools">
                                {{--<a class="btn btn-success btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-file-excel"></i> Nhập tệp
                                </a>
                                <a class="btn btn-primary btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelAddQuestion">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>--}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">

                            <!-- Title -->
                            <div class="row m-2">
                                <div class="col-sm-12">
                                    <h5><b style="text-transform: uppercase;">ĐỀ {{ $detail_tests->ten_de }}</b></h5>
                                    <h6>
                                        Môn học:
                                        <b>{{ $show_subject_tests->ten_mon_hoc }}</b>
                                    </h6>
                                    <h6>
                                        Giáo viên ra đề:
                                        @php($users = DB::table('users')->where('id',$detail_tests->ma_gv)->get())
                                        @foreach($users as $user)
                                            <b>{{ $user->name }}</b>
                                        @endforeach
                                    </h6>
                                    <h6>
                                        Loại kiểm tra:
                                        @php($type_tests = DB::table('loai_kiem_tras')->where('id',$detail_tests->loai_kiem_tra)->get())
                                        @foreach($type_tests as $type_test)
                                            <b>{{ $type_test->ten_loai }}</b>
                                        @endforeach
                                    </h6>
                                    <h6>
                                        Mức độ kiểm tra:
                                        @php($level_tests = DB::table('muc_kiem_tras')->where('id',$detail_tests->muc_kiem_tra)->get())
                                        @foreach($level_tests as $level_test)
                                            <b>{{ $level_test->ten_muc }}</b>
                                        @endforeach
                                    </h6>
                                    <h6>
                                        Thời gian kiểm tra: <b>{{ $detail_tests->thoi_gian }} Phút</b>
                                    </h6>
                                    <h6>
                                        Số câu hỏi: <b>{{ $detail_tests->so_cau }} câu</b>
                                    </h6>
                                    <h6>
                                        Năm học:
                                        @php($years = DB::table('nam_hocs')->where('id',$detail_tests->nam_hoc)->get())
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
                                        <th scope="col" style="width:26%;">Nội dung</th>
                                        <th scope="col" style="width:10%;">Hình ảnh</th>
                                        <th scope="col" style="width:13%;">Đáp án A</th>
                                        <th scope="col" style="width:13%;">Đáp án B</th>
                                        <th scope="col" style="width:13%;">Đáp án C</th>
                                        <th scope="col" style="width:13%;">Đáp án D</th>
                                        <th scope="col" style="width:5%;">Đúng</th>
                                        <th scope="col" colspan="2" style="width:15%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_questions as $key => $show_question)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Nội dung:&ensp;" class="text-justify">
                                                <b>{{ $show_question->noi_dung }}</b>
                                            </td>
                                            <td data-label="Hình ảnh:&ensp;">
                                                @if($show_question->hinh_anh != null)
                                                    <a href="{{ url('public/image_question_subject/'.$show_question->hinh_anh) }}">
                                                        <img src="{{ url('public/image_question_subject/'.$show_question->hinh_anh) }}"
                                                             style="max-width:100%;height:60px;border-radius:5px;box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                                                    </a>
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Đáp án A:&ensp;" class="text-justify">
                                                {{ $show_question->a }}
                                            </td>
                                            <td data-label="Đáp án B:&ensp;" class="text-justify">
                                                {{ $show_question->b }}
                                            </td>
                                            <td data-label="Đáp án C:&ensp;" class="text-justify">
                                                {{ $show_question->c }}
                                            </td>
                                            <td data-label="Đáp án D:&ensp;" class="text-justify">
                                                {{ $show_question->d }}
                                            </td>
                                            <td data-label="Đáp án đúng:&ensp;" class="text-center">
                                                <b class="text-success" style="text-transform: uppercase;">
                                                    {{ $show_question->dap_an_dung }}
                                                </b>
                                            </td>
                                            <td data-label="Chọn:&ensp;">
                                                <a class="btn btn-primary btn-xs"
                                                   href="{{ url('edit-question-subject/'.$show_subject_tests->id.'/'.$show_question->id) }}" role="button" title="Chỉnh sửa">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td data-label="Chọn:&ensp;">
                                                <a class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?');"
                                                   href="{{ url('delete-question-subject/'.$show_question->id) }}" role="button" title="Xem câu hỏi">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
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
                                {{ $show_questions->links() }}
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
