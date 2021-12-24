@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{asset('template/fonts/fonts/font-awesome.min.css')}}">
    <!-- Dashboard Css -->
{{--    <link href="{{asset('template/css/dashboard.css')}}" rel="stylesheet"/>--}}
    <link href="{{asset('css/commonForm.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/tables1.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin_tmp/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('admin_tmp/css/fonts.css')}}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('admin_tmp/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_tmp/css/atlantis.css')}}">
    <style>
        body{
            background-color: #f0f6ff;
        }
        .modal-backdrop {
            display: none !important;
        }
        .modal-open .modal {
            width: 800px;
            /*margin: 21vh auto 0 auto !important;*/
        }
        .modal-open {
            overflow-y: scroll !important;
            padding-right: 0 !important;
        }

        #comment_modal {
            position: relative;
        }
        .note-toolbar-wrapper{
            height: auto !important;
        }

        .modal-dialog {
            width: 800px !important;
            position: fixed;
            margin: 0;
            padding: 10px;
        }
        #resultTable_wrapper {
            overflow-x: scroll;
        }

        #resultTable_wrapper > .row:first-child {
            display: none;
        }

        #resultTable_wrapper > .row:last-child {
            display: none;
        }

        .torikesi-end {
            pointer-events: all !important;
        }

        .favourite {
            position: relative;
            font-size: 25px;
        }

        .high {
            color: blue;
            cursor: pointer;
        }

        .middle {
            color: red;
            cursor: pointer;
        }

        .low {
            color: grey;
            cursor: pointer;
        }

        .none {
            cursor: pointer;
        }

        .divide {
            border-right: 1px solid #333;
            width: 1px;
            height: 25px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .icon-preview {
            display: flex;
            position: absolute;
            background: white;
            top: calc(50% - 22.5px);
            padding: 10px 10px 10px 0;
        }

        .active-fav {
            border-bottom: 1px dashed black;
        }
    </style>
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
                <p class="main-item-txt mb-0" id="info01">選択した調達情報の詳細を表示します。</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="main-item-table pb-2">
                    <p class="main-item-txt" id="info04">
                        お気に入りの注目度をクリックして変更すると、お気に入りの状態が登録されます。
                    </p>
                    <input type="hidden" value="{{$id}}" id="procurement_id">
                    <ul class="table-name mb-0">
                        <dl class="table-form">
                            <dd class="ml-0">
                                @if(\Illuminate\Support\Facades\Auth::user()->account_type === 'C' || \Illuminate\Support\Facades\Auth::user()->account_type === 'D')
                                    <span>
                                        <input id="searchConditionBean.cla1" name="classify" disabled
                                               tabindex="1730" type="radio" value="3" {{$rate === 3 ? 'checked' : ''}}
                                               class="mousetrap">
                                        <label for="searchConditionBean.cla1" class="table-radio"
                                               tabindex="1730">高：<i class="fas fa-star high"></i></label>
                                    </span>
                                    <span>
                                        <input id="searchConditionBean.cla2" name="classify"
                                               {{$rate === 2 ? 'checked' : ''}} disabled
                                               tabindex="1730" type="radio" value="2" class="mousetrap">
                                        <label for="searchConditionBean.cla2" class="table-radio"
                                               tabindex="1730">中：<i class="fas fa-star middle"></i></label>
                                    </span>
                                    <span>
                                        <input id="searchConditionBean.cla3" name="classify"
                                               {{$rate === 1 ? 'checked' : ''}}
                                               tabindex="1730" type="radio" value="1"
                                               disabled class="mousetrap">
                                        <label for="searchConditionBean.cla3" class="table-radio"
                                               tabindex="1730">低：<i class="fas fa-star low"></i></label>
                                    </span>
                                    <span>
                                        <input id="searchConditionBean.cla4" name="classify"
                                               {{$rate === 0 ? 'checked' : ''}} disabled
                                               tabindex="1730" type="radio" value="0" class="mousetrap">
                                        <label for="searchConditionBean.cla4" class="table-radio"
                                               tabindex="1730">無：<i class="icon-star none"></i></label>
                                    </span>
                                @else
                                    <span>
                                        <input id="searchConditionBean.cla1" name="classify"
                                               tabindex="1730" type="radio" value="3" {{$rate === 3 ? 'checked' : ''}}
                                               class="mousetrap">
                                        <label for="searchConditionBean.cla1" class="table-radio"
                                               tabindex="1730">高：<i class="fas fa-star high"></i></label>
                                    </span>
                                    <span>
                                        <input id="searchConditionBean.cla2" name="classify"
                                               {{$rate === 2 ? 'checked' : ''}}
                                               tabindex="1730" type="radio" value="2" class="mousetrap">
                                        <label for="searchConditionBean.cla2" class="table-radio"
                                               tabindex="1730">中：<i class="fas fa-star middle"></i></label>
                                    </span>
                                    <span>
                                        <input id="searchConditionBean.cla3" name="classify"
                                               {{$rate === 1 ? 'checked' : ''}}
                                               tabindex="1730" type="radio" value="1"
                                               class="mousetrap">
                                        <label for="searchConditionBean.cla3" class="table-radio"
                                               tabindex="1730">低：<i class="fas fa-star low"></i></label>
                                    </span>
                                    <span>
                                        <input id="searchConditionBean.cla4" name="classify"
                                               {{$rate === 0 ? 'checked' : ''}}
                                               tabindex="1730" type="radio" value="0" class="mousetrap">
                                        <label for="searchConditionBean.cla4" class="table-radio"
                                               tabindex="1730">無：<i class="icon-star none"></i></label>
                                    </span>
                                @endif

                            </dd>
                        </dl>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="main-item">

                    <div class="alert message-error input-error-list" style="display: none;">
                    </div>

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
                    @if($rate !== 0)
                        <h3>コメント</h3>
                        <div class="nmlbox graybg" style="color:#333;">
                            @if(!isset($comment))
                                <p>まだコメントがありません。</p>
                            @else
                                <p>管理番号： {{$comment->manage_comment_id}}</p>
                                <p>調達案件名称： {{$info->procurement_name}}</p>
                                <p>調達情報の詳細： <a href="{{route('detail', $id)}}">公示本文</a></p>
                                @if(isset($comment->period_1))
                                    <p style="{{(isset($comment->closet) && $comment->closet === 0) ? 'color: red' : ''}}">期日１： {{date('Y-m-d', strtotime($comment->period_1))}} 公開開始日</p>
                                @endif
                                @if(isset($comment->period_2))
                                    <p style="{{(isset($comment->closet) && $comment->closet === 1) ? 'color: red' : ''}}">期日２： {{date('Y-m-d H:i', strtotime($comment->period_2))}} {{$comment->description_2}}</p>
                                @endif
                                @if(isset($comment->period_3))
                                    <p style="{{(isset($comment->closet) && $comment->closet === 2) ? 'color: red' : ''}}">期日３： {{date('Y-m-d H:i', strtotime($comment->period_3))}} {{$comment->description_3}}</p>
                                @endif
                                @if(isset($comment->period_4))
                                    <p style="{{(isset($comment->closet) && $comment->closet === 3) ? 'color: red' : ''}}">期日４： {{date('Y-m-d H:i', strtotime($comment->period_4))}} {{$comment->description_4}}</p>
                                @endif
                                @if(isset($comment->period_5))
                                    <p style="{{(isset($comment->closet) && $comment->closet === 4) ? 'color: red' : ''}}">期日５： {{date('Y-m-d H:i', strtotime($comment->period_5))}} {{$comment->description_5}}</p>
                                @endif
                                @if(isset($comment->tantosha_name))
                                    <p>担当者： {{$comment->tantosha_name}}</p>
                                @endif
                                <div>コメント： <div id="comment_part" style="margin-top: 10px;"></div></div>
                            @endif

                            <div class="form-group row mb-3">
                                <div class="col-md-12" style="text-align: right;">
                                    <button id="comment_edit" class="btn btn-primary">
                                        編集
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <a>
                        <img onclick="window.history.back();" src="{{asset('img/list_button.jpg')}}"
                             alt="株式会社日本スマートマーケティング">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="comment_modal" class="modal fade" role="dialog" data-backdrop="static" style="padding-right: 0; left: calc(50vw - 300px)">
        <div class="modal-dialog" style="width: 100%; margin: 0; max-width: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin-top: 15px;">コメント編集</h3>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 450px; overflow-y: scroll">
                    <div class="modal-type-04">
                        <div class="main-modal-inner" style="width: 100%"
                             tabindex="2600">
                            <div class="modal-contents" id="select-control">
                                <form id="comment_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="procurement_id" value="{{$id}}">
                                    <input type="hidden" name="procurement_name" value="{{$info->procurement_name}}">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0">管理番号：</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="manage_comment_id" value="{{isset($comment) ? $comment->manage_comment_id : ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0">調達案件名称：</label>

                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{$info->procurement_name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right px-0">調達情報の詳細：</label>

                                        <div class="col-md-6" style="margin-top: 5px;">
                                            <a href="{{route('detail', $id)}}">公示本文</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0" style="{{(isset($comment->closet) && $comment->closet === 0) ? 'color: red !important' : ''}}">期日１：</label>

                                        <div class="col-md-5">
                                            <input type="date" style="{{(isset($comment->closet) && $comment->closet === 0) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_1" dataformatas="Y-m" value="{{isset($comment->period_1) ? date('Y-m-d', strtotime($comment->period_1)) : ''}}">
                                        </div>
                                        <div class="col-md-4 col-form-label text-md-left pl-0" style="{{(isset($comment->closet) && $comment->closet === 0) ? 'color: red' : ''}}">
                                            <label>公開開始日</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0" style="{{(isset($comment->closet) && $comment->closet === 1) ? 'color: red !important' : ''}}">期日２：</label>

                                        <div class="col-md-5">
                                            <input type="datetime-local" class="date hasDatepicker mousetrap form-control" style="{{(isset($comment->closet) && $comment->closet === 1) ? 'color: red' : ''}}" name="period_2" value="{{isset($comment->period_2) ? date('Y-m-d\TH:i', strtotime($comment->period_2)) : ''}}">
                                        </div>
                                        <div class="col-md-4 pl-0">
                                            <input type="text" class="form-control" style="{{(isset($comment->closet) && $comment->closet === 1) ? 'color: red' : ''}}" name="description_2" value="{{isset($comment->description_2) ? $comment->description_2 : '証明書等の提出'}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0" style="{{(isset($comment->closet) && $comment->closet === 2) ? 'color: red !important' : ''}}">期日３：</label>

                                        <div class="col-md-5">
                                            <input type="datetime-local" style="{{(isset($comment->closet) && $comment->closet === 2) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_3" value="{{isset($comment->period_3) ? date('Y-m-d\TH:i', strtotime($comment->period_3)) : ''}}">
                                        </div>
                                        <div class="col-md-4 pl-0">
                                            <input type="text" class="form-control" name="description_3" style="{{(isset($comment->closet) && $comment->closet === 2) ? 'color: red' : ''}}" value="{{isset($comment->description_3) ? $comment->description_3 : '入札書等の提出'}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0" style="{{(isset($comment->closet) && $comment->closet === 3) ? 'color: red !important' : ''}}">期日４：</label>

                                        <div class="col-md-5">
                                            <input type="datetime-local" style="{{(isset($comment->closet) && $comment->closet === 3) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_4" value="{{isset($comment->period_4) ? date('Y-m-d\TH:i', strtotime($comment->period_4)) : ''}}">
                                        </div>
                                        <div class="col-md-4 pl-0">
                                            <input type="text" class="form-control" style="{{(isset($comment->closet) && $comment->closet === 3) ? 'color: red' : ''}}" name="description_4" value="{{isset($comment->description_4) ? $comment->description_4 : '開札日時'}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0" style="{{(isset($comment->closet) && $comment->closet === 4) ? 'color: red !important' : ''}}">期日５：</label>

                                        <div class="col-md-5">
                                            <input type="datetime-local" style="{{(isset($comment->closet) && $comment->closet === 4) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_5" value="{{isset($comment->period_5) ? date('Y-m-d\TH:i', strtotime($comment->period_5)) : ''}}">
                                        </div>
                                        <div class="col-md-4 pl-0">
                                            <input type="text" class="form-control" style="{{(isset($comment->closet) && $comment->closet === 4) ? 'color: red' : ''}}" name="description_5" value="{{isset($comment->description_5) ? $comment->description_5 : '質問書の提出'}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0">担当者：</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="tantosha_name" value="{{isset($comment->tantosha_name) ? $comment->tantosha_name : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0">コメント：</label>

                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" id="comment_value" value="{{isset($comment) ? $comment->comment : ''}}">
                                            <div id="comment"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <p>
                                                ・管理番号を入力すると、コメントを保存できます。<br>
                                                ・コメントにファイルを添付してメール送信できます。<br>
                                                ただし、ファイルは、サーバに保存されません。
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0">添付ファイル1：</label>

                                        <div class="col-md-9">
                                            <input type="file" name="file_1">※5MBまで
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0">添付ファイル2：</label>

                                        <div class="col-md-9">
                                            <input type="file" name="file_2">※5MBまで
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right pr-0">添付ファイル3：</label>

                                        <div class="col-md-9">
                                            <input type="file" name="file_3">※5MBまで
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group row mb-3">
                        <div class="col-md-12" style="text-align: right;">
                            <button id="comment_save" type="submit" class="btn btn-primary">
                                保存
                            </button>
                            <button id="comment_send" type="submit" class="btn btn-danger">
                                送信
                            </button>
                            <button id="comment_reset" type="submit" class="btn btn-dark">
                                リセット
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('template/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('template/js/vendors/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('template/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/js/vendors/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('template/js/vendors/selectize.min.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>
    <script src="{{asset('js/UAA01.js')}}"></script>
    <!-- Bootstrap Notify -->
    <script src="{{asset('admin_tmp/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin_tmp/js/plugin/summernote/summernote-bs4.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#comment').summernote({
                placeholder: 'ヘッダー',
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
                tabsize: 2,
                height: 200
            });
            let comment_value = $('#comment_value').val();
            $('#comment_part').html(comment_value);
            $('#comment').summernote('code', comment_value);
            $('#comment_edit').click(function() {
                // reset modal if it isn't visible
                if (!($('.modal.in').length)) {
                    let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                    console.log(width);
                    if(width < 750){
                        $('.modal-dialog').css({
                            top: 'calc(100vh - 650px)',
                            left: '2px'
                        });
                    }
                    else{
                        $('.modal-dialog').css({
                            top: '20vh',
                            left: 'calc(50vw - 400px)'
                        });
                    }

                }
                $('#comment_modal').modal({
                    backdrop: false,
                    show: true
                });

                $('.modal-dialog').draggable({
                    handle: ".modal-header"
                });

            });

        })
        let home_path = $("#home_path").val();
        $('input:radio[name="classify"]').change(function () {
            let rate = parseInt($(this).val());
            let token = $("meta[name='_csrf']").attr("content");
            let formData = new FormData();
            let procurement_id = $('#procurement_id').val();
            formData.append('rate', rate);
            formData.append('procurement_id', procurement_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/change-favourite';
            $.ajax({
                url: url,
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    if (response.status === true) {
                        let content = {};
                        content.message = '注目度を変更しました。';
                        content.title = '成功';
                        $.notify(content, {
                            type: 'success',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            time: 1000,
                            delay: 1000,
                        });
                        if(rate === 0){
                            window.location.reload();
                        }
                    } else {
                        let content = {};
                        content.message = '35件を超過しました。\n' +
                            '30 件未満に設定してください。';
                        content.title = '失敗';
                        $.notify(content, {
                            type: 'error',
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
                    return false;
                }
            });
        });

        $('#comment_save').click(function () {
            if($('[name=manage_comment_id]').val() !== "" && $('#comment').summernote('code') !== ""){
                console.log('d')
                var paramObj = new FormData($("#comment_form")[0]);
                console.log($('#comment').summernote('code'));
                paramObj.append('comment', $('#comment').summernote('code'))

                $.ajax({
                    url: home_path + "/comment-save",
                    type: 'post',
                    data: paramObj,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response.status === true){
                            let content = {};
                            content.message = 'コメントを保存しました。';
                            content.title = '成功';
                            $.notify(content, {
                                type: 'success',
                                placement: {
                                    from: 'top',
                                    align: 'right'
                                },
                                time: 1000,
                                delay: 1000,
                            });
                            window.location.reload();
                        }else{
                        }
                    },
                });
            }
        })
        $('#comment_send').click(function () {
            if($('[name=manage_comment_id]').val() !== "" && $('#comment').summernote('code') !== ""){
                var paramObj = new FormData($("#comment_form")[0]);
                console.log($('#comment').summernote('code'));
                paramObj.append('comment', $('#comment').summernote('code'))
                $.ajax({
                    url: home_path + "/comment-send",
                    type: 'post',
                    data: paramObj,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response.status === true){
                            let content = {};
                            content.message = 'コメントを送信しました。';
                            content.title = '成功';
                            $.notify(content, {
                                type: 'success',
                                placement: {
                                    from: 'top',
                                    align: 'right'
                                },
                                time: 1000,
                                delay: 1000,
                            });
                        }else{
                        }
                    },
                });
            }
        })

    </script>

@endsection
