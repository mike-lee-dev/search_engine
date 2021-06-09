<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>等級別検索サイト</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="_csrf" content="{{csrf_token()}}"/>
    <link rel="icon" href="{{asset('img/icon.png')}}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{asset('admin_tmp/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['admin_tmp/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('admin_tmp/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_tmp/css/atlantis.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('admin_tmp/css/demo.css')}}">
    @yield('page-css')
</head>
<body>
<div class="wrapper">
    <!-- Main navbar -->
    @include('admin.layouts.navbar')
    <!-- /main navbar -->
        <!-- Sidebar area -->
    @include('admin.layouts.sidebar')
    <!-- /Sidebar area -->

    <div class="main-panel">
        <div class="container">
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright ml-auto">
                    Copyright © 2021 株式会社日本スマートマーケティング
                    All Rights Reserved.
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('admin_tmp/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('admin_tmp/js/core/popper.min.js')}}"></script>
<script src="{{asset('admin_tmp/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('admin_tmp/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('admin_tmp/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('admin_tmp/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Moment JS -->
<script src="{{asset('admin_tmp/js/plugin/moment/moment.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('admin_tmp/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('admin_tmp/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('admin_tmp/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- Bootstrap Toggle -->
<script src="{{asset('admin_tmp/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

<!-- Dropzone -->
<script src="{{asset('admin_tmp/js/plugin/dropzone/dropzone.min.js')}}"></script>

<!-- Fullcalendar -->
<script src="{{asset('admin_tmp/js/plugin/fullcalendar/fullcalendar.min.js')}}"></script>

<!-- DateTimePicker -->
<script src="{{asset('admin_tmp/js/plugin/datepicker/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Bootstrap Tagsinput -->
<script src="{{asset('admin_tmp/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>

<!-- Bootstrap Wizard -->
<script src="{{asset('admin_tmp/js/plugin/bootstrap-wizard/bootstrapwizard.js')}}"></script>

<!-- jQuery Validation -->
<script src="{{asset('admin_tmp/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('admin_tmp/js/plugin/summernote/summernote-bs4.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('admin_tmp/js/plugin/select2/select2.full.min.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('admin_tmp/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Owl Carousel -->
<script src="{{asset('admin_tmp/js/plugin/owl-carousel/owl.carousel.min.js')}}"></script>

<!-- Magnific Popup -->
<script src="{{asset('admin_tmp/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<!-- Atlantis JS -->
<script src="{{asset('admin_tmp/js/atlantis.min.js')}}"></script>

<script>

</script>
</body>
</html>
