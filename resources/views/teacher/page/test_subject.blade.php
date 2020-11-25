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


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>TẠO ĐỀ KIỂM TRA</b></h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Môn học</label>
                        <select name="" class="form-control">
                            <option value="">- - Chọn - -</option>
                            <option value="">Quốc Phòng Đại Cương 1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Mức kiểm tra (Độ khó)</label>
                        <select name="" class="form-control">
                            <option value="">- - Chọn - -</option>
                            <option value="">Dễ</option>
                            <option value="">Trung Bình</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Năm học - Học kỳ</label>
                        <select name="" class="form-control">
                            <option value="">- - Chọn - -</option>
                            <option value="">Học kỳ 1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Thời gian</label>
                        <select name="" class="form-control">
                            <option value="">- - Chọn - -</option>
                            <option value="">15 phút</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Số câu hỏi</label>
                        <input type="number" name="" class="form-control" placeholder="Nhập số lượng câu hỏi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary btn-sm">Thêm</button>
                </div>
            </div>
        </div>
    </div>

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
                                <b>ĐỀ KIỂM TRA</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-plus"></i> Tạo đề
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">GV khởi tạo</th>
                                        <th scope="col">Môn học</th>
                                        <th scope="col">Độ khó</th>
                                        <th scope="col">Năm học - Học kỳ</th>
                                        <th scope="col">Loại kiểm tra</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Số câu hỏi</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="GV khởi tạo">
                                            <b>Nguyễn Văn Bé Anh</b>
                                        </td>
                                        <td data-label="Môn học">
                                            <b>Quốc Phòng Đại Cương 1</b>
                                        </td>
                                        <td data-label="Độ khó">
                                            Trung bình
                                        </td>
                                        <td data-label="Năm học - Học kỳ">
                                            Học kỳ 1 - Năm 2020
                                        </td>
                                        <td data-label="Loại kiểm tra">Kiểm tra 15 phút
                                        </td>
                                        <td data-label="Loại kiểm tra">
                                            15 phút
                                        </td>
                                        <td data-label="Số câu hỏi">
                                            40 câu
                                        </td>
                                        <td data-label="Trạng thái">
                                            <b class="text-danger">Đã khóa</b>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-xs"
                                               href="{{ url('/') }}" role="button" title="Xóa">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-success btn-xs"
                                               href="{{ url('/') }}" role="button" title="Nhập câu hỏi vào đề">
                                                <i class="fa fa-plus"></i>
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
