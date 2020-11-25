@extends('layout.layout_teacher')
@section('title', 'Câu hỏi môn học')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-subject') }}">Môn học</a></li>
                        <li class="breadcrumb-item active">Câu hỏi môn học</li>
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

    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                CÂU HỎI MÔN <b style="text-transform: uppercase;">[ {{ $view_subject->ten_mon_hoc }} ]</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-success btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-file-excel"></i> Nhập tệp
                                </a>
                                <a class="btn btn-primary btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelAddQuestion">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:3%;">STT</th>
                                        <th scope="col" style="width:18%;">Nội dung</th>
                                        <th scope="col" style="width:10%;">Hình ảnh</th>
                                        <th scope="col" style="width:13%;">Đáp án A</th>
                                        <th scope="col" style="width:13%;">Đáp án B</th>
                                        <th scope="col" style="width:13%;">Đáp án C</th>
                                        <th scope="col" style="width:13%;">Đáp án D</th>
                                        <th scope="col" style="width:13%;">Đúng</th>
                                        <th scope="col" colspan="2" style="width:15%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Nội dung:&ensp;" class="text-justify">
                                            <b>
                                                Giá cả sản xuất tư bản chủ nghĩa bao gồm những bộ phận nào?
                                            </b>
                                        </td>
                                        <td data-label="Hình ảnh:&ensp;">
                                            <a href="{{ url('public/images/qpan.jpg') }}">
                                                <img src="{{ url('public/images/qpan.jpg') }}" class="img-fluid rounded-top"
                                                     style="max-width:100%;height:60px;">
                                            </a>
                                        </td>
                                        <td data-label="Đáp án A:&ensp;" class="text-justify">
                                            Chi phí sản xuất cộng với lợi nhuận bình quân
                                        </td>
                                        <td data-label="Đáp án B:&ensp;" class="text-justify">
                                            Toàn bộ chi phí bỏ ra trong quá trình sản xuất.
                                        </td>
                                        <td data-label="Đáp án C:&ensp;" class="text-justify">
                                            Giá cả thị trường trừ đi lợi nhuận của nhà tư bản công nghiệp.
                                        </td>
                                        <td data-label="Đáp án D:&ensp;" class="text-justify">
                                            Giá trị của hàng hoá cộng với lợi nhuận của nhà tư bản công nghiệp.
                                        </td>
                                        <td data-label="Đáp án đúng:&ensp;" class="text-center">
                                            <b class="text-success" style="text-transform: uppercase;">
                                                A
                                            </b>
                                        </td>
                                        <td data-label="Chọn:&ensp;">
                                            <a class="btn btn-primary btn-xs"
                                               href="{{ url('edit-question-subject') }}" role="button" title="Chỉnh sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn:&ensp;">
                                            <a class="btn btn-danger btn-xs"
                                               href="{{ url('delete-question-subject') }}" role="button" title="Xem câu hỏi">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
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


    <!-- Modal Import File Excel-->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url('import-file-excel') }}" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title"><b>NHẬP TỆP FILE EXCEL</b></h6>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Chọn file Excel</label> <br>
                            <input type="file" required name="fileExcel"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-close"></i> Đóng</button>
                        <button type="submit" class="btn btn-primary btn-sm">Nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Import File Excel-->


    <!-- Modal Add Question-->
    <div class="modal fade" id="modelAddQuestion" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h6 class="modal-title"><b>THÊM CÂU HỎI MỚI</b></h6>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="" rows="3" class="form-control" placeholder="Nhập nội dung câu hỏi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label> <br>
                            <input type="file" id="file" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Đáp án A</label>
                            <textarea name="" rows="2" class="form-control" placeholder="Nhập nội dung đáp án"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Đáp án B</label>
                            <textarea name="" rows="2" class="form-control" placeholder="Nhập nội dung đáp án"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Đáp án C</label>
                            <textarea name="" rows="2" class="form-control" placeholder="Nhập nội dung đáp án"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Đáp án D</label>
                            <textarea name="" rows="2" class="form-control" placeholder="Nhập nội dung đáp án"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn đáp án Đúng</label>
                            <input name="" type="text" class="form-control" placeholder="Nhập đáp án đúng VD: A">
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
    </div>
    <!-- Modal Add Question-->


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
