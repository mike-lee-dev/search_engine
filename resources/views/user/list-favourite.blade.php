@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{asset('template/fonts/fonts/font-awesome.min.css')}}">
    <!-- Dashboard Css -->
{{--    <link href="{{asset('template/css/dashboard.css')}}" rel="stylesheet"/>--}}
    <link href="{{asset('css/commonForm.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/common.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/commonBbs.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/tables1.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin_tmp/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('admin_tmp/css/fonts.css')}}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('admin_tmp/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_tmp/css/atlantis.css')}}">
    <style>
        .form-group {
             display: flex !important;
        }
        #resultTable_wrapper{
            overflow-x: scroll;
        }
        #resultTable_wrapper > .row:first-child {
            display: none;
        }

        #resultTable_wrapper > .row:last-child {
            display: none;
        }
        .torikesi-end{
            pointer-events: all !important;
        }
        .favourite{
            position: relative;
            font-size: 25px;
        }
        .high{
            color: blue;
            cursor: pointer;
        }
        .middle{
            color: red;
            cursor: pointer;
        }
        .low{
            color: grey;
            cursor: pointer;
        }
        .none{
            cursor: pointer;
        }
        .divide{
            border-right: 1px solid #333;
            width: 1px;
            height: 25px;
            margin-right: 10px;
            margin-left: 10px;
        }
        .icon-preview{
            display: flex;
            position: absolute;
            background: white;
            top: calc(50% - 22.5px);
            padding: 10px 10px 10px 0;
        }
        .active-fav{
            border-bottom: 1px dashed black;
        }
        .result-detail{
            overflow-x: scroll !important;
        }
        .result-detail>div{
            min-width: 1176px !important;
        }
    </style>

@endsection

@section('content')
    @php
        if(isset($_GET['public'])){
            $public = isset($_GET['public'])?$_GET['public']:'';
            echo '<input type="hidden" value="' . $public . '" id="public_type">';
        }
        if(isset($_GET['type'])){
            $type = isset($_GET['type'])?$_GET['type']:'';
            echo '<input type="hidden" value="' . $type . '" id="type">';
        }
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-ttl">
                    <div class="ttl-area">
                        <h2>お気に入り一覧</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="main-item-table">
                    <ul class="table-name mb-0">
                        <dl class="table-form">
                            <dd class="ml-0">
                                <span>
                                    <input id="public_1" name="classify"
                                           tabindex="1730" type="radio" value="0" checked="checked"
                                           class="mousetrap">
                                    <label for="public_1" class="table-radio"
                                           tabindex="1730">公開中</label>
                                </span>
                                <span>
                                    <input id="public_2" name="classify"
                                           tabindex="1730" type="radio" value="1" class="mousetrap">
                                    <label for="public_2" class="table-radio"
                                           tabindex="1730">公開終了</label>
                                </span>
                            </dd>
                        </dl>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="main-item">

                    <div class="alert message-info" id="overflow_area" style="display: none">
                        <ul class="mb-0">
                            <li>検索結果が500件を超えたため、先頭の500件を表示します。</li>
                        </ul>
                    </div>

                    <!-- メイン 過去の検索条件 -->
                    <h3>お気に入り一覧</h3>

                    <p id="info_public">注目度 │ 高：<i class="fas fa-star high"></i>{{$high}}件 │ 中：<i class="fas fa-star middle"></i>{{$middle}}件 │ 低：<i class="fas fa-star low"></i>{{$low}}件</p>
                    <p id="info_end" style="display: none">注目度 │ 高：<i class="fas fa-star high"></i>{{$high1}}件 │ 中：<i class="fas fa-star middle"></i>{{$middle1}}件 │ 低：<i class="fas fa-star low"></i>{{$low1}}件</p>
                    <p class="main-item-txt" id="info04">
                        お気に入り一覧には、注目度 │ 高：<i class="fas fa-star high"></i> │ 中：<i class="fas fa-star middle"></i> │ 低：<i class="fas fa-star low"></i> │ 無：<i class="icon-star none"></i> │ それぞれ３０件の案件が登録できます。<br>
                        タブを切り替えて、注目度毎のお気に入り一覧を見ることができます。<br>
                        ３０件を超えて、各注目度に登録することはできません。<br>
                        注目度を変更する際は、変更先の注目度の件数を３０件未満にしてから、変更操作をして下さい。<br>
                        「コメント一覧を表示」をクリックすると、コメントを記載した案件が表示されます。
                    </p>
                    <div id="public_part">
                        <ul class="nav nav-pills nav-secondary mt-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="1-high" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> 高：<i class="fas fa-star high"></i> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="1-middle" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">中：<i class="fas fa-star middle"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="1-low" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">低：<i class="fas fa-star low"></i></a>
                            </li>
                        </ul>
                        <div class="tab-content mt-0 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="result-detail mt-1">
                                    @if($high > 30)
                                        <p class="main-item-txt" style="color: red">
                                            30件を超過しました。
                                            30件未満に設定してください。
                                        </p>
                                    @endif
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12" style="text-align: right;">
                                                <button class="btn btn-primary comment_show">
                                                    コメント一覧の表示
                                                </button>
                                                <button class="btn btn-primary info_show" style="display: none">
                                                    案件一覧の表示
                                                </button>
                                            </div>
                                        </div>
                                        <table class="main-summit-info mt-1 info_table" style="min-width: 1176px !important;">
                                            <thead>
                                            <tr>
                                                <th style="width: 6%;"></th>
                                                <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 14%;">調達案件番号</th>
                                                <th id="articleNm_th" class="wd-14p th text-center" style="width: 15%;">調達案件名称</th>
                                                <th id="procurementOrgan_th" class="wd-9p th text-center" style="width: 9%;">調達機関</th>
                                                <th id="receiptAddress_th" class="wd-10p th text-center" style="width: 10%;">所在地</th>
                                                <th id="requestSubmissionMaterialsBean_th" class="wd-14p th text-center" style="width: 10%;">
                                                    資料提供招請
                                                </th>
                                                <th id="requestCommentBean_th" class="wd-14p th text-center" style="width: 10%;">意見招請</th>
                                                <th id="procurementImplementNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">
                                                    調達実施案件公示
                                                </th>
                                                <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">落札公示</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($procurement_high as $id => $procurement)
                                                <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                    <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                        <div class="icon-fav">
                                                            @if($procurement['rate'] === 0)
                                                                <i class="icon-star none"></i>
                                                            @elseif($procurement['rate'] === 1)
                                                                <i class="fas fa-star low"></i>
                                                            @elseif($procurement['rate'] === 2)
                                                                <i class="fas fa-star middle"></i>
                                                            @else
                                                                <i class="fas fa-star high"></i>
                                                            @endif
                                                        </div>
                                                        <div class="icon-preview" style="display: none;">
                                                            <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                            <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                        </div>
                                                    </td>
                                                    <td>{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}</td>
                                                    <td>{{$procurement['procurement_name']}}</td>
                                                    <td>{{$procurement['procurement_agency']}}</td>
                                                    <td>{{$procurement['address']}}</td>
                                                    <td>
                                                        @if($procurement['notification_class'] === 3)
                                                            <a class="koukoku info-button" tabindex="4103"
                                                               href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                            {{$procurement['public_start_date']}}公開開始
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if($procurement['notification_class'] === 4)
                                                            <a class="koukoku info-button" tabindex="4103"
                                                               href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                            {{$procurement['public_start_date']}}公開開始
                                                        @endif
                                                    </td>
                                                    <td>

                                                        @if($procurement['notification_class'] !== 3 && $procurement['notification_class'] !== 4 && $procurement['notification_class'] !== 8 && $procurement['notification_class'] !== 15 && $procurement['notification_class'] !== 16)
                                                            <a class="koukoku info-button" tabindex="4103"
                                                               href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                            {{$procurement['public_start_date']}}公開開始
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($procurement['notification_class'] === 8 || $procurement['notification_class'] === 15 || $procurement['notification_class'] === 16)
                                                            <a class="koukoku info-button" tabindex="4103"
                                                               href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                            {{$procurement['public_start_date']}}公開開始
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <table class="main-summit-info mt-1 comment_table" style="min-width: 1176px !important; display: none">
                                            <thead>
                                            <tr>
                                                <th style="width: 6%;"></th>
                                                <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 80%;">コメント</th>
                                                <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 14%;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($procurement_high as $id => $procurement)
                                                <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                    <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                        <div class="icon-fav">
                                                            @if($procurement['rate'] === 0)
                                                                <i class="icon-star none"></i>
                                                            @elseif($procurement['rate'] === 1)
                                                                <i class="fas fa-star low"></i>
                                                            @elseif($procurement['rate'] === 2)
                                                                <i class="fas fa-star middle"></i>
                                                            @else
                                                                <i class="fas fa-star high"></i>
                                                            @endif
                                                        </div>
                                                        <div class="icon-preview" style="display: none;">
                                                            <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                            <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form class="comment_form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="procurement_id" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                            @if(count($procurement['comment']) === 0)
                                                                <p style="color: red">まだコメントがありません。</p>
                                                            @endif
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">管理番号：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="manage_comment_id" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['manage_comment_id'] : ''}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">調達案件名称：</label>

                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="procurement_name" value="{{$procurement['procurement_name']}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right px-0">調達情報の詳細：</label>

                                                                <div class="col-md-6" style="margin-top: 5px;">
                                                                    <a href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red !important' : ''}}">期日１：</label>

                                                                <div class="col-md-6">
                                                                    <input type="date" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_1" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_1'])) ? date('Y-m-d', strtotime($procurement['comment'][0]['period_1'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 col-form-label text-md-left pl-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}">
                                                                    <label>公開開始日</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red !important' : ''}}">期日２：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_2" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_2'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_2'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_2" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_2'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red !important' : ''}}">期日３：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_3" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_3'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_3'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" name="description_3" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_3'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red !important' : ''}}">期日４：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_4" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_4'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_4'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_4" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_4'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red !important' : ''}}">期日５：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_5" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_5'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_5'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_5" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_5'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">担当者：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="tantosha_name" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['tantosha_name'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">コメント：</label>

                                                                <div class="col-md-9">
                                                                    <input type="hidden" class="form-control comment_value" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['comment'] : ''}}">
                                                                    <div class="comment"></div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary comment_save">
                                                            保存
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="result-detail mt-1">
                                    @if($middle > 30)
                                        <p class="main-item-txt" style="color: red">
                                            30件を超過しました。
                                            30件未満に設定してください。
                                        </p>
                                    @endif
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12" style="text-align: right;">
                                                <button class="btn btn-primary comment_show">
                                                    コメント一覧の表示
                                                </button>
                                                <button class="btn btn-primary info_show" style="display: none">
                                                    案件一覧の表示
                                                </button>
                                            </div>
                                        </div>
                                    <table class="main-summit-info mt-1 info_table" style="min-width: 1176px !important;">
                                        <thead>
                                        <tr>
                                            <th style="width: 6%;"></th>
                                            <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 14%;">調達案件番号</th>
                                            <th id="articleNm_th" class="wd-14p th text-center" style="width: 15%;">調達案件名称</th>
                                            <th id="procurementOrgan_th" class="wd-9p th text-center" style="width: 9%;">調達機関</th>
                                            <th id="receiptAddress_th" class="wd-10p th text-center" style="width: 10%;">所在地</th>
                                            <th id="requestSubmissionMaterialsBean_th" class="wd-14p th text-center" style="width: 10%;">
                                                資料提供招請
                                            </th>
                                            <th id="requestCommentBean_th" class="wd-14p th text-center" style="width: 10%;">意見招請</th>
                                            <th id="procurementImplementNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">
                                                調達実施案件公示
                                            </th>
                                            <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">落札公示</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($procurement_middle as $id => $procurement)
                                            <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                    <div class="icon-fav">
                                                        @if($procurement['rate'] === 0)
                                                            <i class="icon-star none"></i>
                                                        @elseif($procurement['rate'] === 1)
                                                            <i class="fas fa-star low"></i>
                                                        @elseif($procurement['rate'] === 2)
                                                            <i class="fas fa-star middle"></i>
                                                        @else
                                                            <i class="fas fa-star high"></i>
                                                        @endif
                                                    </div>
                                                    <div class="icon-preview" style="display: none;">
                                                        <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                        <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                    </div>
                                                </td>
                                                <td>{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}</td>
                                                <td>{{$procurement['procurement_name']}}</td>
                                                <td>{{$procurement['procurement_agency']}}</td>
                                                <td>{{$procurement['address']}}</td>
                                                <td>
                                                    @if($procurement['notification_class'] === 3)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 4)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>

                                                    @if($procurement['notification_class'] !== 3 && $procurement['notification_class'] !== 4 && $procurement['notification_class'] !== 8 && $procurement['notification_class'] !== 15 && $procurement['notification_class'] !== 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 8 || $procurement['notification_class'] === 15 || $procurement['notification_class'] === 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        <table class="main-summit-info mt-1 comment_table" style="min-width: 1176px !important; display: none">
                                            <thead>
                                            <tr>
                                                <th style="width: 6%;"></th>
                                                <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 80%;">コメント</th>
                                                <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 14%;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($procurement_middle as $id => $procurement)
                                                <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                    <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                        <div class="icon-fav">
                                                            @if($procurement['rate'] === 0)
                                                                <i class="icon-star none"></i>
                                                            @elseif($procurement['rate'] === 1)
                                                                <i class="fas fa-star low"></i>
                                                            @elseif($procurement['rate'] === 2)
                                                                <i class="fas fa-star middle"></i>
                                                            @else
                                                                <i class="fas fa-star high"></i>
                                                            @endif
                                                        </div>
                                                        <div class="icon-preview" style="display: none;">
                                                            <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                            <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form class="comment_form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="procurement_id" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                            @if(count($procurement['comment']) === 0)
                                                                <p style="color: red">まだコメントがありません。</p>
                                                            @endif
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">管理番号：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="manage_comment_id" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['manage_comment_id'] : ''}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">調達案件名称：</label>

                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="procurement_name" value="{{$procurement['procurement_name']}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right px-0">調達情報の詳細：</label>

                                                                <div class="col-md-6" style="margin-top: 5px;">
                                                                    <a href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red !important' : ''}}">期日１：</label>

                                                                <div class="col-md-6">
                                                                    <input type="date" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_1" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_1'])) ? date('Y-m-d', strtotime($procurement['comment'][0]['period_1'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 col-form-label text-md-left pl-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}">
                                                                    <label>公開開始日</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red !important' : ''}}">期日２：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_2" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_2'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_2'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_2" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_2'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red !important' : ''}}">期日３：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_3" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_3'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_3'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" name="description_3" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_3'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red !important' : ''}}">期日４：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_4" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_4'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_4'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_4" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_4'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red !important' : ''}}">期日５：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_5" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_5'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_5'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_5" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_5'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">担当者：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="tantosha_name" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['tantosha_name'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">コメント：</label>

                                                                <div class="col-md-9">
                                                                    <input type="hidden" class="form-control comment_value" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['comment'] : ''}}">
                                                                    <div class="comment"></div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary comment_save">
                                                            保存
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="result-detail mt-1">
                                    @if($low > 30)
                                        <p class="main-item-txt" style="color: red">
                                            30件を超過しました。
                                            30件未満に設定してください。
                                        </p>
                                    @endif
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12" style="text-align: right;">
                                                <button class="btn btn-primary comment_show">
                                                    コメント一覧の表示
                                                </button>
                                                <button class="btn btn-primary info_show" style="display: none">
                                                    案件一覧の表示
                                                </button>
                                            </div>
                                        </div>
                                    <table class="main-summit-info mt-1 info_table" style="min-width: 1176px !important;">
                                        <thead>
                                        <tr>
                                            <th style="width: 6%;"></th>
                                            <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 14%;">調達案件番号</th>
                                            <th id="articleNm_th" class="wd-14p th text-center" style="width: 15%;">調達案件名称</th>
                                            <th id="procurementOrgan_th" class="wd-9p th text-center" style="width: 9%;">調達機関</th>
                                            <th id="receiptAddress_th" class="wd-10p th text-center" style="width: 10%;">所在地</th>
                                            <th id="requestSubmissionMaterialsBean_th" class="wd-14p th text-center" style="width: 10%;">
                                                資料提供招請
                                            </th>
                                            <th id="requestCommentBean_th" class="wd-14p th text-center" style="width: 10%;">意見招請</th>
                                            <th id="procurementImplementNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">
                                                調達実施案件公示
                                            </th>
                                            <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">落札公示</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($procurement_low as $id => $procurement)
                                            <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                    <div class="icon-fav">
                                                        @if($procurement['rate'] === 0)
                                                            <i class="icon-star none"></i>
                                                        @elseif($procurement['rate'] === 1)
                                                            <i class="fas fa-star low"></i>
                                                        @elseif($procurement['rate'] === 2)
                                                            <i class="fas fa-star middle"></i>
                                                        @else
                                                            <i class="fas fa-star high"></i>
                                                        @endif
                                                    </div>
                                                    <div class="icon-preview" style="display: none;">
                                                        <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                        <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                    </div>
                                                </td>
                                                <td>{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}</td>
                                                <td>{{$procurement['procurement_name']}}</td>
                                                <td>{{$procurement['procurement_agency']}}</td>
                                                <td>{{$procurement['address']}}</td>
                                                <td>
                                                    @if($procurement['notification_class'] === 3)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 4)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>

                                                    @if($procurement['notification_class'] !== 3 && $procurement['notification_class'] !== 4 && $procurement['notification_class'] !== 8 && $procurement['notification_class'] !== 15 && $procurement['notification_class'] !== 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 8 || $procurement['notification_class'] === 15 || $procurement['notification_class'] === 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        <table class="main-summit-info mt-1 comment_table" style="min-width: 1176px !important; display: none">
                                            <thead>
                                            <tr>
                                                <th style="width: 6%;"></th>
                                                <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 80%;">コメント</th>
                                                <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 14%;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($procurement_low as $id => $procurement)
                                                <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                    <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                        <div class="icon-fav">
                                                            @if($procurement['rate'] === 0)
                                                                <i class="icon-star none"></i>
                                                            @elseif($procurement['rate'] === 1)
                                                                <i class="fas fa-star low"></i>
                                                            @elseif($procurement['rate'] === 2)
                                                                <i class="fas fa-star middle"></i>
                                                            @else
                                                                <i class="fas fa-star high"></i>
                                                            @endif
                                                        </div>
                                                        <div class="icon-preview" style="display: none;">
                                                            <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                            <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form class="comment_form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="procurement_id" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                            @if(count($procurement['comment']) === 0)
                                                                <p style="color: red">まだコメントがありません。</p>
                                                            @endif
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">管理番号：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="manage_comment_id" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['manage_comment_id'] : ''}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">調達案件名称：</label>

                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="procurement_name" value="{{$procurement['procurement_name']}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right px-0">調達情報の詳細：</label>

                                                                <div class="col-md-6" style="margin-top: 5px;">
                                                                    <a href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red !important' : ''}}">期日１：</label>

                                                                <div class="col-md-6">
                                                                    <input type="date" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_1" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_1'])) ? date('Y-m-d', strtotime($procurement['comment'][0]['period_1'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 col-form-label text-md-left pl-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}">
                                                                    <label>公開開始日</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red !important' : ''}}">期日２：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_2" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_2'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_2'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_2" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_2'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red !important' : ''}}">期日３：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_3" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_3'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_3'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" name="description_3" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_3'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red !important' : ''}}">期日４：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_4" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_4'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_4'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_4" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_4'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red !important' : ''}}">期日５：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_5" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_5'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_5'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_5" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_5'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">担当者：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="tantosha_name" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['tantosha_name'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">コメント：</label>

                                                                <div class="col-md-9">
                                                                    <input type="hidden" class="form-control comment_value" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['comment'] : ''}}">
                                                                    <div class="comment"></div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary comment_save">
                                                            保存
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="end_part" style="display: none">
                        <ul class="nav nav-pills nav-secondary mt-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="2-high" data-toggle="pill" href="#pills-home1" role="tab" aria-controls="pills-home" aria-selected="true"> 高：<i class="fas fa-star high"></i> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="2-middle" data-toggle="pill" href="#pills-profile1" role="tab" aria-controls="pills-profile" aria-selected="false">中：<i class="fas fa-star middle"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="2-low" data-toggle="pill" href="#pills-contact1" role="tab" aria-controls="pills-contact" aria-selected="false">低：<i class="fas fa-star low"></i></a>
                            </li>
                        </ul>
                        <div class="tab-content mt-0 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="result-detail mt-1">
                                    @if($high1 > 30)
                                        <p class="main-item-txt" style="color: red">
                                            30件を超過しました。
                                            30件未満に設定してください。
                                        </p>
                                    @endif
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12" style="text-align: right;">
                                                <button class="btn btn-primary comment_show">
                                                    コメント一覧の表示
                                                </button>
                                                <button class="btn btn-primary info_show" style="display: none">
                                                    案件一覧の表示
                                                </button>
                                            </div>
                                        </div>
                                    <table class="main-summit-info mt-1 info_table" style="min-width: 1176px !important;">
                                        <thead>
                                        <tr>
                                            <th style="width: 6%;"></th>
                                            <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 14%;">調達案件番号</th>
                                            <th id="articleNm_th" class="wd-14p th text-center" style="width: 15%;">調達案件名称</th>
                                            <th id="procurementOrgan_th" class="wd-9p th text-center" style="width: 9%;">調達機関</th>
                                            <th id="receiptAddress_th" class="wd-10p th text-center" style="width: 10%;">所在地</th>
                                            <th id="requestSubmissionMaterialsBean_th" class="wd-14p th text-center" style="width: 10%;">
                                                資料提供招請
                                            </th>
                                            <th id="requestCommentBean_th" class="wd-14p th text-center" style="width: 10%;">意見招請</th>
                                            <th id="procurementImplementNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">
                                                調達実施案件公示
                                            </th>
                                            <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">落札公示</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($procurement_high1 as $id => $procurement)
                                            <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                    <div class="icon-fav">
                                                        @if($procurement['rate'] === 0)
                                                            <i class="icon-star none"></i>
                                                        @elseif($procurement['rate'] === 1)
                                                            <i class="fas fa-star low"></i>
                                                        @elseif($procurement['rate'] === 2)
                                                            <i class="fas fa-star middle"></i>
                                                        @else
                                                            <i class="fas fa-star high"></i>
                                                        @endif
                                                    </div>
                                                    <div class="icon-preview" style="display: none;">
                                                        <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                        <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                    </div>
                                                </td>
                                                <td>{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}</td>
                                                <td>{{$procurement['procurement_name']}}</td>
                                                <td>{{$procurement['procurement_agency']}}</td>
                                                <td>{{$procurement['address']}}</td>
                                                <td>
                                                    @if($procurement['notification_class'] === 3)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 4)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>

                                                    @if($procurement['notification_class'] !== 3 && $procurement['notification_class'] !== 4 && $procurement['notification_class'] !== 8 && $procurement['notification_class'] !== 15 && $procurement['notification_class'] !== 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 8 || $procurement['notification_class'] === 15 || $procurement['notification_class'] === 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        <table class="main-summit-info mt-1 comment_table" style="min-width: 1176px !important; display: none">
                                            <thead>
                                            <tr>
                                                <th style="width: 6%;"></th>
                                                <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 80%;">コメント</th>
                                                <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 14%;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($procurement_high1 as $id => $procurement)
                                                <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                    <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                        <div class="icon-fav">
                                                            @if($procurement['rate'] === 0)
                                                                <i class="icon-star none"></i>
                                                            @elseif($procurement['rate'] === 1)
                                                                <i class="fas fa-star low"></i>
                                                            @elseif($procurement['rate'] === 2)
                                                                <i class="fas fa-star middle"></i>
                                                            @else
                                                                <i class="fas fa-star high"></i>
                                                            @endif
                                                        </div>
                                                        <div class="icon-preview" style="display: none;">
                                                            <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                            <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form class="comment_form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="procurement_id" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                            @if(count($procurement['comment']) === 0)
                                                                <p style="color: red">まだコメントがありません。</p>
                                                            @endif
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">管理番号：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="manage_comment_id" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['manage_comment_id'] : ''}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">調達案件名称：</label>

                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="procurement_name" value="{{$procurement['procurement_name']}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right px-0">調達情報の詳細：</label>

                                                                <div class="col-md-6" style="margin-top: 5px;">
                                                                    <a href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red !important' : ''}}">期日１：</label>

                                                                <div class="col-md-6">
                                                                    <input type="date" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_1" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_1'])) ? date('Y-m-d', strtotime($procurement['comment'][0]['period_1'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 col-form-label text-md-left pl-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}">
                                                                    <label>公開開始日</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red !important' : ''}}">期日２：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_2" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_2'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_2'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_2" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_2'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red !important' : ''}}">期日３：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_3" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_3'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_3'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" name="description_3" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_3'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red !important' : ''}}">期日４：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_4" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_4'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_4'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_4" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_4'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red !important' : ''}}">期日５：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_5" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_5'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_5'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_5" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_5'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">担当者：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="tantosha_name" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['tantosha_name'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">コメント：</label>

                                                                <div class="col-md-9">
                                                                    <input type="hidden" class="form-control comment_value" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['comment'] : ''}}">
                                                                    <div class="comment"></div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary comment_save">
                                                            保存
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="result-detail mt-1">
                                    @if($middle1 > 30)
                                        <p class="main-item-txt" style="color: red">
                                            30件を超過しました。
                                            30件未満に設定してください。
                                        </p>
                                    @endif
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12" style="text-align: right;">
                                                <button class="btn btn-primary comment_show">
                                                    コメント一覧の表示
                                                </button>
                                                <button class="btn btn-primary info_show" style="display: none">
                                                    案件一覧の表示
                                                </button>
                                            </div>
                                        </div>
                                    <table class="main-summit-info mt-1 info_table" style="min-width: 1176px !important;">
                                        <thead>
                                        <tr>
                                            <th style="width: 6%;"></th>
                                            <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 14%;">調達案件番号</th>
                                            <th id="articleNm_th" class="wd-14p th text-center" style="width: 15%;">調達案件名称</th>
                                            <th id="procurementOrgan_th" class="wd-9p th text-center" style="width: 9%;">調達機関</th>
                                            <th id="receiptAddress_th" class="wd-10p th text-center" style="width: 10%;">所在地</th>
                                            <th id="requestSubmissionMaterialsBean_th" class="wd-14p th text-center" style="width: 10%;">
                                                資料提供招請
                                            </th>
                                            <th id="requestCommentBean_th" class="wd-14p th text-center" style="width: 10%;">意見招請</th>
                                            <th id="procurementImplementNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">
                                                調達実施案件公示
                                            </th>
                                            <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">落札公示</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($procurement_middle1 as $procurement)
                                            <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                    <div class="icon-fav">
                                                        @if($procurement['rate'] === 0)
                                                            <i class="icon-star none"></i>
                                                        @elseif($procurement['rate'] === 1)
                                                            <i class="fas fa-star low"></i>
                                                        @elseif($procurement['rate'] === 2)
                                                            <i class="fas fa-star middle"></i>
                                                        @else
                                                            <i class="fas fa-star high"></i>
                                                        @endif
                                                    </div>
                                                    <div class="icon-preview" style="display: none;">
                                                        <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                        <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                    </div>
                                                </td>
                                                <td>{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}</td>
                                                <td>{{$procurement['procurement_name']}}</td>
                                                <td>{{$procurement['procurement_agency']}}</td>
                                                <td>{{$procurement['address']}}</td>
                                                <td>
                                                    @if($procurement['notification_class'] === 3)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 4)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>

                                                    @if($procurement['notification_class'] !== 3 && $procurement['notification_class'] !== 4 && $procurement['notification_class'] !== 8 && $procurement['notification_class'] !== 15 && $procurement['notification_class'] !== 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 8 || $procurement['notification_class'] === 15 || $procurement['notification_class'] === 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        <table class="main-summit-info mt-1 comment_table" style="min-width: 1176px !important; display: none">
                                            <thead>
                                            <tr>
                                                <th style="width: 6%;"></th>
                                                <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 80%;">コメント</th>
                                                <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 14%;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($procurement_middle1 as $id => $procurement)
                                                <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                    <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                        <div class="icon-fav">
                                                            @if($procurement['rate'] === 0)
                                                                <i class="icon-star none"></i>
                                                            @elseif($procurement['rate'] === 1)
                                                                <i class="fas fa-star low"></i>
                                                            @elseif($procurement['rate'] === 2)
                                                                <i class="fas fa-star middle"></i>
                                                            @else
                                                                <i class="fas fa-star high"></i>
                                                            @endif
                                                        </div>
                                                        <div class="icon-preview" style="display: none;">
                                                            <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                            <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form class="comment_form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="procurement_id" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                            @if(count($procurement['comment']) === 0)
                                                                <p style="color: red">まだコメントがありません。</p>
                                                            @endif
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">管理番号：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="manage_comment_id" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['manage_comment_id'] : ''}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">調達案件名称：</label>

                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="procurement_name" value="{{$procurement['procurement_name']}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right px-0">調達情報の詳細：</label>

                                                                <div class="col-md-6" style="margin-top: 5px;">
                                                                    <a href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red !important' : ''}}">期日１：</label>

                                                                <div class="col-md-6">
                                                                    <input type="date" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_1" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_1'])) ? date('Y-m-d', strtotime($procurement['comment'][0]['period_1'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 col-form-label text-md-left pl-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}">
                                                                    <label>公開開始日</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red !important' : ''}}">期日２：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_2" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_2'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_2'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_2" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_2'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red !important' : ''}}">期日３：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_3" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_3'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_3'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" name="description_3" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_3'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red !important' : ''}}">期日４：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_4" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_4'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_4'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_4" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_4'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red !important' : ''}}">期日５：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_5" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_5'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_5'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_5" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_5'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">担当者：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="tantosha_name" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['tantosha_name'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">コメント：</label>

                                                                <div class="col-md-9">
                                                                    <input type="hidden" class="form-control comment_value" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['comment'] : ''}}">
                                                                    <div class="comment"></div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary comment_save">
                                                            保存
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="result-detail mt-1">
                                    @if($low1 > 30)
                                        <p class="main-item-txt" style="color: red">
                                            30件を超過しました。
                                            30件未満に設定してください。
                                        </p>
                                    @endif
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12" style="text-align: right;">
                                                <button class="btn btn-primary comment_show">
                                                    コメント一覧の表示
                                                </button>
                                                <button class="btn btn-primary info_show" style="display: none">
                                                    案件一覧の表示
                                                </button>
                                            </div>
                                        </div>
                                    <table class="main-summit-info mt-1 info_table" style="min-width: 1176px !important;">
                                        <thead>
                                        <tr>
                                            <th style="width: 6%;"></th>
                                            <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 14%;">調達案件番号</th>
                                            <th id="articleNm_th" class="wd-14p th text-center" style="width: 15%;">調達案件名称</th>
                                            <th id="procurementOrgan_th" class="wd-9p th text-center" style="width: 9%;">調達機関</th>
                                            <th id="receiptAddress_th" class="wd-10p th text-center" style="width: 10%;">所在地</th>
                                            <th id="requestSubmissionMaterialsBean_th" class="wd-14p th text-center" style="width: 10%;">
                                                資料提供招請
                                            </th>
                                            <th id="requestCommentBean_th" class="wd-14p th text-center" style="width: 10%;">意見招請</th>
                                            <th id="procurementImplementNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">
                                                調達実施案件公示
                                            </th>
                                            <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 13%;">落札公示</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($procurement_low1 as $id => $procurement)
                                            <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                    <div class="icon-fav">
                                                        @if($procurement['rate'] === 0)
                                                            <i class="icon-star none"></i>
                                                        @elseif($procurement['rate'] === 1)
                                                            <i class="fas fa-star low"></i>
                                                        @elseif($procurement['rate'] === 2)
                                                            <i class="fas fa-star middle"></i>
                                                        @else
                                                            <i class="fas fa-star high"></i>
                                                        @endif
                                                    </div>
                                                    <div class="icon-preview" style="display: none;">
                                                        <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                        <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                        <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                    </div>
                                                </td>
                                                <td>{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}</td>
                                                <td>{{$procurement['procurement_name']}}</td>
                                                <td>{{$procurement['procurement_agency']}}</td>
                                                <td>{{$procurement['address']}}</td>
                                                <td>
                                                    @if($procurement['notification_class'] === 3)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 4)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>

                                                    @if($procurement['notification_class'] !== 3 && $procurement['notification_class'] !== 4 && $procurement['notification_class'] !== 8 && $procurement['notification_class'] !== 15 && $procurement['notification_class'] !== 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($procurement['notification_class'] === 8 || $procurement['notification_class'] === 15 || $procurement['notification_class'] === 16)
                                                        <a class="koukoku info-button" tabindex="4103"
                                                           href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a><br>

                                                        {{$procurement['public_start_date']}}公開開始
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        <table class="main-summit-info mt-1 comment_table" style="min-width: 1176px !important; display: none">
                                            <thead>
                                            <tr>
                                                <th style="width: 6%;"></th>
                                                <th id="procurementItemNo_no" class="wd-12p th text-center" style="width: 80%;">コメント</th>
                                                <th id="successfulBidNoticeBean_th" class="wd-14p th text-center" style="width: 14%;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($procurement_low1 as $id => $procurement)
                                                <tr style="{{$id === 30 ? 'border-top: 2px solid red;' : ''}}">
                                                    <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                                        <div class="icon-fav">
                                                            @if($procurement['rate'] === 0)
                                                                <i class="icon-star none"></i>
                                                            @elseif($procurement['rate'] === 1)
                                                                <i class="fas fa-star low"></i>
                                                            @elseif($procurement['rate'] === 2)
                                                                <i class="fas fa-star middle"></i>
                                                            @else
                                                                <i class="fas fa-star high"></i>
                                                            @endif
                                                        </div>
                                                        <div class="icon-preview" style="display: none;">
                                                            <i class="fas fa-star high {{$procurement['rate'] === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star middle {{$procurement['rate'] === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="fas fa-star low {{$procurement['rate'] === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                                            <i class="icon-star none {{$procurement['rate'] === 0 ? 'active-fav' : ''}}"></i>
                                                            <input type="hidden" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form class="comment_form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="procurement_id" value="{{str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT)}}">
                                                            @if(count($procurement['comment']) === 0)
                                                                <p style="color: red">まだコメントがありません。</p>
                                                            @endif
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">管理番号：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="manage_comment_id" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['manage_comment_id'] : ''}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">調達案件名称：</label>

                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="procurement_name" value="{{$procurement['procurement_name']}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right px-0">調達情報の詳細：</label>

                                                                <div class="col-md-6" style="margin-top: 5px;">
                                                                    <a href="{{route('detail', str_pad((string)($procurement['id']), 29, '0', STR_PAD_LEFT))}}">公示本文</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red !important' : ''}}">期日１：</label>

                                                                <div class="col-md-6">
                                                                    <input type="date" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_1" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_1'])) ? date('Y-m-d', strtotime($procurement['comment'][0]['period_1'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 col-form-label text-md-left pl-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 0) ? 'color: red' : ''}}">
                                                                    <label>公開開始日</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red !important' : ''}}">期日２：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_2" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_2'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_2'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_2" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 1) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_2'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red !important' : ''}}">期日３：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_3" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_3'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_3'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 2) ? 'color: red' : ''}}" name="description_3" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_3'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red !important' : ''}}">期日４：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_4" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_4'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_4'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_4" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 3) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_4'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red !important' : ''}}">期日５：</label>

                                                                <div class="col-md-6">
                                                                    <input type="datetime-local" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" class="date hasDatepicker mousetrap form-control" name="period_5" value="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['period_5'])) ? date('Y-m-d\TH:i', strtotime($procurement['comment'][0]['period_5'])) : ''}}">
                                                                </div>
                                                                <div class="col-md-3 pl-0">
                                                                    <input type="text" class="form-control" name="description_5" style="{{(count($procurement['comment']) === 1 && isset($procurement['comment'][0]['closet']) && $procurement['comment'][0]['closet'] === 4) ? 'color: red' : ''}}" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['description_5'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">担当者：</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="tantosha_name" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['tantosha_name'] : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label text-md-right pr-0">コメント：</label>

                                                                <div class="col-md-9">
                                                                    <input type="hidden" class="form-control comment_value" value="{{count($procurement['comment']) === 1 ? $procurement['comment'][0]['comment'] : ''}}">
                                                                    <div class="comment"></div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary comment_save">
                                                            保存
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-12" style="text-align: right;">
                            <button id="mail_send" type="submit" class="btn btn-primary">
                                {{ __('お気に入り一覧送信') }}
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
    <script src="{{asset('template/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/js/vendors/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('template/js/vendors/selectize.min.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>
    {{--    <script src="{{asset('js/commonPps.js')}}"></script>--}}

    <script src="{{asset('js/UAA01.js')}}"></script>
    <!-- Data tables -->
    <script src="{{ asset('template/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('admin_tmp/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin_tmp/js/plugin/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        let cnt, page, cur_page = 1, per_page = 10;
        let searchCon;
        let resultTable;
        let home_path = $("#home_path").val();
        $(document).ready(function () {
            $('.comment').summernote({
                placeholder: 'ヘッダー',
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
                tabsize: 2,
                height: 200,
                width:750,
            });
            let comment_value = $('#comment_value').val();
            $('.comment_value').each(function () {
                let comment_value = $(this).val()
                $(this).next().summernote('code', comment_value);

            })
            $('.comment_save').click(function () {
                if($(this).parent().prev().find('[name=manage_comment_id]').val() !== "" && $(this).parent().prev().find('.comment').summernote('code') !== ""){
                    console.log('d')
                    var paramObj = new FormData($(this).parent().prev().find(".comment_form")[0]);
                    paramObj.append('comment', $(this).parent().prev().find('.comment').summernote('code'))
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
            $('.comment_show').click(function () {
                $(this).next().show();

                $(this).parent().parent().parent().find('table.info_table').hide();
                $(this).parent().parent().parent().find('table.comment_table').show();
                $(this).hide()

            })
            $('.info_show').click(function () {
                $(this).prev().show();

                $(this).parent().parent().parent().find('table.info_table').show();
                $(this).parent().parent().parent().find('table.comment_table').hide();
                $(this).hide()

            })

            $('#mail_send').click(function(){
                var token = $("meta[name='_csrf']").attr("content");
                var home_path = $("#home_path").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

                let url = home_path + '/send-favourite';
                $.ajax({
                    url: url,
                    type: 'get',
                    data: {},
                    success: function (response) {
                        let content = {};
                        content.message = 'お気に入り一覧を送信しました。';
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
                })
            })
            $('input:radio[name="classify"]').change(function(){

                if ($(this).val() === '1') {
                    $('#public_part').hide();
                    $('#end_part').show();
                    $('#info_public').hide();
                    $('#info_end').show();
                }
                else {
                    $('#public_part').show();
                    $('#end_part').hide();
                    $('#info_public').show();
                    $('#info_end').hide();
                }
            });
            $('.favourite').hover(
                function()  { //hover
                    $(this).find('.icon-fav').hide();
                    $(this).find('.icon-preview').show();
                },
                function() { //out
                    $(this).find('.icon-fav').show();
                    $(this).find('.icon-preview').hide();
                }
            );
            $('.icon-preview i').click(function () {
                let rate, cont;
                let $t = $(this);
                if(!$(this).hasClass('active-fav')){
                    if($(this).hasClass('high')){
                        rate = 3;
                    }
                    if($(this).hasClass('middle')){
                        rate = 2;
                    }
                    if($(this).hasClass('low')){
                        rate = 1;
                    }
                    if($(this).hasClass('none')){
                        rate = 0;
                    }

                    let token = $("meta[name='_csrf']").attr("content");
                    let formData = new FormData();
                    let procurement_id = $(this).parent().find('input').val();
                    formData.append('rate', rate)
                    formData.append('procurement_id', procurement_id)
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    });

                    var url = home_path + '/change-favourite';
                    $.ajax({
                        url:url,
                        type:'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log(response);
                            if(response.status === true){
                                let content = {};
                                content.message = '注目度を変更しました。';
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
                                window.location.reload();
                            }
                            else{
                                let content = {};
                                content.message = '35件を超過しました。\n' +
                                    '30 件未満に設定してください。';
                                content.title = '失敗';
                                $.notify(content,{
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
                }
            })
            let public_type = $('#public_type').val();
            let type = $('#type').val();
            if(public_type === "2"){
                $('input:radio[name=classify]')[1].checked = true;
                $('input:radio[name=classify]').trigger('change');
            }
            $('#public_' + type).trigger('click');
            $('#' + public_type + '-' + type).trigger('click');
        })
    </script>
@endsection
