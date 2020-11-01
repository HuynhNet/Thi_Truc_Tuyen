<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin,
          bootstrap 4, css3 dashboard, bootstrap 4 dashboard, maruti admin bootstrap 4 dashboard, frontend,
          responsive bootstrap 4 admin template, maruti design, maruti dashboard bootstrap 4 dashboard template">
    <meta name="description"
          content="Maruti is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Student</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/maruti-admin/" />
    <link rel="stylesheet" href="{{ asset('public/student/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/student/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/student/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/student/css/maruti-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/student/css/maruti-media.css') }}" class="skin-color" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/student/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('public/student/css/student.css') }}">
</head>

<body>

<!--Header-part-->
<div id="header">
    <h1><a href="">Hệ Thống Quản Lý</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-messaages-->
<div class="btn-group rightzero">
    <a class="top_message tip-left" title="Manage Files">
        <i class="icon-file"></i>
    </a>
    <a class="top_message tip-bottom" title="Manage Users">
        <i class="icon-user"></i>
    </a>
    <a class="top_message tip-bottom" title="Manage Comments">
        <i class="icon-comment"></i>
        <span class="label label-important">5</span>
    </a>
    <a class="top_message tip-bottom" title="Manage Orders">
        <i class="icon-shopping-cart"></i>
    </a>
</div>
<!--close-top-Header-messaages-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="">
            <a title="" href="#">
                <i class="icon icon-user"></i>
                <span class="text">Thông tin</span>
            </a>
        </li>
        <li class="">
            <a title="" href="">
                <i class="icon icon-share-alt"></i>
                <span class="text">Đăng xuất</span>
            </a>
        </li>
    </ul>
</div>
<!--close-top-Header-menu-->

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> Trang chủ</a>
    <ul>
        <li class="active"><a href=""><i class="icon icon-home"></i> <span>Trang chủ</span></a> </li>
        <li> <a href=""><i class="icon icon-signal"></i> <span>Thi trực tuyến</span></a> </li>
        <li> <a href=""><i class="icon icon-inbox"></i> <span>Học Phần</span></a> </li>
        <li><a href=""><i class="icon icon-th"></i> <span>Kết quả học</span></a></li>
        <li><a href=""><i class="icon icon-fullscreen"></i> <span>Phòng học</span></a></li>
    </ul>
</div>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
        </div>
    </div>

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
</div>
</div>
</div>
<div class="row-fluid">
    <div id="footer" class="span12"> 2020 &copy; Hệ thống quản lý sinh viên
        <a href=""></a>
    </div>
</div>
<script src="{{ asset('public/student/js/excanvas.min.js') }}"></script>
<script src="{{ asset('public/student/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/student/js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('public/student/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/student/js/jquery.flot.min.js') }}"></script>
<script src="{{ asset('public/student/js/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('public/student/js/jquery.peity.min.js') }}"></script>
<script src="{{ asset('public/student/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('public/student/js/maruti.js') }}"></script>
<script src="{{ asset('public/student/js/maruti.dashboard.js') }}"></script>
<script src="{{ asset('public/student/js/maruti.chat.js') }}"></script>


<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage(newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-") {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>

</html>
