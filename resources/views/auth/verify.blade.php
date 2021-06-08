@extends('layouts.app')

@section('content')
<div class="container mt-5" style="min-height: calc(100vh - 298px);">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メールアドレスの確認') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('新しい検証リンクがあなたの電子メールアドレスに送信されました。') }}
                        </div>
                    @endif

                    {{ __('作業を開始する前に、電子メールで確認リンクを確認してください。') }}
                    {{ __('メールを受信しなかった場合') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('ここをクリックしてください') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
