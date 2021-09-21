@extends('admin.layouts.base')

@section('page-css')
    <style>
        /*----- Date Picker ----*/

        .ui-datepicker {
            background-color: #f0f6ff;
            border: 1px solid #ced4da;
            font-family: inherit;
            font-size: inherit;
            padding: 10px;
            margin: 1px 0 0;
            display: none;
            width: auto !important;
            z-index: 5 !important;
        }
        .ui-datepicker .ui-datepicker-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
            color: #473b52;
            padding: 0 0 5px;
            letter-spacing: 1px;
            border: 0;
            background-color: transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }
        .ui-datepicker .ui-datepicker-header .ui-datepicker-next, .ui-datepicker .ui-datepicker-header .ui-datepicker-prev {
            text-indent: -99999px;
            color: #6c757d;
            top: 1px;
        }
        .ui-datepicker .ui-datepicker-header .ui-datepicker-next::before, .ui-datepicker .ui-datepicker-header .ui-datepicker-prev::before {
            font-size: 16px;
            font-family: 'FontAwesome';
            position: absolute;
            top: -4px;
            text-indent: 0;
        }
        .ui-datepicker .ui-datepicker-header .ui-datepicker-next:hover::before, .ui-datepicker .ui-datepicker-header .ui-datepicker-next:focus::before, .ui-datepicker .ui-datepicker-header .ui-datepicker-prev:hover::before, .ui-datepicker .ui-datepicker-header .ui-datepicker-prev:focus::before {
            color: #343a40;
        }
        .ui-datepicker .ui-datepicker-header .ui-datepicker-next {
            order: 3;
        }
        .ui-datepicker .ui-datepicker-header .ui-datepicker-next:before {
            right: 5px;
            content: '\f105';
        }
        .ui-datepicker .ui-datepicker-header .ui-datepicker-prev:before {
            left: 5px;
            content: '\f104';
        }
        .ui-datepicker .ui-datepicker-header .ui-datepicker-next-hover, .ui-datepicker .ui-datepicker-header .ui-datepicker-prev-hover {
            color: #495057;
            cursor: pointer;
            top: 1px;
            border: 0;
            background-color: transparent;
        }
        .ui-datepicker .ui-datepicker-title {
            color: #5B93D3;
        }
        .ui-datepicker .ui-datepicker-calendar {
            margin: 0;
            background-color: transparent;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        .ui-datepicker .ui-datepicker-calendar th {
            text-transform: uppercase;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 1px;
            padding: 6px 10px;
            color: #a3a7b7;
        }
        @media (max-width: 320px) {
            .ui-datepicker .ui-datepicker-calendar th {
                padding: 4px 0;
                letter-spacing: normal;
            }
        }
        .ui-datepicker .ui-datepicker-calendar td {
            border: 1px solid #eceef9;
            padding: 0;
            background-color: #eceef9;
            text-align: right;
        }
        .ui-datepicker .ui-datepicker-calendar td:last-child {
            border-right: 0;
        }
        .ui-datepicker .ui-datepicker-calendar td.ui-datepicker-other-month .ui-state-default {
            color: #ccc;
        }
        .ui-datepicker .ui-datepicker-calendar td span, .ui-datepicker .ui-datepicker-calendar td a {
            transition: all 0.2s ease-in-out;
            padding: 5px;
            background-color: #fff;
            color: #473b52;
            padding: 6px 10px;
            display: block;
            font-weight: 400;
            font-size: 12px;
            border: 0;
            border-radius: 1px;
        }
        .ui-datepicker .ui-datepicker-calendar td a:hover {
            background-color: #f0f2f7;
            color: #473b52;
        }
        .ui-datepicker .ui-datepicker-calendar .ui-datepicker-today a {
            background-color: #f8f9fa;
            color: #473b52;
        }
        .ui-datepicker-multi .ui-datepicker-group {
            padding-right: 15px;
            width: auto;
            float: left;
        }
        .ui-datepicker-multi .ui-datepicker-group .ui-datepicker-title {
            margin: auto;
        }
        .ui-datepicker-multi .ui-datepicker-group .ui-datepicker-prev::before {
            left: 10px;
        }
        .ui-datepicker-multi .ui-datepicker-group .ui-datepicker-next::before {
            right: 10px;
        }
        .ui-datepicker-multi .ui-datepicker-group table {
            margin: 0;
        }
        .ui-datepicker-multi .ui-datepicker-group-last {
            padding-right: 0;
        }
        .ui-datepicker-inline {
            max-width: 270px;
            border-radius: 12px;
        }
        .model-wrapper-demo {
            padding: 50px 0;
            background: #f0f6ff;
        }
        /***** Date Picker*****/

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        *:before, *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
    </style>

@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">ユーザー管理</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a>ユーザープロファイル</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">ユーザー</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>会社名</label>
                                    <label type="text" class="mt-2" name="name" placeholder="Name" value="Hizrian">{{$user->company_name}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>部署名</label>
                                    <label type="text" class="mt-2" name="name">{{$user->belong}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>ユーザー名</label>
                                    <label type="text" class="mt-2" name="name" placeholder="Name" value="Hizrian">{{$user->username}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>メールアドレス</label>
                                    <label type="text" class="mt-2" name="name" placeholder="Name" value="Hizrian">{{$user->email}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>住所</label>
                                    <label type="text" class="mt-2" name="name" placeholder="Name" value="Hizrian">{{$user->address}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group form-group-default">
                                    <label>パスワード変更</label>
                                    <select class="form-control" name="change_pw" id="change_pw">
                                        <option value="1" {{$user->change_pw == 1 ? 'selected': ''}}>変更可能</option>
                                        <option value="0" {{$user->change_pw == 0 ? 'selected': ''}}>変更不可</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group ">
                                    <div class="form-label">アカウント種類</div>
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="account_type" value="A" {{$user->account_type === 'A' ? 'checked' : ''}}>
                                            <span class="custom-control-label">A 制限なし</span>
                                        </label>
                                        <label class="custom-control custom-radio mx-0" style="display: inline-grid">
                                            <input type="radio" class="custom-control-input" name="account_type" value="B" {{$user->account_type === 'B' ? 'checked' : ''}}>
                                            <span class="custom-control-label">
                                                <span>B 期間制限</span>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control fc-datepicker" id="b_date" name="b_date" placeholder="MM/DD/YYYY" type="text"
                                                           {{$user->account_type === 'B' ? '' : 'disabled'}}
                                                           value="{{$user->account_type === 'B' ? date('m/d/Y', strtotime($user->b_date)) : ''}}">
                                                </div>
                                            </span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="account_type" value="C" {{$user->account_type === 'C' ? 'checked' : ''}}>
                                            <span class="custom-control-label">C データ制限</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="account_type" value="D" {{$user->account_type === 'D' ? 'checked' : ''}}>
                                            <span class="custom-control-label">D 無効</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="user_id" value="{{$user->id}}">
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page-js')
    <script>
        let home_path = $("#home_path").val();
        let token = $("meta[name='_csrf']").attr("content");
        // Datepicker
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });
        $('[name=change_pw]').change(function () {

            let formData = new FormData();
            let change_pw = $(this).val();

            formData.append('user_id', $('#user_id').val())
            formData.append('change_pw', change_pw)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/change-pw';
            $.ajax({
                url:url,
                type:'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    let content = {};
                    if(change_pw === '1'){
                        content.message = 'パスワード変更を可能に設定しました。';
                    }
                    else{
                        content.message = 'パスワード変更を不可能に設定しました。';
                    }
                    content.title = '成功';
                    $.notify(content,{
                        type: 'success',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        time: 1000,
                        delay: 2000,
                    });
                },
                error: function () {
                    return false;
                }
            });

        })
        $('[name=account_type]').click(function () {
            let account_type = $(this).val();
            if(account_type === 'B'){
                $('#b_date')[0].disabled = false;
                var $datepicker = $('#b_date');
                $datepicker.datepicker();
                var date = new Date();
                date.setDate(date.getDate() + 30);
                $datepicker.datepicker('setDate', date);
            }
            else{
                $('#b_date')[0].disabled = true;
            }
            let formData = new FormData();
            formData.append('user_id', $('#user_id').val())
            formData.append('account_type', account_type)
            if(account_type === 'B'){
                formData.append('b_date', $('#b_date').val())
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/account-type';
            $.ajax({
                url:url,
                type:'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    let content = {};
                    content.message = 'アカウント種類を変更しました。';
                    content.title = '成功';
                    $.notify(content,{
                        type: 'success',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        time: 1000,
                        delay: 2000,
                    });
                },
                error: function () {
                    return false;
                }
            });
        })
        $('#b_date').change(function () {
            let formData = new FormData();
            formData.append('user_id', $('#user_id').val())
            formData.append('account_type', 'B')
            formData.append('b_date', $('#b_date').val())

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/account-type';
            $.ajax({
                url:url,
                type:'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    let content = {};
                    content.message = '期間制限を変更しました。';
                    content.title = '成功';
                    $.notify(content,{
                        type: 'success',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        time: 1000,
                        delay: 2000,
                    });
                },
                error: function () {
                    return false;
                }
            });
        })
    </script>

@endsection
