<!--Header-part-->
<div id="header">
    <h1><a href="{{ url('/student') }}">Hệ Thống Quản Lý</a></h1>
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
    <a href="{{ url('/student') }}" class="visible-phone"><i class="icon icon-home"></i> Trang chủ</a>
    <ul>
        <li class="active"><a href="{{ url('/student') }}"><i class="icon icon-home"></i> <span>Trang chủ</span></a> </li>
        <li> <a href="{{ url('/exam-online') }}"><i class="icon icon-signal"></i> <span>Thi trực tuyến</span></a> </li>
        <li> <a href=""><i class="icon icon-inbox"></i> <span>Học Phần</span></a> </li>
        <li><a href=""><i class="icon icon-th"></i> <span>Kết quả học</span></a></li>
        <li><a href=""><i class="icon icon-fullscreen"></i> <span>Phòng học</span></a></li>
    </ul>
</div>
