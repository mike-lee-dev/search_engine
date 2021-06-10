@extends('admin.layouts.base')

@section('page-css')

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
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>パスワード変更</label>
                                    <select class="form-control" name="change_pw" id="change_pw">
                                        <option value="1" {{$user->change_pw == 1 ? 'selected': ''}}>変更可能</option>
                                        <option value="0" {{$user->change_pw == 0 ? 'selected': ''}}>変更不可</option>
                                    </select>
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
        $('[name=change_pw]').change(function () {
            let token = $("meta[name='_csrf']").attr("content");
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
    </script>

@endsection
