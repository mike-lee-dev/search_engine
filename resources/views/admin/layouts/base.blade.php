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
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['../admin_tmp/css/fonts.min.css']},
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
    <style>
        .sidebar.sidebar-style-2 .nav.nav-primary > .nav-item.active > a{
            background: #819e33 !important;
        }
        .form-group-default label:not(.error){
            text-transform: none !important;
        }
    </style>

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
    @yield('page-css')
</head>
<body>
<div class="wrapper">
<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

$user = User::where('id', Auth::user()->id)->get()->first();
?>
    <!-- Main navbar -->
    @include('admin.layouts.navbar')
    <!-- /main navbar -->
        <!-- Sidebar area -->
    @include('admin.layouts.sidebar')
    <!-- /Sidebar area -->

    <div class="main-panel">
        <div class="container">
            @yield('content')
            <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">プロファイル</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body py-0">
                            <p class="small">ログイン用パスワードの変更設定ができる</p>
                            <form id="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>管理者名</label>
                                            <label id="admin_name" type="text" name="admin_name" class="mt-2" placeholder="管理者名">
                                                {{$user->username}}
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>メールアドレス</label>
                                            <label id="admin_email" type="email" name="admin_email" class="mt-2" placeholder="メールアドレス">
                                                {{$user->email}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>新規パスワード</label>
                                            <input id="admin_new_password" type="password" name="password" class="form-control" minlength="8" required>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>パスワード確認</label>
                                            <input id="admin_confirm_password" type="password" name="password_confirmation" class="form-control" minlength="8" required>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer border-0 pt-0">
                            <button type="button" id="profile_submit" class="btn btn-success">パスワード変更</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">閉じる</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="home_path" value="<?=url('');?>">
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright ml-auto">
                    Copyright © 2021 株式会社日本スマートマーケティング
                    All Rights Reserved.
                </div>
            </div>
        </footer>

        @yield('page-js')
    </div>
</div>
<script type="text/javascript">
    $('#profile_submit').click(function (e) {
        e.preventDefault();
        let form = $('#form');
        form.validate();
        if (form.valid()) {
            if ($('[name=password]').val() !== $('[name=password_confirmation]').val()) {
                $('[name=password_confirmation]').addClass('is-invalid');
                return false;
            }
            var token = $("meta[name='_csrf']").attr("content");
            var home_path = $("#home_path").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/modify-profile';
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    password: $('[name=password]').val()
                },
                success: function (response) {
                    $('#profileModal').modal('hide');
                    //alert('パスワード変更成功');
                    var content = {};

                    content.message = 'パスワード変更成功';
                    content.title = '成功';
                    $.notify(content,{
                        type: 'success',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        time: 1000,
                        delay: 1000,
                    });

                },
                error: function () {
                }
            });
        }


    })
</script>
</body>
</html>
