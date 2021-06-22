@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="min-height: calc(100vh - 298px);">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('プロファイル') }}</div>

                    <div class="card-body">
                        {{--                        <form method="POST" action="{{ route('modify-profile') }}">--}}
                        {{--                            @csrf--}}

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">会社名:</label>

                            <div class="col-md-6">
                                <label id="company_name" type="text" class="@error('name') is-invalid @enderror"
                                       name="company_name" value="" required autocomplete="company_name"
                                       autofocus>{{ $user->company_name }}</label>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">ユーザー名:</label>

                            <div class="col-md-6">
                                <label id="username" type="text" class="@error('name') is-invalid @enderror"
                                       name="username" value="" required autocomplete="username"
                                       autofocus>{{$user->username}}</label>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">住所:</label>

                            <div class="col-md-6">
                                <label id="address" type="text" class="@error('name') is-invalid @enderror"
                                       name="address" value="" required autocomplete="address"
                                       autofocus>{{$user->address}}</label>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス:') }}</label>

                            <div class="col-md-6">
                                <label id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email">{{$user->email}}</label>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--                            <div class="form-group row">--}}
                        {{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード:') }}</label>--}}

                        {{--                                <div class="col-md-6">--}}
                        {{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                        {{--                                    @error('password')--}}
                        {{--                                    <span class="invalid-feedback" role="alert">--}}
                        {{--                                        <strong>{{ $message }}</strong>--}}
                        {{--                                    </span>--}}
                        {{--                                    @enderror--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="form-group row">--}}
                        {{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>--}}

                        {{--                                <div class="col-md-6">--}}
                        {{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="form-group row mb-0">--}}
                        {{--                                <div class="col-md-6 offset-md-4">--}}
                        {{--                                    <button type="submit" class="btn btn-primary">--}}
                        {{--                                        {{ __('パスワード変更') }}--}}
                        {{--                                    </button>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </form>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('パスワード変更') }}</div>

                    <div class="card-body">
                        <form id="form">
                            @csrf
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('新規パスワード:') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" minlength="8"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認:') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" minlength="8"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="profile_submit" type="submit" class="btn btn-primary">
                                        {{ __('パスワード変更') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('template/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <!-- Bootstrap Notify -->
    <script src="{{asset('admin_tmp/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
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
                        if(response.status){
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
                        }
                        else{
                            var content = {};

                            content.message = 'パスワードを変更できません。';
                            content.title = '失敗';
                            $.notify(content,{
                                type: 'warning',
                                placement: {
                                    from: 'top',
                                    align: 'right'
                                },
                                time: 1000,
                                delay: 1000,
                            });
                        }
                    },
                    error: function () {
                    }
                });
            }


        })
    </script>

@endsection
