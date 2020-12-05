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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ url('public/images/logo-quan-su.png') }}">
    <link rel="stylesheet" href="{{ asset('public/student/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/student/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/student/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/student/css/maruti-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/student/css/maruti-media.css') }}" class="skin-color" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/student/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('public/student/css/student.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

    @include('student.layout.header_student')

    <div id="content">

        <div id="content-header">
            <div id="breadcrumb">
            </div>
        </div>

        @yield('content')
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

    <script>
        function checkLogout(e){
            if(confirm('Bạn có chắc muốn đăng xuất?')){
                $.ajax({
                    url: '{{ route('studentLogout') }}',
                    method: "get",
                });
            }else{
                e.preventDefault();
            }
        }
    </script>
</body>

</html>
