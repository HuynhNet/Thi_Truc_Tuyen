@extends('layout.layout_teacher')
@section('title', 'Trang môn học')

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
                        <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Môn học</li>
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
                                <b>MÔN HỌC</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
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
                                        <th scope="col">STT</th>
                                        <th scope="col">Mã môn học</th>
                                        <th scope="col">Tên môn học</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Mã môn học">
                                            <b>BP-345</b>
                                        </td>
                                        <td data-label="Tên môn học">
                                            <a href="{{ url('view-question-subject') }}">
                                                <b>Biên phòng cơ bản 1</b>
                                            </a>
                                        </td>
                                        <td data-label="Hình ảnh">
                                            <a href="{{ url('public/images/qpan.jpg') }}">
                                                <img src="{{ url('public/images/qpan.jpg') }}" class="img-fluid rounded-top"
                                                     style="max-width:100%;height:60px;">
                                            </a>
                                        </td>
                                        <td data-label="Trạng thái">
                                            <b class="text-success">Đang dạy</b>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-primary btn-xs"
                                            href="{{ url('edit-subject') }}" role="button" title="Chỉnh sửa">
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-success btn-xs"
                                            href="{{ url('view-question-subject') }}" role="button" title="Xem câu hỏi">
                                                <i class="fa fa-eye"></i> Xem
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


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h6 class="modal-title"><b>THÊM MÔN HỌC</b></h6>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Mã môn học</label>
                            <input type="text" name="" class="form-control" placeholder="Nhập mã môn học" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tên môn học</label>
                            <input type="text" name="" class="form-control" placeholder="Nhập tên môn học" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label> <br>
                            <!-- File input field -->
                            <input type="file" id="file" onchange="return fileValidation()"/>
                            <!-- Image preview -->
                            <div id="imagePreview"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">
                        <i class="fa fa-close"></i> Đóng</button>
                    <button type="submit" class="btn btn-primary btn-xs">Thêm</button>
                </div>
                </form>
            </div>
        </div>
    </div>


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

        function fileValidation(){
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if(!allowedExtensions.exec(filePath)){
                alert('Hình ảnh bắt buộc đuôi .jpeg/.jpg/.png/.gif only.');
                fileInput.value = '';
                return false;
            }else{
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="max-width:100%;height:50px;margin-top:5px;"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>

@endsection
{{--=============================================================--}}
