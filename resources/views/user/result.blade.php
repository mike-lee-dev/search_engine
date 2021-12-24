@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{asset('template/fonts/fonts/font-awesome.min.css')}}">
    <!-- Dashboard Css -->
    <link href="{{asset('template/css/dashboard.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/commonForm.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/common.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/commonBbs.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/tables1.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin_tmp/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('admin_tmp/css/fonts.css')}}">
    <style>
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
    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-ttl">
                    <div class="ttl-area">
                        <h2>調達情報の検索</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="main-item">

                    <input id="overflow" type="hidden" value="{{$overflow}}">

                    <div class="alert message-info" id="overflow_area" style="display: none">
                        <ul class="mb-0">
                            <li>検索結果が500件を超えたため、先頭の500件を表示します。</li>
                        </ul>
                    </div>

                    <div class="alert message-error input-error-list" style="display: none;"></div>
                    <p class="main-item-txt" id="info01">等級別検索サイトに登録されている調達情報をＡ，Ｂ，Ｃ，Ｄの等級別に検索することができます。また、直近に参照した調達情報を表示します。</p>

                    <table class="dsc1item" cellspacing="1" style="color: #333">
                        <tbody>
                        <tr>
                            <th width="20">説明</th>
                            <td><a><img src="{{asset('img/button_042.jpg')}}"
                                        alt="株式会社日本スマートマーケティング"></a>：クリックで選択項目を表示
                            </td>
                            <td><a><img src="{{asset('img/button_07.jpg')}}"
                                        alt="株式会社日本スマートマーケティング"></a>：クリックで検索条件の説明
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <!-- メイン 過去の検索条件 -->
                    <h3>過去の検索条件</h3>
                    <p id="info02">[過去の検索条件を開く]をクリックし、指定した検索条件を確認してください。</p>
                    <dl class="main-item-acodion mt-3">
                        <dt class="acodion_on acodion_bar is-active" tabindex="1000">過去の検索条件を開く</dt>
                        <dd class="acodion_content is-close px-0 py-0" style="display: none; overflow-x: scroll">
                            <table class="main-summit-info" style="min-width: 1176px !important;">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">調達種別</th>
                                    <th style="width: 5%;">分類</th>
                                    <th style="width: 10%;">調達機関</th>
                                    <th style="width: 10%;">所在地</th>
                                    <th style="width: 10%;">品目分類</th>
                                    <th style="width: 10%;">
                                        公開開始日
                                    </th>
                                    <th style="width: 10%;">公開終了日</th>
                                    <th style="width: 5%;">
                                        調達案件名称
                                    </th>
                                    <th style="width: 5%;">調達案件番号</th>
                                    <th style="width: 5%;">公示本文のキーワード指定</th>
                                    <th style="width: 5%;">表示件数</th>
                                    <th style="width: 5%;">等級指定（次の等級を含む）</th>
                                    <th style="width: 5%;">等級指定（次の等級を除く）</th>
                                    <th style="width: 5%;">検索件数</th>
                                    <th style="width: 5%;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($search_histories as $search_history)
                                    <tr>
                                        <td>{{$search_history->search_type == null ? '指定なし' : $search_history->search_type}}</td>
                                        <td>{{$search_history->search_classify == '0' ? '全て' : ($search_history->search_classify == '1' ? '物品・役務' : '簡易な公共事業')}}</td>
                                        <td>{{$search_history->search_agency == null ? '指定なし' : $search_history->search_agency}}</td>
                                        <td>{{$search_history->search_address == null ? '指定なし' : $search_history->search_address}}</td>
                                        <td>{{$search_history->search_item_classify == null ? '指定なし' : $search_history->search_item_classify}}</td>
                                        <td>{{$search_history->public_start}}</td>
                                        <td>{{$search_history->public_end}}</td>
                                        <td>{{$search_history->search_name == null ? '指定なし' : $search_history->search_name}}</td>
                                        <td>{{$search_history->search_public_id == null ? '指定なし' : $search_history->search_public_id}}</td>
                                        <td>{{$search_history->search_official_text == null ? '指定なし' : $search_history->search_official_text}}</td>
                                        <td>{{$search_history->search_per_page}}</td>
                                        <td>{{$search_history->grade}}</td>
                                        <td>{{$search_history->no_grade}}</td>
                                        <td>{{$search_history->result_cnt}}</td>
                                        <td>
                                            <a class="koukoku info-button" tabindex="4103"
                                               href="{{route('history-search', $search_history->id)}}" style="padding: 5px 0">検索</a><br>

                                            {{$search_history->created_at}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </dd>
                    </dl>
                    <!-- /メイン 過去の検索条件 -->

                    <!-- メイン 現在の検索条件 -->
                    <h3>現在の検索条件</h3>
                    <p id="info02">[現在の検索条件を開く]をクリックし、指定した検索条件を確認してください。</p>
                    <dl class="main-item-acodion mt-3">
                        <dt class="acodion_on acodion_bar is-active" tabindex="1000">現在の検索条件を開く</dt>
                        <dd class="acodion_content is-close" style="display: none;">
                            <input type="hidden" id="searchCon" value="{{$searchCon}}">
                            <dl class="content_block">
                                <dt>
                                    <span>案件分類</span>
                                </dt>
                                <dd>公開中の調達案件</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>調達種別</span>
                                </dt>
                                <dd id="searchCon_type">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>分類</span>
                                </dt>
                                <dd id="searchCon_classify">全て</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>調達機関</span>
                                </dt>
                                <!-- 過渡期運用のためコメントアウト
                                    <dd>全て</dd> -->
                            </dl>
                            <dl class="content_block" style="margin-left: 25px;">
                                <dt>
                                    <span>調達機関（国）</span>
                                </dt>
                                <dd id="searchCon_agency">機関名&nbsp;:&nbsp;指定なし</dd>
                                <dd id="searchCon_address">所在地&nbsp;:&nbsp;指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>品目分類</span>
                                </dt>
                                <dd id="searchCon_item_classify">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>公開開始日</span>
                                </dt>
                                <dd id="searchCon_public_start_date">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>公開終了日</span>
                                </dt>
                                <dd id="searchCon_public_end_date">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>調達案件名称</span>
                                </dt>
                                <dd id="searchCon_name">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>調達案件番号</span>
                                </dt>
                                <dd id="searchCon_public_id">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>公示本文のキーワード指定</span>
                                </dt>
                                <dd id="searchCon_official_text">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>表示件数</span>
                                </dt>
                                <dd id="searchCon_per_page">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>等級指定（次の等級を含む）</span>
                                </dt>
                                <dd id="searchCon_grade">指定なし</dd>
                            </dl>
                            <dl class="content_block">
                                <dt>
                                    <span>等級指定（次の等級を除く）</span>
                                </dt>
                                <dd id="searchCon_no_grade">指定なし</dd>
                            </dl>
                        </dd>
                    </dl>
                    <!-- /メイン 現在の検索条件 -->
                    <!-- メイン 条件を再指定して検索 -->
                    <h3>条件を変えて検索</h3>
                    <p>もう一度検索する場合は、「検索条件の項目を開く」を押し、検索条件を変えて検索してください。</p>
                    <dl class="main-item-acodion">
                        <dt class="acodion_on acodion_bar is-active" tabindex="1100">検索条件の項目を開く</dt>
                        <dd class="acodion_content is-close" style="display: none;">
                            <form id="search_form" novalidate="true" action="{{route('search-result')}}"
                                  enctype="multipart/form-data" method="post">
                                @csrf
                                <ul class="ta ble-name">
                                    <dl class="table-form">
                                        <dt>
                                            <span>案件分類</span>
                                            <div class="table-tip">
                                                <div class="table-tip-txt">
                                                    <img src="{{asset('img/icn_close.png')}}"
                                                         alt="閉じる"
                                                         class="tip-txt-close" tabindex="1210">
                                                    <p tabindex="1220" id="komoku01">
                                                        公開中の調達案件すべてを対象にするか、自社が落札した案件に絞り込むかを選択します。<br>ログインしていない場合、ＩＤ・パスワードでログインしている場合は自社の落札した調達案件で絞り込むことはできません。
                                                    </p>
                                                </div>
                                            </div>
                                        </dt>
                                        <dd>
                                                <span>
                                                    <input id="searchConditionBean.caseDivision1"
                                                           name="searchConditionBean.caseDivision" tabindex="1230"
                                                           disabled="disabled"
                                                           type="radio" value="0" checked="checked" class="mousetrap">
                                                    <label for="searchConditionBean.caseDivision1" class="table-radio"
                                                           tabindex="1230">　公開中の調達案件　│　自社が落札した調達案件（<a
                                                            href="https://www.p-portal.go.jp/pps-web-biz/UZA01/OZA0101">調達ポータル</a>に移動）</label>
                                                </span>
                                            {{--                                                <span>--}}
                                            {{--                                                    <input id="searchConditionBean.caseDivision2"--}}
                                            {{--                                                        name="searchConditionBean.caseDivision"--}}
                                            {{--                                                        tabindex="1230" disabled="disabled" type="radio" value="1"--}}
                                            {{--                                                        class="mousetrap">--}}
                                            {{--                                                    <label for="searchConditionBean.caseDivision2" class="table-radio" tabindex="1230">--}}
                                            {{--                                                        自社が落札した調達案件（ログイン時のみ）</label>--}}
                                            {{--                                                </span>--}}
                                        </dd>
                                    </dl>
                                </ul>
                                <ul class="table-name">
                                    <dl class="table-form">
                                        <dt>
                                            <span>調達種別</span>
                                            <div class="table-tip" data-toggle="modal" data-target="#select_type">
                                                <img src="{{asset('img/button_042.jpg')}}"
                                                     alt="補足説明"
                                                     class="tip-icn over" tabindex="1800">
                                            </div>
                                        </dt>
                                        <input id="procurementCla" name="typeCase"
                                               type="hidden" value=""
                                               class="mousetrap">
                                        <dd style="width: 97%; border-bottom: none;" id="procurementClaText">
                                        </dd>
                                    </dl>
                                </ul>
                                <ul class="table-name">
                                    <dl class="table-form">
                                        <dt>
                                            <span>分類</span>
                                        </dt>
                                        <dd>
                                                <span>
                                                    <input id="searchConditionBean.cla1" name="classify"
                                                           tabindex="1730" type="radio" value="0" checked="checked"
                                                           class="mousetrap">
                                                    <label for="searchConditionBean.cla1" class="table-radio"
                                                           tabindex="1730">全て</label>
                                                </span>
                                            <span>
                                                    <input id="searchConditionBean.cla2" name="classify"
                                                           tabindex="1730"
                                                           type="radio" value="1" class="mousetrap">
                                                    <label
                                                        for="searchConditionBean.cla2"
                                                        class="table-radio"
                                                        tabindex="1730">物品・役務</label>
                                                </span>
                                            <span>
                                                    <input id="searchConditionBean.cla3" name="classify"
                                                           tabindex="1730"
                                                           type="radio" value="2" class="mousetrap">
                                                    <label
                                                        for="searchConditionBean.cla3"
                                                        class="table-radio"
                                                        tabindex="1730">簡易な公共事業</label>
                                                </span>
                                        </dd>
                                    </dl>
                                </ul>
                                <ul class="table-name">
                                    <dl class="table-form">
                                        <dt>
                                            <span>調達機関</span>

                                        </dt>
                                        <!-- 過渡期運用のためコメントアウト
                                            <dd>
                                                <span><input id="searchConditionBean.procurementOrgan1" name="searchConditionBean.procurementOrgan" tabindex="1930" type="radio" value="01" checked="checked"/><label for="searchConditionBean.procurementOrgan1">全て</label></span><span><input id="searchConditionBean.procurementOrgan2" name="searchConditionBean.procurementOrgan" tabindex="1930" type="radio" value="02"/><label for="searchConditionBean.procurementOrgan2">国</label></span><span><input id="searchConditionBean.procurementOrgan3" name="searchConditionBean.procurementOrgan" tabindex="1930" type="radio" value="03"/><label for="searchConditionBean.procurementOrgan3">地方公共団体</label></span>

                                            </dd>
                                             -->
                                    </dl>
                                </ul>
                                <ul class="table-name">
                                    <dl class="table-form" style="margin-left: 25px;">
                                        <dt>
                                            <span>調達機関（国）</span>
                                            <div class="table-tip" data-toggle="modal" data-target="#modal_02">
                                                <img src="{{asset('img/button_042.jpg')}}"
                                                     alt="補足説明"
                                                     class="tip-icn over" tabindex="2000">
                                                <div class="table-tip-txt">
                                                    <img src="{{asset('img/icn_close.png')}}"
                                                         alt="閉じる"
                                                         class="tip-txt-close" tabindex="2010">
                                                    <p tabindex="2020" id="komoku09">
                                                        <!-- 過渡期運用のためコメントアウト -->
                                                        <!-- 検索する調達機関で全て、もしくは国を選択した場合、 -->
                                                        [選択]ボタンをクリックして国の調達機関と所在地を選択してください。<br>選択しない場合は、全ての調達機関、所在地で検索します。
                                                    </p>
                                                </div>
                                            </div>
                                        </dt>

                                        <dl class="table-form">
                                            <input id="procurementOrganNm"
                                                   name="procurementOrganNm"
                                                   type="hidden" value="" class="mousetrap">
                                            <dd id="procurementOrganNmtitle"
                                                style="width: 70px; display: none; vertical-align: top; margin-right: -5px;">
                                                機関名：
                                            </dd>
                                            <dd style="width: 91%; border-bottom: none; display: none; margin-left: 0px;"
                                                id="procurementOrganNmText"></dd>
                                            <input id="receiptAddress" name="receiptAddress"
                                                   type="hidden"
                                                   value="" class="mousetrap">
                                            <dd id="receiptAddresstitle"
                                                style="width: 70px; display: none; vertical-align: top; margin-right: -5px;">
                                                所在地：
                                            </dd>
                                            <dd style="width: 91%; border-bottom: none; display: none; margin-left: 0px;"
                                                id="receiptAddressText"></dd>
                                        </dl>
                                    </dl>
                                </ul>

                                <ul class="table-name">
                                    <dl class="table-form">
                                        <dt>
                                            <span>品目分類</span>
                                            <div class="table-tip" data-toggle="modal" data-target="#modal_04">
                                                <img src="{{asset('img/button_042.jpg')}}"
                                                     alt="補足説明"
                                                     class="tip-icn over" tabindex="2200">
                                                <div class="table-tip-txt">
                                                    <img src="{{asset('img/icn_close.png')}}"
                                                         alt="閉じる"
                                                         class="tip-txt-close" tabindex="2210">
                                                    <p tabindex="2220" id="komoku11">調達の品目分類を選択してください。</p>
                                                </div>
                                            </div>
                                        </dt>
                                        <input id="procurementItemCla" name="procurementItemCla"
                                               type="hidden"
                                               value="" class="mousetrap">
                                        <dd style="width: 97%; border-bottom: none;" id="procurementItemClaText">
                                        </dd>

                                    </dl>
                                </ul>
                                <ul class="table-name mb-0 mx-0" style="overflow: visible">

                                    <li class="col-sm-6">
                                        <dl class="table-form">
                                            <dt>
                                                <span>公開開始日</span>
                                            </dt>
                                            <dd class="mt-3">
                                                <label for="start-date-from" class="start-date">公開開始日の自</label>
                                                <input id="start-date-from"
                                                       name="publicStartDateFrom"
                                                       title="公開開始日の自" tabindex="1430" placeholder="指定なし"
                                                       type="date"
                                                       class="date hasDatepicker mousetrap" value="" maxlength="10">
                                                <span>～</span> <label for="start-date-to"
                                                                      class="start-date">公開開始日の至</label>
                                                <input id="start-date-to"
                                                       name="publicStartDateTo"
                                                       title="公開開始日の至" tabindex="1440" placeholder="指定なし"
                                                       type="date"
                                                       class="date hasDatepicker mousetrap" value="" maxlength="10">


                                            </dd>
                                        </dl>
                                        <dl class="table-form">
                                            <dt>
                                                <span>公開終了日</span>
                                            </dt>
                                            <dd class="mt-3">
                                                <label for="end-date-from" class="end-date">公開終了日の自</label>
                                                <input id="end-date-from"
                                                       name="publicEndDateFrom"
                                                       title="公開終了日の自" tabindex="1530" placeholder="指定なし"
                                                       type="date"
                                                       class="date hasDatepicker mousetrap" value="" maxlength="10">
                                                <span>～</span> <label for="end-date-to"
                                                                      class="end-date">公開終了日の至</label>
                                                <input id="end-date-to" name="publicEndDateTo"
                                                       title="公開終了日の至"
                                                       tabindex="1540" placeholder="指定なし" type="date"
                                                       class="date hasDatepicker mousetrap" value="" maxlength="10">
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="col-sm-6 px-0">
                                        <dl class="table-form">
                                            <dt>
                                                <span><label for="case-name">調達案件名称</label></span>
                                                <div class="table-tip">
                                                    <img
                                                        src="{{asset('img/button_07.jpg')}}"
                                                        alt="補足説明"
                                                        class="tip-icn over" tabindex="1600">
                                                    <div class="table-tip-txt">
                                                        <img
                                                            src="{{asset('img/icn_close.png')}}"
                                                            alt="閉じる"
                                                            class="tip-txt-close" tabindex="1610">
                                                        <p tabindex="1620" id="komoku05">
                                                            <img src="{{asset('img/button_03.jpg')}}" alt="株式会社日本スマートマーケティング">AND検索<br>
                                                            キーワードを「　」（全角スペース）で区切って入れれば、全てのキーワードを含む資料だけが検索されるAND検索となります。<br>
                                                            例①）役務の提供　調査・研究　→　役務の提供　AND　調査・研究<br>
                                                            <img src="{{asset('img/button_03.jpg')}}" alt="株式会社日本スマートマーケティング">OR検索<br>
                                                            キーワードを「+」（全角プラス記号）で区切って入れれば、いずれか１つのキーワードを含む資料が検索されるOR検索となります。<br>
                                                            例②）印刷＋出版　→　印刷 OR 出版<br>
                                                            <img src="{{asset('img/button_03.jpg')}}" alt="株式会社日本スマートマーケティング">NOT検索<br>
                                                            含みたくないキーワードの前に「^」（全角キャレット）をつけて入力すればNOT検索となる。ただし、NOT検索の場合は必ず他のキーワードとのAND検索として入力する必要があります。<br>
                                                            例③）コンテンツ＾総合評価　→　コンテンツ AND (NOT 総合評価)<br>
                                                            <img src="{{asset('img/button_03.jpg')}}" alt="株式会社日本スマートマーケティング">複合検索<br>
                                                            例①②③を同時に複合検索することができます。<br>
                                                            例①の検索結果が５件、例②の検索結果が１０件、例③の検索結果が１５件である場合、複合検索の結果は３０件表示されます。<br>
                                                            ①②③を「　＋　」（全角スペース＋全角スペース）で区切ります。<br>
                                                            例④）役務の提供　調査・研究　＋　印刷＋出版　＋　コンテンツ＾総合評価　→　［役務の提供　AND　調査・研究］　OR　［印刷 OR 出版］　OR　［コンテンツ AND (NOT 総合評価)］
                                                        </p>
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd>
                                                <input id="case-name" name="articleNm"
                                                       tabindex="1630"
                                                       placeholder="254文字以内" type="text"
                                                       class="hankaku-zenkaku mousetrap" value=""
                                                       maxlength="254">

                                            </dd>
                                        </dl>
                                        <dl class="table-form">
                                            <dt>
                                                <span><label for="case-number">調達案件番号</label></span>
                                            </dt>
                                            <dd>
                                                <input id="case-number" name="procurementItemNo"
                                                       tabindex="1330"
                                                       placeholder="半角29文字" type="number"
                                                       class="only-hankaku mousetrap"
                                                       oninput="if(value.length>29)value=value.slice(0,29)"
                                                       value="">

                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="col-12">
                                        <dl class="table-form">
                                            <dt>
                                                <span>公示本文のキーワード指定</span>
                                                <div class="table-tip">
                                                    <img src="{{asset('img/button_07.jpg')}}"
                                                         alt="補足説明"
                                                         class="tip-icn over" tabindex="2200">
                                                    <div class="table-tip-txt">
                                                        <img src="{{asset('img/icn_close.png')}}"
                                                             alt="閉じる"
                                                             class="tip-txt-close" tabindex="2210">
                                                        <p tabindex="2220" id="komoku11">
                                                            <img src="{{asset('img/button_03.jpg')}}" alt="株式会社日本スマートマーケティング">AND検索<br>
                                                            キーワードを「　」（全角スペース）で区切って入れれば、全てのキーワードを含む資料だけが検索されるAND検索となります。<br>
                                                            例①）役務の提供　調査・研究　→　役務の提供　AND　調査・研究<br>
                                                            <img src="{{asset('img/button_03.jpg')}}" alt="株式会社日本スマートマーケティング">OR検索<br>
                                                            キーワードを「+」（全角プラス記号）で区切って入れれば、いずれか１つのキーワードを含む資料が検索されるOR検索となります。<br>
                                                            例②）印刷＋出版　→　印刷 OR 出版<br>
                                                            <img src="{{asset('img/button_03.jpg')}}" alt="株式会社日本スマートマーケティング">NOT検索<br>
                                                            含みたくないキーワードの前に「^」（全角キャレット）をつけて入力すればNOT検索となる。ただし、NOT検索の場合は必ず他のキーワードとのAND検索として入力する必要があります。<br>
                                                            例③）コンテンツ＾総合評価　→　コンテンツ AND (NOT 総合評価)<br>
                                                            <img src="{{asset('img/button_03.jpg')}}" alt="株式会社日本スマートマーケティング">複合検索<br>
                                                            例①②③を同時に複合検索することができます。<br>
                                                            例①の検索結果が５件、例②の検索結果が１０件、例③の検索結果が１５件である場合、複合検索の結果は３０件表示されます。<br>
                                                            ①②③を「　＋　」（全角スペース＋全角スペース）で区切ります。<br>
                                                            例④）役務の提供　調査・研究　＋　印刷＋出版　＋　コンテンツ＾総合評価　→　［役務の提供　AND　調査・研究］　OR　［印刷 OR 出版］　OR　［コンテンツ AND (NOT 総合評価)］
                                                        </p>
                                                    </div>
                                                </div>

                                            </dt>
                                            <dd>
                                                <input name="keyword" id="keyword" required="" type="text" size="40"
                                                       maxlength="255" minlength="1">
                                            </dd>
                                        </dl>
                                    </li>
                                </ul>

                                <ul class="table-name row mb-0 mx-0" style="overflow: visible">

                                    <li class="col-12 px-0 mb-5">
                                        <dl class="table-form">
                                            <dt>
                                                <span class="mr-3">表示件数</span>
                                                <select name="per_page">
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="300">300</option>
                                                    <option value="500">500</option>
                                                </select>
                                            </dt>
                                        </dl>
                                    </li>

                                    <li class="col-12 px-0 mb-5">
                                        <dl class="table-form">
                                            <dt>
                                                <span>等級指定（次の等級を含む）</span>
                                                <div class="table-tip">
                                                    <img src="{{asset('img/button_07.jpg')}}"
                                                         alt="補足説明"
                                                         class="tip-icn over" tabindex="2200">
                                                    <div class="table-tip-txt">
                                                        <img src="{{asset('img/icn_close.png')}}"
                                                             alt="閉じる"
                                                             class="tip-txt-close" tabindex="2210">
                                                        <p tabindex="2220" id="komoku11">複数の等級の組み合わせについて、指定できます。<br>
                                                            例）A等級の調達情報を指定したい場合、ABCD,ABC，ABを指定することにより、A等級を含む調達情報を検索できます。
                                                            「ABCD」、 「ABC」、 「AB」のすべての組み合わせの検索結果を得ることができます。
                                                            「A」だけを指定した場合も、A等級を含む調達情報を検索することができますが、０.１％～２％程精度が落ちる場合があります。</p>
                                                    </div>
                                                </div>

                                            </dt>
                                            <dd>
                                                <input type="checkbox" name="a_grade">　A　　　　<input type="checkbox"
                                                                                                   name="b_grade">　B　　　<input
                                                    type="checkbox" name="c_grade">　C　　　　<input type="checkbox"
                                                                                                name="d_grade">　D
                                                <br>
                                                <input type="checkbox" name="abcd_grade">　ABCD　　<input type="checkbox"
                                                                                                       name="abc_grade">　ABC　　<input
                                                    type="checkbox" name="ab_grade">　AB
                                                <br>
                                                <input type="checkbox" name="bcd_grade">　BCD　　　<input type="checkbox"
                                                                                                      name="bc_grade">　BC　　　<input
                                                    type="checkbox" name="cd_grade">　CD　　　<input type="checkbox"
                                                                                                 name="none_grade">　等級なし
                                            </dd>
                                            <input type="hidden" id="grade" name="grade">
                                        </dl>
                                    </li>

                                    <li class="col-12 px-0">
                                        <dl class="table-form">
                                            <dt>
                                                <span>等級指定（次の等級を除く）</span>
                                                <div class="table-tip">
                                                    <img src="{{asset('img/button_07.jpg')}}"
                                                         alt="補足説明"
                                                         class="tip-icn over" tabindex="2200">
                                                    <div class="table-tip-txt">
                                                        <img src="{{asset('img/icn_close.png')}}"
                                                             alt="閉じる"
                                                             class="tip-txt-close" tabindex="2210">
                                                        <p tabindex="2220" id="komoku11">複数の等級の組み合わせについて、指定できます。<br>
                                                            例）A等級の調達情報を除きたい場合、Aを指定することにより、A等級含むすべての組み合わせを除く調達情報を検索できます。
                                                            「ABCD」 、 「ABC」、 「AB」、「A」のすべての組み合わせを除いた検索結果を得ることができます。</p>
                                                    </div>
                                                </div>

                                            </dt>
                                            <dd>
                                                <input type="checkbox" name="a_n_grade">　A　　　　<input type="checkbox"
                                                                                                     name="b_n_grade">　B　　　<input
                                                    type="checkbox" name="c_n_grade">　C　　　　<input type="checkbox"
                                                                                                  name="d_n_grade">　D
                                                <br>
                                                <input type="checkbox" name="abcd_n_grade">　ABCD　　<input type="checkbox"
                                                                                                         name="abc_n_grade">　ABC　　<input
                                                    type="checkbox" name="ab_n_grade">　AB
                                                <br>
                                                <input type="checkbox" name="bcd_n_grade">　BCD　　　<input type="checkbox"
                                                                                                        name="bc_n_grade">　BC　　　<input
                                                    type="checkbox" name="cd_n_grade">　CD　　　<input type="checkbox"
                                                                                                   name="none_n_grade">　等級なし
                                            </dd>
                                            <input type="hidden" id="no_grade" name="no_grade">
                                        </dl>
                                    </li>

                                </ul>

                                <p class="txt-img" style="text-align: right">
                                    <button type="submit" class="m-0 p-0" style="border: none;    background: none;">
                                        <img src="{{asset('img/button_01.jpg')}}" alt="株式会社日本スマートマーケティング">
                                    </button>
                                </p>

                                <!--Scrolling Modal-->
                                <div class="modal fade" id="select_type" tabindex="-1" role="dialog"
                                     aria-labelledby="select_type" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 style="margin-top: 15px;">調達種別を選択する</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-type-01">
                                                    <div class="main-modal-inner" style="width: 100%"
                                                         tabindex="2300">
                                                        <div class="modal-contents" id="select-control">
                                                            <p>
                                                                [&nbsp;<a class="table-check-all"
                                                                          tabindex="2320">全選択</a>&nbsp;|&nbsp;<a
                                                                    class="table-check-remove"
                                                                    tabindex="2330">選択解除</a>&nbsp;]
                                                            </p>
                                                            <div class="table-checks modal-Items">
                                                                <dl style="border-collapse: collapse; width: 100%; border: 0px solid;"
                                                                    id="td_procurement_classification">
                                                                    <dd style="padding: 0px; border-bottom: none;">
                                                                        <dl class="table-form">
                                                                            <dt>
                                                                                <span>入札公告（公示）予定、政府調達セミナー及び政府調達年次会合の開催</span>
                                                                            </dt>
                                                                            <dd>
                                                                                <ul style="margin-left: 20px;">
                                                                                    <li>
                                                                                        <input
                                                                                            id="searchConditionBean.procurementClaBean.procurementClaBidNotice1"
                                                                                            name="searchConditionBean.procurementClaBean.procurementClaBidNotice"
                                                                                            tabindex="2340"
                                                                                            type="checkbox"
                                                                                            value="1"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementClaBidNotice1"
                                                                                            class="table-check">入札公告(公示)予定の公示(年間調達予定)</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.procurementClaBidNotice2"
                                                                                            name="searchConditionBean.procurementClaBean.procurementClaBidNotice"
                                                                                            tabindex="2340"
                                                                                            type="checkbox"
                                                                                            value="2"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementClaBidNotice2"
                                                                                            class="table-check">政府調達セミナー及び政府調達年次会合の開催の公示</label>
                                                                                    </li>
                                                                                    <input type="hidden"
                                                                                           name="_searchConditionBean.procurementClaBean.procurementClaBidNotice"
                                                                                           value="on"
                                                                                           class="mousetrap">
                                                                                </ul>
                                                                            </dd>
                                                                        </dl>
                                                                        <dl class="table-form">
                                                                            <dt>
                                                                                <span>資料提供招請</span>
                                                                            </dt>
                                                                            <dd>
                                                                                <ul style="margin-left: 20px;">
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.requestSubmissionMaterials1"
                                                                                            name="searchConditionBean.procurementClaBean.requestSubmissionMaterials"
                                                                                            tabindex="2350"
                                                                                            type="checkbox"
                                                                                            value="3"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.requestSubmissionMaterials1"
                                                                                            class="table-check">資料提供招請に関する公表</label>
                                                                                    </li>
                                                                                    <input type="hidden"
                                                                                           name="_searchConditionBean.procurementClaBean.requestSubmissionMaterials"
                                                                                           value="on"
                                                                                           class="mousetrap">
                                                                                </ul>
                                                                            </dd>
                                                                        </dl>

                                                                        <dl class="table-form">
                                                                            <dt>
                                                                                <span>意見招請</span>
                                                                            </dt>
                                                                            <dd>
                                                                                <ul style="margin-left: 20px;">
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.requestComment1"
                                                                                            name="searchConditionBean.procurementClaBean.requestComment"
                                                                                            tabindex="2360"
                                                                                            type="checkbox"
                                                                                            value="4"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.requestComment1"
                                                                                            class="table-check">意見招請に関する公示</label>
                                                                                    </li>
                                                                                    <input type="hidden"
                                                                                           name="_searchConditionBean.procurementClaBean.requestComment"
                                                                                           value="on"
                                                                                           class="mousetrap">
                                                                                </ul>
                                                                            </dd>
                                                                        </dl>

                                                                        <dl class="table-form">
                                                                            <dt>
                                                                                <span>調達実施案件公示</span>
                                                                            </dt>
                                                                            <dd>
                                                                                <ul style="margin-left: 20px;">
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.procurementImplementNotice1"
                                                                                            name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                            tabindex="2370"
                                                                                            type="checkbox"
                                                                                            value="5"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementImplementNotice1"
                                                                                            class="table-check">一般競争入札の入札公告（WTO対象）</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.procurementImplementNotice2"
                                                                                            name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                            tabindex="2370"
                                                                                            type="checkbox"
                                                                                            value="6"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementImplementNotice2"
                                                                                            class="table-check">指名競争入札の入札公示（WTO対象）</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.procurementImplementNotice3"
                                                                                            name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                            tabindex="2370"
                                                                                            type="checkbox"
                                                                                            value="7"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementImplementNotice3"
                                                                                            class="table-check">随意契約に関する公示</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.procurementImplementNotice4"
                                                                                            name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                            tabindex="2370"
                                                                                            type="checkbox"
                                                                                            value="10"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementImplementNotice4"
                                                                                            class="table-check">一般競争入札の入札公告（WTO対象外）</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.procurementImplementNotice5"
                                                                                            name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                            tabindex="2370"
                                                                                            type="checkbox"
                                                                                            value="12"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementImplementNotice5"
                                                                                            class="table-check">指名競争入札の入札公示（WTO対象外）</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.procurementImplementNotice6"
                                                                                            name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                            tabindex="2370"
                                                                                            type="checkbox"
                                                                                            value="13"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementImplementNotice6"
                                                                                            class="table-check">公募型プロポーザル情報</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.procurementImplementNotice7"
                                                                                            name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                            tabindex="2370"
                                                                                            type="checkbox"
                                                                                            value="14"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.procurementImplementNotice7"
                                                                                            class="table-check">オープンカウンタへの参加募集情報</label>
                                                                                    </li>
                                                                                    <input type="hidden"
                                                                                           name="_searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                           value="on"
                                                                                           class="mousetrap">
                                                                                </ul>
                                                                            </dd>
                                                                        </dl>

                                                                        <dl class="table-form">
                                                                            <dt>
                                                                                <span>落札公示</span>
                                                                            </dt>
                                                                            <dd>
                                                                                <ul style="margin-left: 20px;">
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.successfulBidNotice1"
                                                                                            name="searchConditionBean.procurementClaBean.successfulBidNotice"
                                                                                            tabindex="2380"
                                                                                            type="checkbox"
                                                                                            value="8"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.successfulBidNotice1"
                                                                                            class="table-check">落札者等の公示（WTO対象）</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.successfulBidNotice2"
                                                                                            name="searchConditionBean.procurementClaBean.successfulBidNotice"
                                                                                            tabindex="2380"
                                                                                            type="checkbox"
                                                                                            value="15"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.successfulBidNotice2"
                                                                                            class="table-check">落札者等の公示（WTO対象外）</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.procurementClaBean.successfulBidNotice3"
                                                                                            name="searchConditionBean.procurementClaBean.successfulBidNotice"
                                                                                            tabindex="2380"
                                                                                            type="checkbox"
                                                                                            value="16"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.procurementClaBean.successfulBidNotice3"
                                                                                            class="table-check">落札者等の公示（随意契約）</label>
                                                                                    </li>
                                                                                    <input type="hidden"
                                                                                           name="_searchConditionBean.procurementClaBean.successfulBidNotice"
                                                                                           value="on"
                                                                                           class="mousetrap">
                                                                                </ul>
                                                                            </dd>
                                                                        </dl>
                                                                    </dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="procurementClassificationSelected" type="button"
                                                        class="" tabindex="2390"
                                                        data-dismiss="modal"
                                                        style="border: none; background: none; padding: 0;">
                                                    <img src="{{asset('img/button_04.jpg')}}"
                                                         alt="株式会社日本スマートマーケティング">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- メイン モーダル -->

                                <!--Scrolling Modal-->
                                <div class="modal fade" id="modal_02" tabindex="-1" role="dialog"
                                     aria-labelledby="select_type" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 style="margin-top: 15px;">調達機関（国）を選択する</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-type-02">
                                                    <div class="main-modal-inner" style="width: 100%"
                                                         tabindex="2400">
                                                        <div class="modal-contents" id="select-control"
                                                             style="overflow-y: scroll; overflow: hidden">
                                                            <div style="padding: 10px; border-bottom: none;">
                                                                <dl class="table-form form-a-line"
                                                                    style="float:left;">
                                                                    <dt>
                                                                        <span>機関名</span>
                                                                    </dt>
                                                                    <p>
                                                                        [&nbsp; <a class="table-check-all"
                                                                                   tabindex="2420">全選択</a>
                                                                        &nbsp;|&nbsp; <a class="table-check-remove"
                                                                                         tabindex="2430">選択解除</a>
                                                                        &nbsp;]
                                                                    </p>
                                                                    <div class="table-checks modal-Items">
                                                                        <div
                                                                            style="border-collapse: collapse; width: 100%; margin-left: 30px; border: 0px solid;"
                                                                            id="td_govement_ProcurementOragan">
                                                                            <ul class="johoProcurementOrganLayout row mx-3">
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm1"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="1"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm1"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">衆議院</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm2"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="2"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm2"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">参議院</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm3"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="3"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm3"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">最高裁判所</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm4"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="4"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm4"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">会計検査院</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm5"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="5"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm5"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">内閣官房</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm6"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="6"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm6"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">人事院</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm7"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="7"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm7"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">内閣府</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm8"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="8"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm8"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">宮内庁</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm9"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="9"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm9"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">国家公安委員会（警察庁）</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm10"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="10"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm10"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">防衛省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm11"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="11"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm11"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">金融庁</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm12"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="12"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm12"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">総務省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm13"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="13"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm13"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">法務省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm14"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="14"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm14"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">外務省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm15"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="15"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm15"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">財務省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm16"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="16"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm16"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">文部科学省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm17"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="17"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm17"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">厚生労働省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm18"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="18"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm18"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">農林水産省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm19"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="19"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm19"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">経済産業省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm20"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="20"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm20"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">国土交通省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm21"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="21"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm21"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">環境省</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm22"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="22"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm22"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">消費者庁</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm23"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="23"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm23"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">復興庁</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm24"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="24"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm24"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">公正取引委員会</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm25"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="25"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm25"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">個人情報保護委員会</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm26"
                                                                                        name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                        tabindex="2440"
                                                                                        type="checkbox" value="26"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm26"
                                                                                        class="table-check"
                                                                                        style="width: 120px;">カジノ管理委員会</label>
                                                                                </li>
                                                                                <input type="hidden"
                                                                                       name="_searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                       value="on" class="mousetrap">
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </dl>
                                                            </div>
                                                            <div style="padding: 10px; border-bottom: none;">
                                                                <dl class="table-form">
                                                                    <dt>
                                                                        <span>所在地</span>
                                                                    </dt>
                                                                    <dd>
                                                                        <p>
                                                                            [&nbsp; <a class="table-check-all"
                                                                                       tabindex="2450">全選択</a>
                                                                            &nbsp;|&nbsp; <a
                                                                                class="table-check-remove"
                                                                                tabindex="2460">選択解除</a>
                                                                            &nbsp;]
                                                                        </p>
                                                                        <div class="table-checks modal-Items">
                                                                            <table
                                                                                style="border-collapse: collapse; width: 100%;"
                                                                                id="td_govementProcurementOragan_area"
                                                                                tabindex="2470">

                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                        <input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.area1"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                            onclick="single_govementProcurementOragan_area_select(this)"
                                                                                            type="checkbox"
                                                                                            value="1"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.area1"
                                                                                            class="table-check">北海道</label><input
                                                                                            type="hidden"
                                                                                            name="_searchConditionBean.govementProcurementOraganBean.area"
                                                                                            value="on"
                                                                                            class="mousetrap">
                                                                                    </td>
                                                                                    <td style="padding: 0px; border-bottom: none;">

                                                                                        <ul class="johoProcurementOrganLayout row mx-0 mb-0">
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_11"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_1"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="1"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_11"
                                                                                                    class="table-check">北海道</label>
                                                                                            </li>
                                                                                            <input type="hidden"
                                                                                                   name="_searchConditionBean.govementProcurementOraganBean.prefecture_1"
                                                                                                   value="on"
                                                                                                   class="mousetrap">
                                                                                        </ul>

                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                        <input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.area2"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                            onclick="single_govementProcurementOragan_area_select(this)"
                                                                                            type="checkbox"
                                                                                            value="2"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.area2"
                                                                                            class="table-check">東北</label><input
                                                                                            type="hidden"
                                                                                            name="_searchConditionBean.govementProcurementOraganBean.area"
                                                                                            value="on"
                                                                                            class="mousetrap">
                                                                                    </td>
                                                                                    <td style="padding: 0px; border-bottom: none;">

                                                                                        <ul class="johoProcurementOrganLayout row mx-0 mb-0">
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_21"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="2"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_21"
                                                                                                    class="table-check">青森県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_22"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="3"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_22"
                                                                                                    class="table-check">岩手県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_23"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="4"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_23"
                                                                                                    class="table-check">宮城県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_24"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="5"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_24"
                                                                                                    class="table-check">秋田県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_25"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="6"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_25"
                                                                                                    class="table-check">山形県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_26"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="7"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_26"
                                                                                                    class="table-check">福島県</label>
                                                                                            </li>
                                                                                            <input type="hidden"
                                                                                                   name="_searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                   value="on"
                                                                                                   class="mousetrap">
                                                                                        </ul>

                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                        <input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.area3"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                            onclick="single_govementProcurementOragan_area_select(this)"
                                                                                            type="checkbox"
                                                                                            value="3"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.area3"
                                                                                            class="table-check">関東・甲信越</label><input
                                                                                            type="hidden"
                                                                                            name="_searchConditionBean.govementProcurementOraganBean.area"
                                                                                            value="on"
                                                                                            class="mousetrap">
                                                                                    </td>
                                                                                    <td style="padding: 0px; border-bottom: none;">

                                                                                        <ul class="johoProcurementOrganLayout row mx-0 mb-0">
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_31"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="8"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_31"
                                                                                                    class="table-check">茨城県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_32"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="9"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_32"
                                                                                                    class="table-check">栃木県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_33"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="10"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_33"
                                                                                                    class="table-check">群馬県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_34"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="11"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_34"
                                                                                                    class="table-check">埼玉県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_35"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="12"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_35"
                                                                                                    class="table-check">千葉県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_36"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="13"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_36"
                                                                                                    class="table-check">東京都</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_37"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="14"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_37"
                                                                                                    class="table-check">神奈川県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_38"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="15"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_38"
                                                                                                    class="table-check">新潟県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_39"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="19"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_39"
                                                                                                    class="table-check">山梨県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_310"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="20"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_310"
                                                                                                    class="table-check">長野県</label>
                                                                                            </li>
                                                                                            <input type="hidden"
                                                                                                   name="_searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                   value="on"
                                                                                                   class="mousetrap">
                                                                                        </ul>

                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                        <input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.area4"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                            onclick="single_govementProcurementOragan_area_select(this)"
                                                                                            type="checkbox"
                                                                                            value="4"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.area4"
                                                                                            class="table-check">東海・北陸</label><input
                                                                                            type="hidden"
                                                                                            name="_searchConditionBean.govementProcurementOraganBean.area"
                                                                                            value="on"
                                                                                            class="mousetrap">
                                                                                    </td>
                                                                                    <td style="padding: 0px; border-bottom: none;">

                                                                                        <ul class="johoProcurementOrganLayout row mx-0 mb-0">
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_41"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="16"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_41"
                                                                                                    class="table-check">富山県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_42"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="17"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_42"
                                                                                                    class="table-check">石川県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_43"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="18"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_43"
                                                                                                    class="table-check">福井県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_44"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="21"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_44"
                                                                                                    class="table-check">岐阜県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_45"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="22"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_45"
                                                                                                    class="table-check">静岡県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_46"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="23"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_46"
                                                                                                    class="table-check">愛知県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_47"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="24"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_47"
                                                                                                    class="table-check">三重県</label>
                                                                                            </li>
                                                                                            <input type="hidden"
                                                                                                   name="_searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                   value="on"
                                                                                                   class="mousetrap">
                                                                                        </ul>

                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                        <input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.area5"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                            onclick="single_govementProcurementOragan_area_select(this)"
                                                                                            type="checkbox"
                                                                                            value="5"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.area5"
                                                                                            class="table-check">近畿</label><input
                                                                                            type="hidden"
                                                                                            name="_searchConditionBean.govementProcurementOraganBean.area"
                                                                                            value="on"
                                                                                            class="mousetrap">
                                                                                    </td>
                                                                                    <td style="padding: 0px; border-bottom: none;">

                                                                                        <ul class="johoProcurementOrganLayout row mx-0 mb-0">
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_51"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="25"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_51"
                                                                                                    class="table-check">滋賀県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_52"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="26"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_52"
                                                                                                    class="table-check">京都府</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_53"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="27"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_53"
                                                                                                    class="table-check">大阪府</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_54"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="28"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_54"
                                                                                                    class="table-check">兵庫県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_55"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="29"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_55"
                                                                                                    class="table-check">奈良県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_56"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="30"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_56"
                                                                                                    class="table-check">和歌山県</label>
                                                                                            </li>
                                                                                            <input type="hidden"
                                                                                                   name="_searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                   value="on"
                                                                                                   class="mousetrap">
                                                                                        </ul>

                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                        <input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.area6"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                            onclick="single_govementProcurementOragan_area_select(this)"
                                                                                            type="checkbox"
                                                                                            value="6"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.area6"
                                                                                            class="table-check">中国</label><input
                                                                                            type="hidden"
                                                                                            name="_searchConditionBean.govementProcurementOraganBean.area"
                                                                                            value="on"
                                                                                            class="mousetrap">
                                                                                    </td>
                                                                                    <td style="padding: 0px; border-bottom: none;">

                                                                                        <ul class="johoProcurementOrganLayout row mx-0 mb-0">
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_61"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="31"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_61"
                                                                                                    class="table-check">鳥取県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_62"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="32"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_62"
                                                                                                    class="table-check">島根県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_63"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="33"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_63"
                                                                                                    class="table-check">岡山県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_64"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="34"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_64"
                                                                                                    class="table-check">広島県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_65"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="35"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_65"
                                                                                                    class="table-check">山口県</label>
                                                                                            </li>
                                                                                            <input type="hidden"
                                                                                                   name="_searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                   value="on"
                                                                                                   class="mousetrap">
                                                                                        </ul>

                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                        <input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.area7"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                            onclick="single_govementProcurementOragan_area_select(this)"
                                                                                            type="checkbox"
                                                                                            value="7"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.area7"
                                                                                            class="table-check">四国</label><input
                                                                                            type="hidden"
                                                                                            name="_searchConditionBean.govementProcurementOraganBean.area"
                                                                                            value="on"
                                                                                            class="mousetrap">
                                                                                    </td>
                                                                                    <td style="padding: 0px; border-bottom: none;">

                                                                                        <ul class="johoProcurementOrganLayout row mx-0 mb-0">
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_71"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="36"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_71"
                                                                                                    class="table-check">徳島県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_72"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="37"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_72"
                                                                                                    class="table-check">香川県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_73"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="38"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_73"
                                                                                                    class="table-check">愛媛県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_74"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="39"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_74"
                                                                                                    class="table-check">高知県</label>
                                                                                            </li>
                                                                                            <input type="hidden"
                                                                                                   name="_searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                   value="on"
                                                                                                   class="mousetrap">
                                                                                        </ul>

                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                        <input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.area8"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                            onclick="single_govementProcurementOragan_area_select(this)"
                                                                                            type="checkbox"
                                                                                            value="8"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.area8"
                                                                                            class="table-check">九州・沖縄</label><input
                                                                                            type="hidden"
                                                                                            name="_searchConditionBean.govementProcurementOraganBean.area"
                                                                                            value="on"
                                                                                            class="mousetrap">
                                                                                    </td>
                                                                                    <td style="padding: 0px; border-bottom: none;">

                                                                                        <ul class="johoProcurementOrganLayout row mx-0 mb-0">
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_81"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="40"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_81"
                                                                                                    class="table-check">福岡県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_82"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="41"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_82"
                                                                                                    class="table-check">佐賀県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_83"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="42"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_83"
                                                                                                    class="table-check">長崎県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_84"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="43"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_84"
                                                                                                    class="table-check">熊本県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_85"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="44"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_85"
                                                                                                    class="table-check">大分県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_86"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="45"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_86"
                                                                                                    class="table-check">宮崎県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_87"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="46"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_87"
                                                                                                    class="table-check">鹿児島県</label>
                                                                                            </li>
                                                                                            <li><input
                                                                                                    id="searchConditionBean.govementProcurementOraganBean.prefecture_88"
                                                                                                    name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                    onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                    type="checkbox"
                                                                                                    value="47"
                                                                                                    class="mousetrap"><label
                                                                                                    for="searchConditionBean.govementProcurementOraganBean.prefecture_88"
                                                                                                    class="table-check">沖縄県</label>
                                                                                            </li>
                                                                                            <input type="hidden"
                                                                                                   name="_searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                   value="on"
                                                                                                   class="mousetrap">
                                                                                        </ul>

                                                                                    </td>
                                                                                </tr>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="govementProcurementOraganSelected" type="button"
                                                        class="" data-dismiss="modal"
                                                        style="border: none; background: none; padding: 0;">
                                                    <img src="{{asset('img/button_04.jpg')}}"
                                                         alt="株式会社日本スマートマーケティング">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Scrolling Modal-->
                                <div class="modal fade" id="modal_04" tabindex="-1" role="dialog"
                                     aria-labelledby="select_type" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 style="margin-top: 15px;">調達品目分類を選択する</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-type-04">
                                                    <div class="main-modal-inner" style="width: 100%"
                                                         tabindex="2600">
                                                        <div class="modal-contents" id="select-control">
                                                            <p>
                                                                [&nbsp; <a class="table-check-all"
                                                                           tabindex="2620">全選択</a>
                                                                &nbsp;|&nbsp; <a class="table-check-remove"
                                                                                 tabindex="2630">選択解除</a>
                                                                &nbsp;]
                                                            </p>
                                                            <div class="table-checks modal-Items">
                                                                <div style="padding: 0px; border-bottom: none;">
                                                                    <div
                                                                        id="tri_WAA0101FM01/searchConditionBean/itemClassifcationBean/itemClassifcation"
                                                                        class="row">
                                                                        <div
                                                                            style="border-collapse: collapse; width: 100%; margin-left: 30px; border: 0px solid;"
                                                                            id="td_itemClassifcation"
                                                                            class="col-11">
                                                                            <ul class="johoProcurementOrganLayout row">
                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation1"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="1"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation1"
                                                                                    class="table-check">001.農水産品及び加工食品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation2"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="2"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation2"
                                                                                    class="table-check">002.鉱物性生産品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation3"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="3"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation3"
                                                                                    class="table-check">003.化学工業の生産品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation4"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="4"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation4"
                                                                                    class="table-check">004.医療品及び医療用品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation5"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="5"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation5"
                                                                                    class="table-check">005.人造樹脂、ゴム、皮革、毛皮及びこれらの製品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation6"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="6"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation6"
                                                                                    class="table-check">006.木材及びその製品、製紙用原料並びに紙製品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation7"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="7"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation7"
                                                                                    class="table-check">007.かばん類並びに紡織用繊維及びその製品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation8"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="8"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation8"
                                                                                    class="table-check">008.石、セメント他これらに類する材料の製品、陶磁器製品、ガラス及びその製品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation9"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="9"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation9"
                                                                                    class="table-check">009.鉄鋼及びその製品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation10"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="10"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation10"
                                                                                    class="table-check">010.非鉄金属及びその製品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation11"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="11"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation11"
                                                                                    class="table-check">011.動力発生用機器</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation12"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="12"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation12"
                                                                                    class="table-check">012.特定産業用機器</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation13"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="13"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation13"
                                                                                    class="table-check">013.一般産業用機器</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation14"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="14"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation14"
                                                                                    class="table-check">014.事務用機器及び自動データ</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation15"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="15"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation15"
                                                                                    class="table-check">015.電気通信用機器及び音声録音再生機器</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation16"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="16"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation16"
                                                                                    class="table-check">016.電気機器及びその他の機械</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation17"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="17"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation17"
                                                                                    class="table-check">017.道路走行用車両</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation18"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="18"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation18"
                                                                                    class="table-check">018.鉄道用車両及びその付属装置</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation19"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="19"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation19"
                                                                                    class="table-check">019.航空機及びその付属装置</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation20"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="20"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation20"
                                                                                    class="table-check">020.船舶及び浮き構造物</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation21"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="21"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation21"
                                                                                    class="table-check">021.衛生用品、暖房器具及び照明器具</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation22"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="22"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation22"
                                                                                    class="table-check">022.医療用又は獣医用機器</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation23"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="23"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation23"
                                                                                    class="table-check">023.家具等</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation24"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="24"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation24"
                                                                                    class="table-check">024.化学用又は制御用の機器</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation25"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="25"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation25"
                                                                                    class="table-check">025.写真用機器、光学用品及び時計</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation26"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="26"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation26"
                                                                                    class="table-check">026.その他物品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation27"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="27"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation27"
                                                                                    class="table-check">027.コンピュータ・サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation28"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="28"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation28"
                                                                                    class="table-check">028.電気通信機器</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation29"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="29"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation29"
                                                                                    class="table-check">029.電気通信機器に係るサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation30"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="30"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation30"
                                                                                    class="table-check">030.電気通信分野のその他のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation31"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="31"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation31"
                                                                                    class="table-check">031.医療器具機械</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation32"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="32"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation32"
                                                                                    class="table-check">032.医療用品</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation33"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="33"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation33"
                                                                                    class="table-check">033.歯科材料</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation34"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="34"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation34"
                                                                                    class="table-check">034.医療サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation35"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="41"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation35"
                                                                                    class="table-check">041.建設工事</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation36"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="42"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation36"
                                                                                    class="table-check">042.建設のためのサービス、エンジニアリング・サービスその他の技術的サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation37"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="51"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation37"
                                                                                    class="table-check">051.自動車の保守及び修理サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation38"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="52"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation38"
                                                                                    class="table-check">052.モーターサイクル、カタピラを有する軽自動車の保守及び修理のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation39"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="53"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation39"
                                                                                    class="table-check">053.その他の陸上運送サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation40"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="54"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation40"
                                                                                    class="table-check">054.運転者を伴う海上航行船舶の賃貸サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation41"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="55"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation41"
                                                                                    class="table-check">055.海上航行船舶以外の船舶の賃貸サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation42"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="56"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation42"
                                                                                    class="table-check">056.航空運送サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation43"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="57"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation43"
                                                                                    class="table-check">057.貨物運送取扱いサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation44"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="58"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation44"
                                                                                    class="table-check">058.クーリエ・サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation45"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="61"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation45"
                                                                                    class="table-check">061.電子メール</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation46"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="62"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation46"
                                                                                    class="table-check">062.ボイスメール</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation47"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="63"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation47"
                                                                                    class="table-check">063.情報及びデータベースのオンラインでの検索</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation48"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="64"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation48"
                                                                                    class="table-check">064.電子データ交換</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation49"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="65"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation49"
                                                                                    class="table-check">065.高度ファクシミリ・サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation50"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="66"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation50"
                                                                                    class="table-check">066.コード及びプロトコルの変換</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation51"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="67"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation51"
                                                                                    class="table-check">067.情報及びデータのオンラインでの処理</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation52"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="71"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation52"
                                                                                    class="table-check">071.電子計算機サービス及び関連のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation53"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="72"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation53"
                                                                                    class="table-check">072.市場調査及び世論調査のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation54"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="73"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation54"
                                                                                    class="table-check">073.広告サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation55"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="74"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation55"
                                                                                    class="table-check">074.装甲車による運送サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation56"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="75"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation56"
                                                                                    class="table-check">075.建築物の清掃サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation57"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="76"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation57"
                                                                                    class="table-check">076.出版及び印刷のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation58"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="77"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation58"
                                                                                    class="table-check">077.金属製品、機械及び機器の修理のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation59"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="78"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation59"
                                                                                    class="table-check">078.汚水及び廃棄物の処理、衛生その他の環境保護のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation60"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="79"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation60"
                                                                                    class="table-check">079.個人用品及び家庭用品の修理のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation61"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="80"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation61"
                                                                                    class="table-check">080.食料提供サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation62"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="81"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation62"
                                                                                    class="table-check">081.飲料提供サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation63"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="82"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation63"
                                                                                    class="table-check">082.農業用機器（運転者を伴わないもの）の賃貸サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation64"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="83"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation64"
                                                                                    class="table-check">083.家具その他家庭用の器具の賃貸サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation65"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="84"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation65"
                                                                                    class="table-check">084.娯楽用品の賃貸サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation66"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="85"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation66"
                                                                                    class="table-check">085.その他の個人用品又は家庭用の賃貸サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation67"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="86"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation67"
                                                                                    class="table-check">086.経営相談サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation68"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="87"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation68"
                                                                                    class="table-check">087.経営相談に関するサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation69"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="88"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation69"
                                                                                    class="table-check">088.こん包サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation70"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="89"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation70"
                                                                                    class="table-check">089.林業及び木材伐出業に付随するサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation71"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="90"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation71"
                                                                                    class="table-check">090.初等教育サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation72"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="91"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation72"
                                                                                    class="table-check">091.中等教育サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation73"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="92"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation73"
                                                                                    class="table-check">092.高等教育サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation74"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="93"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation74"
                                                                                    class="table-check">093.成人教育サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation75"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="94"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation75"
                                                                                    class="table-check">094.映画及びビデオテープの制作及び配給のサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation76"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="101"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation76"
                                                                                    class="table-check">101.電気通信に関連するサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation77"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="102"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation77"
                                                                                    class="table-check">102.保険(再保険を含む。)及び年金基金サービス（強制加入の社会保険サービスを除く。）</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation78"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="111"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation78"
                                                                                    class="table-check">111.管理職あっせんサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation79"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="112"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation79"
                                                                                    class="table-check">112.事務補助従事者その他の労働者あっせんサービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation80"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="113"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation80"
                                                                                    class="table-check">113.家事手伝い提供サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation81"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="114"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation81"
                                                                                    class="table-check">114.その他の商業又は工業労働者提供サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation82"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="115"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation82"
                                                                                    class="table-check">115.看護師提供サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation83"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="116"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation83"
                                                                                    class="table-check">116.その他人材提供サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation84"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="121"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation84"
                                                                                    class="table-check">121.肖像写真サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation85"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="122"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation85"
                                                                                    class="table-check">122.広告及び関連する写真サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation86"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="123"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation86"
                                                                                    class="table-check">123.行事の写真サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation87"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="124"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation87"
                                                                                    class="table-check">124.写真加工サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation88"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="125"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation88"
                                                                                    class="table-check">125.映像加工サービス（映画及びテレビ産業に関連しないもの）</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation89"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="126"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation89"
                                                                                    class="table-check">126.写真の修復、複写及び修正サービス）</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation90"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="127"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation90"
                                                                                    class="table-check">127.その他の写真サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation91"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="131"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation91"
                                                                                    class="table-check">131.信用調査サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation92"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="132"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation92"
                                                                                    class="table-check">132.回収代行サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation93"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="133"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation93"
                                                                                    class="table-check">133.電話対応サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation94"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="134"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation94"
                                                                                    class="table-check">134.翻訳及び通訳サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation95"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="135"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation95"
                                                                                    class="table-check">135.郵送リスト作成及び郵送サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on" class="mousetrap">

                                                                                <input
                                                                                    id="searchConditionBean.itemClassifcationBean.itemClassifcation96"
                                                                                    name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    tabindex="2640" type="checkbox"
                                                                                    value="136"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.itemClassifcationBean.itemClassifcation96"
                                                                                    class="table-check">136.専門デザイン・サービス</label><input
                                                                                    type="hidden"
                                                                                    name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                    value="on"
                                                                                    class="mousetrap">

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="itemClassifcationSelected" type="button"
                                                        class="" data-dismiss="modal"
                                                        style="border: none; background: none; padding: 0;">
                                                    <img src="{{asset('img/button_04.jpg')}}"
                                                         alt="株式会社日本スマートマーケティング">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-modal modal-type-03" style="display: none;">
                                    <div class="main-modal-bg" style="height: 937px; width: 1480px;"></div>
                                    <div class="main-modal-inner" style="width: 1000px" tabindex="2500">
                                        <a class="main-modal-close"> <img
                                                src="{{asset('img/icn_close.png')}}"
                                                alt="モーダルを閉じる"
                                                tabindex="2510">
                                        </a>
                                        <div class="modal-contents" id="select-control">
                                            <h3 style="margin-top: 15px;">調達機関（地方公共団体）を選択する</h3>
                                            <dl class="table-form" style="float: left;">
                                                <dd>
                                                    <p>
                                                        [&nbsp; <a class="table-check-all" tabindex="2520">全選択</a>
                                                        &nbsp;|&nbsp; <a class="table-check-remove"
                                                                         tabindex="2530">選択解除</a>
                                                        &nbsp;]
                                                    </p>
                                                    <div class="table-checks modal-Items">
                                                        <div
                                                            id="tri_WAA0101FM01/searchConditionBean/govementProcurementOrgBean/area">
                                                            <table
                                                                style="border-collapse: collapse; width: 100%; margin-left: 30px; border: 0px solid;"
                                                                id="td_govementProcurementOrg" tabindex="2540">

                                                                <tbody>
                                                                <tr>
                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                        <input
                                                                            id="searchConditionBean.govementProcurementOrgBean.area1"
                                                                            name="searchConditionBean.govementProcurementOrgBean.area"
                                                                            onclick="single_area_select(this)"
                                                                            type="checkbox"
                                                                            value="1" class="mousetrap"><label
                                                                            for="searchConditionBean.govementProcurementOrgBean.area1"
                                                                            class="table-check">北海道</label><input
                                                                            type="hidden"
                                                                            name="_searchConditionBean.govementProcurementOrgBean.area"
                                                                            value="on"
                                                                            class="mousetrap">
                                                                    </td>
                                                                    <td style="padding: 0px; border-bottom: none;">
                                                                        <ul class="johoProcurementOrganLayout">
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_11"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_1"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="1"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_11"
                                                                                    class="table-check">北海道</label>
                                                                            </li>
                                                                            <input type="hidden"
                                                                                   name="_searchConditionBean.govementProcurementOrgBean.prefecture_1"
                                                                                   value="on" class="mousetrap">
                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                        <input
                                                                            id="searchConditionBean.govementProcurementOrgBean.area2"
                                                                            name="searchConditionBean.govementProcurementOrgBean.area"
                                                                            onclick="single_area_select(this)"
                                                                            type="checkbox"
                                                                            value="2" class="mousetrap"><label
                                                                            for="searchConditionBean.govementProcurementOrgBean.area2"
                                                                            class="table-check">東北</label><input
                                                                            type="hidden"
                                                                            name="_searchConditionBean.govementProcurementOrgBean.area"
                                                                            value="on"
                                                                            class="mousetrap">
                                                                    </td>
                                                                    <td style="padding: 0px; border-bottom: none;">
                                                                        <ul class="johoProcurementOrganLayout">
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_21"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="2"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_21"
                                                                                    class="table-check">青森県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_22"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="3"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_22"
                                                                                    class="table-check">岩手県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_23"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="4"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_23"
                                                                                    class="table-check">宮城県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_24"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="5"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_24"
                                                                                    class="table-check">秋田県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_25"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="6"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_25"
                                                                                    class="table-check">山形県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_26"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="7"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_26"
                                                                                    class="table-check">福島県</label>
                                                                            </li>
                                                                            <input type="hidden"
                                                                                   name="_searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                   value="on" class="mousetrap">
                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                        <input
                                                                            id="searchConditionBean.govementProcurementOrgBean.area3"
                                                                            name="searchConditionBean.govementProcurementOrgBean.area"
                                                                            onclick="single_area_select(this)"
                                                                            type="checkbox"
                                                                            value="3" class="mousetrap"><label
                                                                            for="searchConditionBean.govementProcurementOrgBean.area3"
                                                                            class="table-check">関東・甲信越</label><input
                                                                            type="hidden"
                                                                            name="_searchConditionBean.govementProcurementOrgBean.area"
                                                                            value="on"
                                                                            class="mousetrap">
                                                                    </td>
                                                                    <td style="padding: 0px; border-bottom: none;">
                                                                        <ul class="johoProcurementOrganLayout">
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_31"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="8"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_31"
                                                                                    class="table-check">茨城県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_32"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="9"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_32"
                                                                                    class="table-check">栃木県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_33"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="10"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_33"
                                                                                    class="table-check">群馬県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_34"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="11"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_34"
                                                                                    class="table-check">埼玉県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_35"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="12"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_35"
                                                                                    class="table-check">千葉県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_36"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="13"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_36"
                                                                                    class="table-check">東京都</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_37"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="14"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_37"
                                                                                    class="table-check">神奈川県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_38"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="15"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_38"
                                                                                    class="table-check">新潟県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_39"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="19"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_39"
                                                                                    class="table-check">山梨県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_310"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="20"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_310"
                                                                                    class="table-check">長野県</label>
                                                                            </li>
                                                                            <input type="hidden"
                                                                                   name="_searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                   value="on" class="mousetrap">
                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                        <input
                                                                            id="searchConditionBean.govementProcurementOrgBean.area4"
                                                                            name="searchConditionBean.govementProcurementOrgBean.area"
                                                                            onclick="single_area_select(this)"
                                                                            type="checkbox"
                                                                            value="4" class="mousetrap"><label
                                                                            for="searchConditionBean.govementProcurementOrgBean.area4"
                                                                            class="table-check">東海・北陸</label><input
                                                                            type="hidden"
                                                                            name="_searchConditionBean.govementProcurementOrgBean.area"
                                                                            value="on"
                                                                            class="mousetrap">
                                                                    </td>
                                                                    <td style="padding: 0px; border-bottom: none;">
                                                                        <ul class="johoProcurementOrganLayout">
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_41"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_4"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="16"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_41"
                                                                                    class="table-check">富山県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_42"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_4"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="17"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_42"
                                                                                    class="table-check">石川県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_43"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_4"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="18"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_43"
                                                                                    class="table-check">福井県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_44"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_4"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="21"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_44"
                                                                                    class="table-check">岐阜県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_45"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_4"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="22"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_45"
                                                                                    class="table-check">静岡県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_46"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_4"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="23"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_46"
                                                                                    class="table-check">愛知県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_47"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_4"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="24"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_47"
                                                                                    class="table-check">三重県</label>
                                                                            </li>
                                                                            <input type="hidden"
                                                                                   name="_searchConditionBean.govementProcurementOrgBean.prefecture_4"
                                                                                   value="on" class="mousetrap">
                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                        <input
                                                                            id="searchConditionBean.govementProcurementOrgBean.area5"
                                                                            name="searchConditionBean.govementProcurementOrgBean.area"
                                                                            onclick="single_area_select(this)"
                                                                            type="checkbox"
                                                                            value="5" class="mousetrap"><label
                                                                            for="searchConditionBean.govementProcurementOrgBean.area5"
                                                                            class="table-check">近畿</label><input
                                                                            type="hidden"
                                                                            name="_searchConditionBean.govementProcurementOrgBean.area"
                                                                            value="on"
                                                                            class="mousetrap">
                                                                    </td>
                                                                    <td style="padding: 0px; border-bottom: none;">
                                                                        <ul class="johoProcurementOrganLayout">
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_51"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_5"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="25"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_51"
                                                                                    class="table-check">滋賀県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_52"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_5"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="26"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_52"
                                                                                    class="table-check">京都府</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_53"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_5"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="27"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_53"
                                                                                    class="table-check">大阪府</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_54"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_5"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="28"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_54"
                                                                                    class="table-check">兵庫県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_55"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_5"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="29"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_55"
                                                                                    class="table-check">奈良県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_56"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_5"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="30"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_56"
                                                                                    class="table-check">和歌山県</label>
                                                                            </li>
                                                                            <input type="hidden"
                                                                                   name="_searchConditionBean.govementProcurementOrgBean.prefecture_5"
                                                                                   value="on" class="mousetrap">
                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                        <input
                                                                            id="searchConditionBean.govementProcurementOrgBean.area6"
                                                                            name="searchConditionBean.govementProcurementOrgBean.area"
                                                                            onclick="single_area_select(this)"
                                                                            type="checkbox"
                                                                            value="6" class="mousetrap"><label
                                                                            for="searchConditionBean.govementProcurementOrgBean.area6"
                                                                            class="table-check">中国</label><input
                                                                            type="hidden"
                                                                            name="_searchConditionBean.govementProcurementOrgBean.area"
                                                                            value="on"
                                                                            class="mousetrap">
                                                                    </td>
                                                                    <td style="padding: 0px; border-bottom: none;">
                                                                        <ul class="johoProcurementOrganLayout">
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_61"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_6"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="31"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_61"
                                                                                    class="table-check">鳥取県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_62"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_6"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="32"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_62"
                                                                                    class="table-check">島根県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_63"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_6"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="33"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_63"
                                                                                    class="table-check">岡山県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_64"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_6"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="34"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_64"
                                                                                    class="table-check">広島県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_65"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_6"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="35"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_65"
                                                                                    class="table-check">山口県</label>
                                                                            </li>
                                                                            <input type="hidden"
                                                                                   name="_searchConditionBean.govementProcurementOrgBean.prefecture_6"
                                                                                   value="on" class="mousetrap">
                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                        <input
                                                                            id="searchConditionBean.govementProcurementOrgBean.area7"
                                                                            name="searchConditionBean.govementProcurementOrgBean.area"
                                                                            onclick="single_area_select(this)"
                                                                            type="checkbox"
                                                                            value="7" class="mousetrap"><label
                                                                            for="searchConditionBean.govementProcurementOrgBean.area7"
                                                                            class="table-check">四国</label><input
                                                                            type="hidden"
                                                                            name="_searchConditionBean.govementProcurementOrgBean.area"
                                                                            value="on"
                                                                            class="mousetrap">
                                                                    </td>
                                                                    <td style="padding: 0px; border-bottom: none;">
                                                                        <ul class="johoProcurementOrganLayout">
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_71"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_7"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="36"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_71"
                                                                                    class="table-check">徳島県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_72"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_7"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="37"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_72"
                                                                                    class="table-check">香川県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_73"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_7"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="38"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_73"
                                                                                    class="table-check">愛媛県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_74"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_7"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="39"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_74"
                                                                                    class="table-check">高知県</label>
                                                                            </li>
                                                                            <input type="hidden"
                                                                                   name="_searchConditionBean.govementProcurementOrgBean.prefecture_7"
                                                                                   value="on" class="mousetrap">
                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                        <input
                                                                            id="searchConditionBean.govementProcurementOrgBean.area8"
                                                                            name="searchConditionBean.govementProcurementOrgBean.area"
                                                                            onclick="single_area_select(this)"
                                                                            type="checkbox"
                                                                            value="8" class="mousetrap"><label
                                                                            for="searchConditionBean.govementProcurementOrgBean.area8"
                                                                            class="table-check">九州・沖縄</label><input
                                                                            type="hidden"
                                                                            name="_searchConditionBean.govementProcurementOrgBean.area"
                                                                            value="on"
                                                                            class="mousetrap">
                                                                    </td>
                                                                    <td style="padding: 0px; border-bottom: none;">
                                                                        <ul class="johoProcurementOrganLayout">
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_81"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="40"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_81"
                                                                                    class="table-check">福岡県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_82"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="41"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_82"
                                                                                    class="table-check">佐賀県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_83"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="42"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_83"
                                                                                    class="table-check">長崎県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_84"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="43"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_84"
                                                                                    class="table-check">熊本県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_85"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="44"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_85"
                                                                                    class="table-check">大分県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_86"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="45"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_86"
                                                                                    class="table-check">宮崎県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_87"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="46"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_87"
                                                                                    class="table-check">鹿児島県</label>
                                                                            </li>
                                                                            <li><input
                                                                                    id="searchConditionBean.govementProcurementOrgBean.prefecture_88"
                                                                                    name="searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                    onclick="single_presures_select(this)"
                                                                                    type="checkbox" value="47"
                                                                                    class="mousetrap"><label
                                                                                    for="searchConditionBean.govementProcurementOrgBean.prefecture_88"
                                                                                    class="table-check">沖縄県</label>
                                                                            </li>
                                                                            <input type="hidden"
                                                                                   name="_searchConditionBean.govementProcurementOrgBean.prefecture_8"
                                                                                   value="on" class="mousetrap">
                                                                        </ul>
                                                                    </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </dd>
                                            </dl>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="govementProcurementOrgSelected" type="button"
                                                    class="button-orange button-large" tabindex="2550">選択
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- /メイン モーダル -->

                            </form>
                            <!-- /検索前の基本形 -->
                        </dd>
                    </dl>
                    <!-- メイン 検索結果 -->
                    <h3 class="search-result table-title" style="height: auto">検索結果</h3>
                    <p class="result-number">
                        <strong>{{$cnt}}</strong>件見つかりました。
                    </p>
                    <input type="hidden" id="cnt" value="{{$cnt}}">
                    <p class="main-item-txt" id="info04">
                        参照したい調達案件の[公示本文]をクリックすると、調達案件の詳細を確認することができます。<br>
                        また、入札に参加したい案件については、等級別検索サイトの「調達案件名称」を「<a href="https://www.p-portal.go.jp/pps-web-biz/UZA01/OZA0101" rel="noopener" target="_blank">調達ポータル</a>」の「調達案件名称」に入力して案件を表示し、[入札]をクリックすると政府電子調達システム（GEPS）へ遷移し、その案件の入札に参加することができます。
                    </p>
                    @if(\Illuminate\Support\Facades\Auth::user()->account_type === 'C' || \Illuminate\Support\Facades\Auth::user()->account_type === 'D')
                        公開中　　注目度 │ 高：<i class="fas fa-star high"></i>{{$high}}件 │ 中：<i class="fas fa-star middle"></i>{{$middle}}件 │ 低：<i class="fas fa-star low"></i>{{$low}}件<br>
                        公開終了　注目度 │ 高：<i class="fas fa-star high"></i>{{$high1}}件 │ 中：<i class="fas fa-star middle"></i>{{$middle1}}件 │ 低：<i class="fas fa-star low"></i>{{$low1}}件
                    @else
                        公開中　　注目度 │ 高：<i class="fas fa-star high"></i><a href="{{route('list-favourite')}}?public=1&type=high">{{$high}}</a>件 │ 中：<i class="fas fa-star middle"></i><a href="{{route('list-favourite')}}?public=1&type=middle">{{$middle}}</a>件 │ 低：<i class="fas fa-star low"></i><a href="{{route('list-favourite')}}?public=1&type=low">{{$low}}</a>件<br>
                        公開終了　注目度 │ 高：<i class="fas fa-star high"></i><a href="{{route('list-favourite')}}?public=2&type=high">{{$high1}}</a>件 │ 中：<i class="fas fa-star middle"></i><a href="{{route('list-favourite')}}?public=2&type=middle">{{$middle1}}</a>件 │ 低：<i class="fas fa-star low"></i><a href="{{route('list-favourite')}}?public=2&type=low">{{$low1}}</a>件
                    @endif

                    <div class="result-detail">
                        <ul class="pager">
                            <li class="pager-link jamp prev">
                                <a>&nbsp;</a>
                            </li>
                            <li class="pager-link prev">
                                <a>&nbsp;</a>
                            </li>
                            <div id="pagination_top" style="display: inline">
                                <li class="now page_num">
                                    <a>1</a>
                                </li>
                                <li class="page_num">
                                    <a>2</a>
                                </li>
                                <li class="page_num">
                                    <a>3</a>
                                </li>
                                <li class="page_num">
                                    <a>4</a>
                                </li>
                                <li class="page_num">
                                    <a>5</a>
                                </li>
                            </div>

                            <li class="next pager-link">
                                <a>&nbsp;</a>
                            </li>
                            <li class="jamp next pager-link">
                                <a>&nbsp;</a>
                            </li>
                        </ul>
                        <div class="result-squeeze">
                            <dl class="table-form">

                                {{--                                    <select id="koumokuName" name="koumokuName" tabindex="4000" class="mousetrap">--}}
                                {{--                                        <option value="1" selected="selected">広告公示番号</option><option value="2">調達機関</option><option value="3">所在地</option><option value="4">公開開始日(資料提供招請)</option><option value="5">公開開始日(意見招請)</option><option value="6">公開開始日(調達実施案件公示)</option><option value="7">公開開始日(落札公示)</option>--}}
                                {{--                                    </select>--}}
                                {{--                                    <select id="sortConditionBean.order" name="order" tabindex="4010" class="mousetrap">--}}
                                {{--                                        <option value="1" selected="selected">昇順</option><option value="2">降順</option>--}}
                                {{--                                    </select>--}}
                                <select id="sortConditionBean.displayNo" name="displayNo" tabindex="4020"
                                        class="mousetrap">
                                    <option value="50" selected>50件表示</option>
                                    <option value="100">100件表示</option>
                                    <option value="300">300件表示</option>
                                    <option value="500">500件表示</option>
                                </select>
                                {{--                                    <button class="type-sort button-small button-white nodisabled" id="table_change" name="OAA0103" tabindex="4030">並び替え</button>--}}
                                <ul class="table-name">
                                </ul>

                            </dl>
                        </div>
                        <table class="main-summit-info" id="resultTable" style="min-width: 1176px !important;">
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
                            @foreach($procurements as $procurement)
                                <tr>
                                    <td class="{{\Illuminate\Support\Facades\Auth::user()->account_type === 'C' ? '' : (\Illuminate\Support\Facades\Auth::user()->account_type === 'D' ? '' : 'favourite')}}">
                                        <div class="icon-fav">
                                            @if($procurement->favourite === 0)
                                                <i class="icon-star none"></i>
                                            @elseif($procurement->favourite === 1)
                                                <i class="fas fa-star low"></i>
                                            @elseif($procurement->favourite === 2)
                                                <i class="fas fa-star middle"></i>
                                            @else
                                                <i class="fas fa-star high"></i>
                                            @endif
                                        </div>
                                        <div class="icon-preview" style="display: none;">
                                            <i class="fas fa-star high {{$procurement->favourite === 3 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                            <i class="fas fa-star middle {{$procurement->favourite === 2 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                            <i class="fas fa-star low {{$procurement->favourite === 1 ? 'active-fav' : ''}}"></i><div class="divide"></div>
                                            <i class="icon-star none {{$procurement->favourite === 0 ? 'active-fav' : ''}}"></i>
                                            <input type="hidden" value="{{(string)($procurement->id)}}">
                                        </div>
                                    </td>
                                    <td>{{(string)($procurement->id)}}</td>
                                    <td>{{$procurement->procurement_name}}</td>
                                    <td>{{$procurement->procurement_agency}}</td>
                                    <td>{{$procurement->address}}</td>
                                    <td>
                                        @if($procurement->notification_class === 3)
                                            <a class="{{$procurement->end === true ? 'torikesi-end' : 'koukoku'}} info-button" tabindex="4103"
                                               href="{{route('detail', $procurement->id)}}">公示本文</a><br>

                                            {{$procurement->public_start_date}}公開開始
                                        @endif

                                    </td>
                                    <td>
                                        @if($procurement->notification_class === 4)
                                            <a class="{{$procurement->end === true ? 'torikesi-end' : 'koukoku'}} info-button" tabindex="4103"
                                               href="{{route('detail', $procurement->id)}}">公示本文</a><br>

                                            {{$procurement->public_start_date}}公開開始
                                        @endif
                                    </td>
                                    <td>

                                        @if($procurement->notification_class !== 3 && $procurement->notification_class !== 4 && $procurement->notification_class !== 8 && $procurement->notification_class !== 15 && $procurement->notification_class !== 16)
                                            <a class="{{$procurement->end === true ? 'torikesi-end' : 'koukoku'}} info-button" tabindex="4103"
                                               href="{{route('detail', $procurement->id)}}">公示本文</a><br>

                                            {{$procurement->public_start_date}}公開開始
                                        @endif
                                    </td>
                                    <td>
                                        @if($procurement->notification_class === 8 || $procurement->notification_class === 15 || $procurement->notification_class === 16)
                                            <a class="{{$procurement->end === true ? 'torikesi-end' : 'koukoku'}} info-button" tabindex="4103"
                                               href="{{route('detail', $procurement->id)}}">公示本文</a><br>

                                            {{$procurement->public_start_date}}公開開始
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <ul class="pager">
                        <li class="pager-link jamp prev">
                            <a>&nbsp;</a>
                        </li>
                        <li class="pager-link prev">
                            <a>&nbsp;</a>
                        </li>
                        <div id="pagination_bottom" style="display: inline">
                            <li class="now page_num">
                                <a>1</a>
                            </li>
                            <li class="page_num">
                                <a>2</a>
                            </li>
                            <li class="page_num">
                                <a>3</a>
                            </li>
                            <li class="page_num">
                                <a>4</a>
                            </li>
                            <li class="page_num">
                                <a>5</a>
                            </li>
                        </div>

                        <li class="next pager-link">
                            <a>&nbsp;</a>
                        </li>
                        <li class="jamp next pager-link">
                            <a>&nbsp;</a>
                        </li>
                    </ul>
                    <!--/メイン 検索結果 -->
{{--                    <div>--}}
{{--                        <input type="hidden" name="_csrf" value="676ea4f2-6ccf-428e-b4e1-618e4e11dab9"--}}
{{--                               class="mousetrap">--}}
{{--                    </div>--}}
                </div>
                <div class="main-item d-none">
                    <form id="tri_WAA0101FM01" novalidate="true" action="/pps-web-biz/UAA01/OAA0100" method="post">
                        <div class="alert message-error input-error-list" style="display: none;">
                        </div>
                        <p class="main-item-txt" id="info01">調達情報の検索を行うことができます。</p>


                        <div class="nmlbox graybg" style="color:#333;">
                            <img src="{{asset('img/button_02.png')}}" alt="株式会社日本スマートマーケティング"><strong>検索条件</strong><br>
                            検索条件を設定し、[検索]をクリックしてください。<br>
                            ※検索条件の指定は任意です。なお、検索結果を一度に表示できる件数は最大500件です。<br>
                            ※調達案件名称の指定においては、AND検索、OR検索、NOT検索ができます。<br>
                            ※公示本文のキーワードの指定においては、AND検索、OR検索、NOT検索ができます。<br>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="main-item-table">

                                </div>
                            </div>
                        </div>
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
    {{--    <script src="{{asset('js/commonPps.js')}}"></script>--}}

    <script src="{{asset('js/UAA01.js')}}"></script>
    <!-- Data tables -->
    <script src="{{ asset('template/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('admin_tmp/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <script>
        let cnt, page, cur_page = 1, per_page = 10;
        let searchCon;
        let resultTable;
        var home_path = $("#home_path").val();
        $(document).ready(function () {
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
                                console.log($t);
                                $t.parent().find('i.active-fav').removeClass('active-fav');
                                $t.addClass('active-fav')
                                if(rate === 0){
                                    cont = '<i class="icon-star none"></i>';
                                }
                                if(rate === 1){
                                    cont = '<i class="fas fa-star low"></i>';
                                }
                                if(rate === 2){
                                    cont = '<i class="fas fa-star middle"></i>';
                                }
                                if(rate === 3){
                                    cont = '<i class="fas fa-star high"></i>';
                                }

                                $t.parent().prev().empty();
                                $t.parent().prev().html(cont);
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
        })
        $(document).ready(function () {
            let account_type = $('#user_account_type').val();
            if(account_type === 'C'){
                var now = new Date();
                now.setDate(now.getDate() - 30);
                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                $('#start-date-to').val(today);
                $('#start-date-to').attr('max', today);
            }
            cnt = $('#cnt').val();
            let overflow = $('#overflow').val();
            if(overflow == 1){
                $('#overflow_area').show()
                $('#overflow_area').find('li').text('検索結果が' + cnt +'件を超えたため、先頭の'+ cnt + '件を表示します。');
            }
            else{
                $('#overflow_area').hide();
            }
            searchCon = JSON.parse($('#searchCon').val());
            per_page = parseInt(searchCon.per_page)

            if (searchCon.type == null) {
                $('#searchCon_type').text('指定なし');
            } else {
                $('#searchCon_type').text(searchCon.type);
            }
            if (searchCon.classify == '0') {
                $('#searchCon_classify').text('全て');
            } else if (searchCon.classify == '1') {
                $('#searchCon_classify').text('物品・役務');
            } else {
                $('#searchCon_classify').text('簡易な公共事業');
            }
            if (searchCon.agency == null) {
                $('#searchCon_agency').text('機関名: 指定なし');
            } else {
                $('#searchCon_agency').text('機関名: ' + searchCon.agency);
            }
            if (searchCon.address == null) {
                $('#searchCon_address').text('所在地: 指定なし');
            } else {
                $('#searchCon_address').text('所在地: ' + searchCon.address);
            }
            if (searchCon.item_classify == null) {
                $('#searchCon_item_classify').text('指定なし');
            } else {
                $('#searchCon_item_classify').text(searchCon.item_classify);
            }
            if (searchCon.public_start_date_from == null && searchCon.public_start_date_to == null) {
                $('#searchCon_public_start_date').text('指定なし');
            } else {
                $('#searchCon_public_start_date').text(searchCon.public_start_date_from + '~' + searchCon.public_start_date_to);
            }
            if (searchCon.public_end_date_from == null && searchCon.public_end_date_to == null) {
                $('#searchCon_public_end_date').text('指定なし');
            } else {
                $('#searchCon_public_end_date').text(searchCon.public_end_date_from + '~' + searchCon.public_end_date_to);
            }
            if (searchCon.name == null) {
                $('#searchCon_name').text('指定なし');
            } else {
                $('#searchCon_name').text(searchCon.name);
            }
            if (searchCon.public_id == null) {
                $('#searchCon_public_id').text('指定なし');
            } else {
                $('#searchCon_public_id').text(searchCon.public_id);
            }
            if (searchCon.official_text == null) {
                $('#searchCon_official_text').text('指定なし');
            } else {
                $('#searchCon_official_text').text(searchCon.official_text);
            }

            $('#searchCon_per_page').text(searchCon.per_page);

            if (searchCon.grade == null) {
                $('#searchCon_grade').text('指定なし');
            } else {
                let grade = searchCon.grade;
                let arr = grade.split(',');
                let txt = '';
                for(let i = 0; i < arr.length; i++){

                    if(arr[i] == 'none'){
                        txt = txt + '等級なし,';
                    }
                    else{
                        txt = txt + arr[i].toUpperCase() + ', ';
                    }
                }
                $('#searchCon_grade').text(txt);
            }
            if (searchCon.no_grade == null) {
                $('#searchCon_no_grade').text('指定なし');
            } else {
                let no_grade = searchCon.no_grade;
                let no_arr = no_grade.split(',');
                let txt = '';
                for(let i = 0; i < no_arr.length; i++){

                    if(no_arr[i] == 'none'){
                        txt = txt + '等級なし, ';
                    }
                    else{
                        txt = txt + no_arr[i].toUpperCase() + ', ';
                    }
                }
                $('#searchCon_no_grade').text(txt);
            }


            resultTable = $('#resultTable').DataTable({
                "language": {
                    "decimal":        "",
                    "emptyTable":     "表で使用できるデータがありません。",
                    "info":           "_TOTAL_つのエントリのうち_START_~_END_を表示する",
                    "infoEmpty":      "エントリ数0~0の0を表示",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "表示 _MENU_ ",
                    "loadingRecords": "ロード...",
                    "processing":     "処理...",
                    "search":         "検索:",
                    "zeroRecords":    "一致するレコードが見つかりません。",
                    "paginate": {
                        "first":      "最初",
                        "last":       "最終",
                        "next":       "次へ",
                        "previous":   "前へ"
                    },
                    "aria": {
                        "sortAscending":  ": 列を昇順にソートするためにアクティブにする",
                        "sortDescending": ": カラムを降順にソートするためにアクティブにする"
                    }
                },
                "pageLength": per_page,
                "lengthMenu": [50, 100, 300, 500]
            });

            $('[name=displayNo]').change(function () {
                per_page = parseInt($(this).val());
                cur_page = 1;
                drawPagination(per_page);
                $('[name=resultTable_length]').val(per_page).change();
            })
            $('#table_change').click(function () {
                let sort_col = $('[name=koumokuName]').val();
                let sort_dir = $('[name=order]').val();
                per_page = parseInt($('[name=displayNo]').val());
                cur_page = 1;
                drawPagination(per_page);
                $('[name=resultTable_length]').val(per_page).change();
            })

            drawPagination(per_page);
            $('.pager-link').click(function () {
                if (!$(this).hasClass('link-none')) {
                    if ($(this).hasClass('prev')) {
                        if ($(this).hasClass('jamp')) {
                            $('.page-item').each(function () {
                                if ($(this).find('a').text() == '1') {
                                    $(this).trigger('click');
                                    cur_page = 1;
                                    drawPagination(per_page)
                                }
                            })
                        } else {
                            cur_page = cur_page - 1;
                            drawPagination(per_page)
                            $('.previous').trigger('click');
                        }
                    } else {
                        if ($(this).hasClass('jamp')) {
                            $('.page-item').each(function () {
                                if (parseInt($(this).find('a').text()) == page) {
                                    $(this).trigger('click');
                                    cur_page = page;
                                    drawPagination(per_page)
                                }
                            })
                        } else {
                            $('ul.pagination .next').trigger('click');
                            cur_page = cur_page + 1;
                            drawPagination(per_page)
                        }
                    }
                }

            })

            $(document).on('click', '.th', function () {
                cur_page = 1;
                drawPagination(per_page)
            })

            $(document).on('click', '.page_num', function () {
                let page_num = $(this).find('a').text();

                cur_page = parseInt(page_num);
                resultTable.page(cur_page-1).draw( 'page' )
                drawPagination(per_page);
                // $('.page-item').each(function () {
                //     let page_item = $(this).find('a').text();
                //
                //     if (page_item == page_num) {
                //         $(this).trigger('click');
                //     }
                // })
            })
        })

        function drawPagination(n) {
            page = parseInt(cnt / n);
            if (cnt > page * n) {
                page = page + 1;
            }
            if (page == 1) {
                $('.pager-link').each(function () {
                    $(this).addClass('link-none')
                })
            } else {
                if (cur_page == 1) {
                    $('.prev').each(function () {
                        $(this).addClass('link-none');
                    })
                    $('.next').each(function () {
                        $(this).removeClass('link-none');
                    })
                } else if (cur_page == page) {
                    $('.next').each(function () {
                        $(this).addClass('link-none');
                    })
                    $('.prev').each(function () {
                        $(this).removeClass('link-none');
                    })
                } else {
                    $('.next').each(function () {
                        $(this).removeClass('link-none');
                    })
                    $('.prev').each(function () {
                        $(this).removeClass('link-none');
                    })
                }
            }

            $('#pagination_top').empty();
            $('#pagination_bottom').empty();
            if(cur_page - 5 > 0 && cur_page + 4 < page){
                var start_page = cur_page - 5;
                var end_page = cur_page + 4;

            }
            else if(cur_page <= 5){
                if(page < 11){
                    var start_page = 1;
                    var end_page = page;
                }
                else{
                    var start_page = 1;
                    var end_page = 10;
                }
            }
            else if(cur_page + 4 >= page){
                if(page > 9){
                    var end_page = page;
                    var start_page = page - 9;
                }
                else{
                    var end_page = page;
                    var start_page = 1;
                }
            }

            for (let i = start_page; i <= end_page; i++) {
                let content
                if (i == cur_page) {
                    content = '<li class="now page_num">\n' +
                        '<a>' + i + '</a>\n' +
                        '</li>'
                } else {
                    content = '<li class="page_num">\n' +
                        '<a>' + i + '</a>\n' +
                        '</li>'
                }
                $('#pagination_top').append(content);
                $('#pagination_bottom').append(content);
            }

        }
    </script>

    <script>
        let c_grade = [], no_grade = [];
        function removeA(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax= arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        $('[type=checkbox]').click(function () {
            let name = $(this).attr('name');
            let arr_name = name.split('_');

            if(arr_name[arr_name.length-1] == 'grade'){
                let grade;
                if(arr_name.length == 3){
                    grade = arr_name[0] + '_grade';
                    if($(this)[0].checked){
                        no_grade.push(arr_name[0])
                        removeA(c_grade, arr_name[0]);
                    }
                    else{
                        removeA(no_grade, arr_name[0]);
                    }
                }
                else{
                    grade = arr_name[0] + '_n_grade';
                    if($(this)[0].checked){
                        c_grade.push(arr_name[0])
                        removeA(no_grade, arr_name[0]);
                    }
                    else{
                        removeA(c_grade, arr_name[0]);
                    }
                }
                let n = '[name=' + grade + ']';

                if($(this)[0].checked){

                    $(n)[0].checked = false;
                }
                // else{
                //     $(n)[0].checked = true;
                // }
                $('#grade').val(c_grade.toString())
                $('#no_grade').val(no_grade.toString());
            }

        })
    </script>

@endsection
