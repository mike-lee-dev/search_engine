@extends('admin.layouts.base')

@section('page-css')

@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">メール送信設定 ({{$title}})</h4>
            <input type="hidden" id="account_type" value="{{$type}}">
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
                    <a>メール設定</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            メール設定
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="defaultSelect">送信対象日</label>
                                    <select class="form-control form-control" name="search_period" id="search_period">
                                        @for($i = 1; $i <= 30; $i++)
                                            <option value="{{$i}}" {{$manage->search_period == $i ? 'selected' : ''}}>{{$i}}日</option>
                                        @endfor
                                        @if($type === 'C')
                                                @for($i = 31; $i <= 40; $i++)
                                                    <option value="{{$i}}" {{$manage->search_period == $i ? 'selected' : ''}}>{{$i}}日</option>
                                                @endfor
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>送信開始時間</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="timepicker" name="send_start_time" value="{{$manage->send_start_time}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-clock"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="defaultSelect">一時間当たりのメール送信件数</label>
                                    <select class="form-control form-control" name="send_per_hour" id="send_per_hour">
                                        <option value="100" {{$manage->send_per_hour == 100 ? 'selected' : ''}}>100</option>
                                        <option value="200" {{$manage->send_per_hour == 200 ? 'selected' : ''}}>200</option>
                                        <option value="500" {{$manage->send_per_hour == 500 ? 'selected' : ''}}>500</option>
                                        <option value="1000" {{$manage->send_per_hour == 1000 ? 'selected' : ''}}>1000</option>
                                        <option value="1500" {{$manage->send_per_hour == 1500 ? 'selected' : ''}}>1500</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="send_stauts" class="w-100">メール送信のオン・オフ設定</label>
                                    <input type="checkbox" {{$manage->send_status == 1 ? 'checked' : ''}} data-toggle="toggle" id="send_status" data-onstyle="success" name="send_status">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="header_content" value="{{$manage->mail_header}}">
                                    <label class="w-100">メールヘッダー</label>
                                    <div id="mail_header"></div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="footer_content" value="{{$manage->mail_footer}}">
                                    <label class="w-100">メールフッター</label>
                                    <div id="mail_footer"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-action text-right py-3">
                        <button class="btn btn-success" id="submit_setting">設定</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('page-js')
    <script>
        var home_path = $("#home_path").val();
        $('#timepicker').datetimepicker({
            format: 'HH:mm:ss',
        });
        $('#mail_header').summernote({
            placeholder: 'ヘッダー',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });
        $('#mail_footer').summernote({
            placeholder: 'フッター',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });
        $(document).ready(function () {
            let header_content = $('#header_content').val();
            $('#mail_header').summernote('code', header_content);
            let footer_content = $('#footer_content').val();
            $('#mail_footer').summernote('code', footer_content);
            $('#submit_setting').click(function () {
                let token = $("meta[name='_csrf']").attr("content");
                let formData = new FormData();
                let send_status, send_start_time;
                if ($('#send_status').is(":checked"))
                {
                    send_status = 1;
                }
                else{
                    send_status = 0;
                }
                console.log()
                formData.append('account_type', $('#account_type').val());
                formData.append('search_period', $('#search_period option:selected').val())
                formData.append('send_start_time', $('#timepicker').val())
                formData.append('send_per_hour', $('#send_per_hour option:selected').val())
                formData.append('send_status', send_status)
                formData.append('mail_header', $('#mail_header').summernote('code'))
                formData.append('mail_footer', $('#mail_footer').summernote('code'))
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

                var url = home_path + '/mail-manage';
                $.ajax({
                    url:url,
                    type:'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        let content = {};

                        content.message = 'メール設定を変更しました。';

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
                        return false;
                    }
                });
            })
        })
    </script>

@endsection
