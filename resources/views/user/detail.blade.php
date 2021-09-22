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
                        <h2>調達情報の詳細</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="main-item">
                    <form id="tri_WAA0101FM01" novalidate="true" action="/pps-web-biz/UAA01/OAA0100" method="post">
                        <div class="alert message-error input-error-list" style="display: none;">
                        </div>
                        <p class="main-item-txt" id="info01">選択した調達情報の詳細を表示します。</p>
                        <h3>調達情報詳細</h3>
                        <table class="main-table-pattern1">
                            <tbody>
                            <tr>
                                <th>調達案件番号</th>
                                <td colspan="5">{{$id}}</td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementCla">
                                <th>調達種別</th>
                                <td colspan="5">{{$info->procurement_type}}</td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/cla">
                                <th>分類</th>
                                <td colspan="5">{{$info->classify}}</td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/articleNm">
                                <th>調達案件名称</th>
                                <td colspan="5">{{$info->procurement_name}}</td>
                            </tr>
                            <tr class="info-date" id="tri_WAB0102FM01/procurementInformationDetailBean/publicStartDate">
                                <th>公開開始日</th>
                                <td colspan="2">
                                    {{$info->public_start_date}}
                                </td>
                                <th>公開終了日</th>
                                <td colspan="2">
                                    {{$info->public_end_date}}
                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementOrgan">
                                <th>調達機関</th>
                                <td colspan="5">{{$info->procurement_agency}}</td>


                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementOraganLocation">
                                <th>調達機関所在地</th>
                                <td colspan="5">{{$info->address_name}}</td>
                            </tr>
                            <tr>
                                <th rowspan="8">調達品目分類</th>
                                <td colspan="5">{{$info->item_classify_1}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$info->item_classify_2}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$info->item_classify_3}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$info->item_classify_4}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$info->item_classify_5}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$info->item_classify_6}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$info->item_classify_7}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$info->item_classify_8}}</td>
                            </tr>
                            <tr>
                                <th>公告内容</th>
                                <td colspan="5" style="white-space: pre-line">{{$info->official_text}}</td>
                            </tr>
                            <tr>
                                <th>調達資料１</th>
                                <td colspan="5">
                                    @if(!empty($info->url_specification_1))
                                        <a href="{{$info->url_specification_1}}" target="_blank">調達資料1ダウンロードURL></a>
                                    @endif
                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl2">
                                <th>調達資料２</th>
                                <td colspan="5">
                                    @if(!empty($info->url_specification_2))
                                        <a href="{{$info->url_specification_2}}" target="_blank">調達資料2ダウンロードURL></a>
                                    @endif
                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl3">
                                <th>調達資料３</th>
                                <td colspan="5">
                                    @if(!empty($info->url_specification_3))
                                        <a href="{{$info->url_specification_3}}" target="_blank">調達資料3ダウンロードURL></a>
                                    @endif
                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl4">
                                <th>調達資料４</th>
                                <td colspan="5">
                                    @if(!empty($info->url_specification_4))
                                        <a href="{{$info->url_specification_4}}" target="_blank">調達資料4ダウンロードURL></a>
                                    @endif
                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl5">
                                <th>調達資料５</th>
                                <td colspan="5">
                                    @if(!empty($info->url_specification_5))
                                        <a href="{{$info->url_specification_5}}" target="_blank">調達資料5ダウンロードURL></a>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <a>
                            <img onclick="window.history.back();" src="{{asset('img/list_button.jpg')}}" alt="株式会社日本スマートマーケティング">
                        </a>
                    </form>
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
