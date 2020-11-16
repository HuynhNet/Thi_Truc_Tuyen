@extends('layout.layout_teacher')
@section('title', 'Trang loại kiểm tra')

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
                        <li class="breadcrumb-item active">Loại kiểm tra</li>
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
                <section class="col-lg-6">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>THÊM LOẠI KIỂM TRA</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Tên loại kiểm tra</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="Nhập tên loại kiểm tra">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Số phút kiểm tra</label>
                                        <input type="number" name="" class="form-control" placeholder="Nhập số phút kiểm tra">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>


                <section class="col-lg-6">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>LOẠI KIỂM TRA</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên loại kiểm tra</th>
                                        <th scope="col">Số phút kiểm tra</th>
                                        <th scope="col">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Tên loại kiểm tra">
                                            <b>Kiểm tra 15 phút</b>
                                        </td>
                                        <td data-label="Số phút kiểm tra">
                                            <h6><b>15</b> phút</h6>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-xs"
                                               href="{{ url('/') }}" role="button" title="Xóa">
                                                <i class="fa fa-trash"></i> Xóa
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
