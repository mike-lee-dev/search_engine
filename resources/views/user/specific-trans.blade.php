@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{asset('template/fonts/fonts/font-awesome.min.css')}}">
    <!-- Dashboard Css -->
    <link href="{{asset('template/css/dashboard.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/commonForm.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/tables1.css')}}" rel="stylesheet"/>
    <style>
        th {
            width: 150px !important;
            padding: 20px !important;
        }

        @media screen and (max-width: 640px) {
            th {
                width: 90px !important;
                padding: 10px !important;
            }
        }

    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-ttl">
                    <div class="ttl-area">
                        <h2>特定商取引</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="main-item">
                        <h3>特定商取引</h3>
                        <table class="main-table-pattern1">
                            <tbody>
                            <tr>
                                <th>販売担当事業者</th>
                                <td colspan="5">&nbsp; 株式会社日本スマートマーケティング</td>
                            </tr>
                            <tr>
                                <th>運営責任者</th>
                                <td colspan="5">&nbsp; 瀬名 博一</td>
                            </tr>
                            <tr>
                                <th>所在地</th>
                                <td colspan="5">〒115-0052<br>東京都北区赤羽北1-1-7<br>TEL 050-3709-7921<br>お問い合わせは下記フォームにて承っております。</td>
                            </tr>
                            <tr>
                                <th>商品に関するお問い合せ先</th>
                                <td colspan="5"><a href="https://chotatu.rwd.pw/contact/contact.html">お問い合わせフォーム</a></td>
                            </tr>
                            <tr>
                                <th>販売ページＵＲＬ</th>
                                <td colspan="5">https://chotatu.rwd.pw</td>
                            </tr>
                            <tr>
                                <th>販売価格</th>
                                <td colspan="5">税込み0円（月払い）<br>税込み0円（年払い）</td>
                            </tr>
                            <tr>
                                <th>その他の代金</th>
                                <td colspan="5">
                                    クレジット分割・リボ払いの場合はクレジット会社の別途分割手数料がかかります。代金のお支払い後にご利用のカード会社にお問い合わせください。銀行決済の場合は振込手数料等をご負担ください。
                                </td>
                            </tr>
                            <tr>
                                <th>お支払い方法</th>
                                <td colspan="5">クレジットカード・銀行決済<br>本商品については、一括払いのみとなります。<br>あらかじめご了承ください。</td>
                            </tr>
                            <tr>
                                <th>販売数量</th>
                                <td colspan="5">制限なし</td>
                            </tr>
                            <tr>
                                <th>利用開始の時期・方法</th>
                                <td colspan="5">「新規会員登録について」から利用申請フォームを送信してください。返信メールに記載の手順で、代金決済完了後、利用開始の登録をして、ご利用いただけます。</td>
                            </tr>
                            <tr>
                                <th>返品・返金・交換<br>について</th>
                                <td colspan="5">商品の性格上、返品・返金・交換はできません</td>
                            </tr>
                            <tr>
                                <th>表現、及び商品に関する注意書き</th>
                                <td colspan="5">本商品に示された表現の理解には個人差があります。不明点は、あらかじめお問い合わせください。</td>
                            </tr>
                            <tr>
                                <th>個人情報について</th>
                                <td colspan="5">お客様の個人情報は、弊社で厳重に管理させていただき第三者に提供するということはありません。<br>ただし、法律により請求された場合や弊社の権利や財産等を保護する場合などには、提供する可能性がございます。
                                </td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('template/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('template/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/js/vendors/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('template/js/vendors/selectize.min.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>
    <script src="{{asset('js/UAA01.js')}}"></script>

@endsection
