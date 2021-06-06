@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{asset('template/fonts/fonts/font-awesome.min.css')}}">
    <!-- Dashboard Css -->
    <link href="{{asset('template/css/dashboard.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/commonForm.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/tables1.css')}}" rel="stylesheet"/>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-ttl">
                    <div class="ttl-area">
                        <h2>メール受信設定</h2>
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
                        <p class="main-item-txt" id="info01">調達情報の検索を行うことができます。</p>
                        <table class="dsc1item" cellspacing="1" style="color: #333">
                            <tbody>
                            <tr>
                                <th width="20">説明</th>
                                <td><a><img src="./img/button_042.jpg"
                                            alt="株式会社日本スマートマーケティング"></a>：クリックで選択項目を表示
                                </td>
                                <td><a><img src="./img/button_07.jpg"
                                            alt="株式会社日本スマートマーケティング"></a>：クリックで検索条件の説明
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        <div class="nmlbox graybg" style="color:#333;">
                            <img src="./img/button_02.png" alt="株式会社日本スマートマーケティング"><strong>検索条件</strong><br>
                            検索条件を設定し、[設定]をクリックしてください。<br>
                            ※検索条件の指定は任意です。なお、検索結果を一度に送信できる件数は最大１00件です。<br>
                            ※１日１回ログインメールアドレスに、公開開始から最新３日間の検索結果を送信します。<br>
                            ※調達案件名称の指定においては、キーワードを入力した場合はスペース区切りでAND検索ができます。<br>
                            ※公示本文のキーワードの指定においては、AND検索、OR検索、NOT検索ができます。<br>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="main-item-table">
                                    <ul class="table-name">
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


                                <span><input id="searchConditionBean.caseDivision1"
                                             name="searchConditionBean.caseDivision" tabindex="1230" disabled="disabled"
                                             type="radio" value="0" checked="checked" class="mousetrap"><label
                                        for="searchConditionBean.caseDivision1" class="table-radio" tabindex="1230">公開中の調達案件</label></span>


                                            </dd>
                                        </dl>
                                    </ul>
                                    <ul class="table-name">
                                        <dl class="table-form">
                                            <dt>
                                                <span>調達種別</span>
                                                <div class="table-tip" data-toggle="modal" data-target="#select_type">
                                                    <img src="./img/button_042.jpg"
                                                         alt="補足説明"
                                                         class="tip-icn over" tabindex="1800">
                                                </div>
                                            </dt>
                                            <input id="procurementCla" name="searchConditionBean.procurementCla"
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
                                <span><input id="searchConditionBean.cla1" name="searchConditionBean.cla"
                                             tabindex="1730" type="radio" value="01" checked="checked"
                                             class="mousetrap"><label for="searchConditionBean.cla1" class="table-radio"
                                                                      tabindex="1730">全て</label></span><span><input
                                                        id="searchConditionBean.cla2" name="searchConditionBean.cla"
                                                        tabindex="1730"
                                                        type="radio" value="02" class="mousetrap"><label
                                                        for="searchConditionBean.cla2"
                                                        class="table-radio"
                                                        tabindex="1730">物品・役務</label></span><span><input
                                                        id="searchConditionBean.cla3" name="searchConditionBean.cla"
                                                        tabindex="1730"
                                                        type="radio" value="03" class="mousetrap"><label
                                                        for="searchConditionBean.cla3"
                                                        class="table-radio"
                                                        tabindex="1730">簡易な公共事業</label></span>

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
                                                    <img src="./img/button_042.jpg"
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
                                                       name="searchConditionBean.procurementOrganNm"
                                                       type="hidden" value="" class="mousetrap">
                                                <dd id="procurementOrganNmtitle"
                                                    style="width: 70px; display: none; vertical-align: top; margin-right: -5px;">
                                                    機関名：
                                                </dd>
                                                <dd style="width: 91%; border-bottom: none; display: none; margin-left: 0px;"
                                                    id="procurementOrganNmText"></dd>
                                                <input id="receiptAddress" name="searchConditionBean.receiptAddress"
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
                                                    <img src="./img/button_042.jpg"
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
                                            <input id="procurementItemCla" name="searchConditionBean.procurementItemCla"
                                                   type="hidden"
                                                   value="" class="mousetrap">
                                            <dd style="width: 97%; border-bottom: none;" id="procurementItemClaText">
                                            </dd>

                                        </dl>
                                    </ul>
                                    <ul class="table-name row mb-0 mx-0">

                                        <li class="col-sm-6">
                                            <dl class="table-form">
                                                <dt>
                                                    <span><label for="case-name">調達案件名称</label></span>
                                                    <div class="table-tip">
                                                        <img
                                                            src="./img/button_07.jpg"
                                                            alt="補足説明"
                                                            class="tip-icn over" tabindex="1600">
                                                        <div class="table-tip-txt">
                                                            <img
                                                                src="{{asset('img/icn_close.png')}}"
                                                                alt="閉じる"
                                                                class="tip-txt-close" tabindex="1610">
                                                            <p tabindex="1620" id="komoku05">
                                                                調達案件名称を入力してください。名称は部分一致で検索することができます。<br>スペース（空白）で区切って複数のキーワードを指定すると、すべてのキーワードを含む調達案件名称が検索対象になります。
                                                            </p>
                                                        </div>
                                                    </div>
                                                </dt>
                                                <dd>
                                                    <input id="case-name" name="searchConditionBean.articleNm"
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
                                                    <input id="case-number" name="searchConditionBean.procurementItemNo"
                                                           tabindex="1330"
                                                           placeholder="半角19文字" type="number"
                                                           class="only-hankaku mousetrap"
                                                           oninput="if(value.length>19)value=value.slice(0,19)"
                                                           value="">

                                                </dd>
                                            </dl>
                                        </li>
                                    </ul>

                                    <ul class="table-name row mb-0 mx-0">
                                        <li class="col-12">
                                            <dl class="table-form">
                                                <dt>
                                                    <span>公示本文のキーワード指定</span>
                                                    <img src="./img/button_07.jpg"
                                                         alt="補足説明"
                                                         class="tip-icn over" tabindex="2200">
                                                    <div class="table-tip-txt">
                                                        <img src="{{asset('img/icn_close.png')}}"
                                                             alt="閉じる"
                                                             class="tip-txt-close" tabindex="2210">
                                                        <p tabindex="2220" id="komoku11">調達の品目分類を選択してください。</p>
                                                    </div>
                                                </dt>
                                                <dd>
                                                    <input name="name" id="name" required="" type="text" size="40" maxlength="255" minlength="1">
                                                </dd>
                                            </dl>
                                        </li>
                                        <li class="col-12 px-0 mb-5">
                                            <dl class="table-form">
                                                <dt>
                                                    <span class="mr-3">表示件数</span>
                                                    <select name="表示件数">
                                                        <option value="">50</option>
                                                        <option value="">100 </option>
                                                        <option value="">300 </option>
                                                        <option value="">500 </option>
                                                    </select>
                                                </dt>
                                            </dl>
                                        </li>

                                        <li class="col-12 px-0 mb-5">
                                            <dl class="table-form">
                                                <dt>
                                                    <span>等級指定（次の等級を含む）</span>
                                                    <img src="./img/button_07.jpg"
                                                         alt="補足説明"
                                                         class="tip-icn over" tabindex="2200">
                                                    <div class="table-tip-txt">
                                                        <img src="{{asset('img/icn_close.png')}}"
                                                             alt="閉じる"
                                                             class="tip-txt-close" tabindex="2210">
                                                        <p tabindex="2220" id="komoku11">調達の品目分類を選択してください。</p>
                                                    </div>
                                                </dt>
                                                <dd>
                                                    <input type="checkbox">　A　　　　<input type="checkbox">　B　　　<input type="checkbox">　C　　　　<input type="checkbox">　D
                                                    <br>
                                                    <input type="checkbox">　ABCD　　<input type="checkbox">　ABC　　<input type="checkbox">　AB
                                                    <br>
                                                    <input type="checkbox">　BCD　　　<input type="checkbox">　BC　　　<input type="checkbox">　CD　　　<input type="checkbox">　等級なし
                                                </dd>
                                            </dl>
                                        </li>

                                        <li class="col-12 px-0">
                                            <dl class="table-form">
                                                <dt>
                                                    <span>等級指定（次の等級を除く）</span>
                                                    <img src="./img/button_07.jpg"
                                                         alt="補足説明"
                                                         class="tip-icn over" tabindex="2200">
                                                    <div class="table-tip-txt">
                                                        <img src="{{asset('img/icn_close.png')}}"
                                                             alt="閉じる"
                                                             class="tip-txt-close" tabindex="2210">
                                                        <p tabindex="2220" id="komoku11">調達の品目分類を選択してください。</p>
                                                    </div>
                                                </dt>
                                                <dd>
                                                    <input type="checkbox">　A　　　　<input type="checkbox">　B　　　　<input type="checkbox">　C　　　　<input type="checkbox">　D
                                                    <br>
                                                    <input type="checkbox">　ABCD　　<input type="checkbox">　ABC　　<input type="checkbox">　AB
                                                    <br>
                                                    <input type="checkbox">　BCD　　　<input type="checkbox">　BC　　　<input type="checkbox">　CD　　　<input type="checkbox">　等級なし
                                                </dd>
                                            </dl>
                                        </li>

                                    </ul>

                                    <p class="txt-img" style="text-align: right">
                                        <a href="">
                                            <img src="./img/button_01.jpg" alt="株式会社日本スマートマーケティング">
                                        </a>
                                    </p>

                                    <!--Scrolling Modal-->
                                    <div class="modal fade" id="select_type" tabindex="-1" role="dialog" aria-labelledby="select_type" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 style="margin-top: 15px;">調達種別を選択する</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="main-modal modal-type-01">
                                                        <div class="main-modal-inner" style="width: 100%" tabindex="2300">
                                                            <div class="modal-contents" id="select-control">
                                                                <p>
                                                                    [&nbsp;<a class="table-check-all" tabindex="2320">全選択</a>&nbsp;|&nbsp;<a
                                                                        class="table-check-remove" tabindex="2330">選択解除</a>&nbsp;]
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
                                                                                                tabindex="2340" type="checkbox"
                                                                                                value="01"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementClaBidNotice1"
                                                                                                class="table-check">入札公告(公示)予定の公示(年間調達予定)</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.procurementClaBidNotice2"
                                                                                                name="searchConditionBean.procurementClaBean.procurementClaBidNotice"
                                                                                                tabindex="2340" type="checkbox"
                                                                                                value="02"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementClaBidNotice2"
                                                                                                class="table-check">政府調達セミナー及び政府調達年次会合の開催の公示</label>
                                                                                        </li>
                                                                                        <input type="hidden"
                                                                                               name="_searchConditionBean.procurementClaBean.procurementClaBidNotice"
                                                                                               value="on" class="mousetrap">
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
                                                                                                tabindex="2350" type="checkbox"
                                                                                                value="03"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.requestSubmissionMaterials1"
                                                                                                class="table-check">資料提供招請に関する公表</label>
                                                                                        </li>
                                                                                        <input type="hidden"
                                                                                               name="_searchConditionBean.procurementClaBean.requestSubmissionMaterials"
                                                                                               value="on" class="mousetrap">
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
                                                                                                tabindex="2360" type="checkbox"
                                                                                                value="04"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.requestComment1"
                                                                                                class="table-check">意見招請に関する公示</label>
                                                                                        </li>
                                                                                        <input type="hidden"
                                                                                               name="_searchConditionBean.procurementClaBean.requestComment"
                                                                                               value="on" class="mousetrap">
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
                                                                                                tabindex="2370" type="checkbox"
                                                                                                value="05"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementImplementNotice1"
                                                                                                class="table-check">一般競争入札の入札公告（WTO対象）</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.procurementImplementNotice2"
                                                                                                name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                                tabindex="2370" type="checkbox"
                                                                                                value="06"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementImplementNotice2"
                                                                                                class="table-check">指名競争入札の入札公示（WTO対象）</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.procurementImplementNotice3"
                                                                                                name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                                tabindex="2370" type="checkbox"
                                                                                                value="07"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementImplementNotice3"
                                                                                                class="table-check">随意契約に関する公示</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.procurementImplementNotice4"
                                                                                                name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                                tabindex="2370" type="checkbox"
                                                                                                value="10"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementImplementNotice4"
                                                                                                class="table-check">一般競争入札の入札公告（WTO対象外）</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.procurementImplementNotice5"
                                                                                                name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                                tabindex="2370" type="checkbox"
                                                                                                value="12"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementImplementNotice5"
                                                                                                class="table-check">指名競争入札の入札公示（WTO対象外）</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.procurementImplementNotice6"
                                                                                                name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                                tabindex="2370" type="checkbox"
                                                                                                value="13"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementImplementNotice6"
                                                                                                class="table-check">公募型プロポーザル情報</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.procurementImplementNotice7"
                                                                                                name="searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                                tabindex="2370" type="checkbox"
                                                                                                value="14"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.procurementImplementNotice7"
                                                                                                class="table-check">オープンカウンタへの参加募集情報</label>
                                                                                        </li>
                                                                                        <input type="hidden"
                                                                                               name="_searchConditionBean.procurementClaBean.procurementImplementNotice"
                                                                                               value="on" class="mousetrap">
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
                                                                                                tabindex="2380" type="checkbox"
                                                                                                value="08"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.successfulBidNotice1"
                                                                                                class="table-check">落札者等の公示（WTO対象）</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.successfulBidNotice2"
                                                                                                name="searchConditionBean.procurementClaBean.successfulBidNotice"
                                                                                                tabindex="2380" type="checkbox"
                                                                                                value="15"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.successfulBidNotice2"
                                                                                                class="table-check">落札者等の公示（WTO対象外）</label>
                                                                                        </li>
                                                                                        <li><input
                                                                                                id="searchConditionBean.procurementClaBean.successfulBidNotice3"
                                                                                                name="searchConditionBean.procurementClaBean.successfulBidNotice"
                                                                                                tabindex="2380" type="checkbox"
                                                                                                value="16"
                                                                                                class="mousetrap"><label
                                                                                                for="searchConditionBean.procurementClaBean.successfulBidNotice3"
                                                                                                class="table-check">落札者等の公示（随意契約）</label>
                                                                                        </li>
                                                                                        <input type="hidden"
                                                                                               name="_searchConditionBean.procurementClaBean.successfulBidNotice"
                                                                                               value="on" class="mousetrap">
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
                                                            class="button-orange button-large" tabindex="2390" data-dismiss="modal" style="border: none; background: none; padding: 0;">
                                                        <img src="./img/button_04.jpg" alt="株式会社日本スマートマーケティング">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- メイン モーダル -->

                                    <!--Scrolling Modal-->
                                    <div class="modal fade" id="modal_02" tabindex="-1" role="dialog" aria-labelledby="select_type" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 style="margin-top: 15px;">調達機関（国）を選択する</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="main-modal modal-type-02">
                                                        <div class="main-modal-inner" style="width: 100%" tabindex="2400">
                                                            <div class="modal-contents" id="select-control"
                                                                 style="overflow-y: scroll; overflow: hidden">
                                                                <div style="padding: 10px; border-bottom: none;">
                                                                    <dl class="table-form form-a-line" style="float:left;">
                                                                        <dt>
                                                                            <span>機関名</span>
                                                                        </dt>
                                                                        <p>
                                                                            [&nbsp; <a class="table-check-all" tabindex="2420">全選択</a>
                                                                            &nbsp;|&nbsp; <a class="table-check-remove" tabindex="2430">選択解除</a>
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
                                                                                            tabindex="2440" type="checkbox" value="001"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm1"
                                                                                            class="table-check" style="width: 120px;">衆議院</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm2"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="002"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm2"
                                                                                            class="table-check" style="width: 120px;">参議院</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm3"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="003"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm3"
                                                                                            class="table-check" style="width: 120px;">最高裁判所</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm4"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="004"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm4"
                                                                                            class="table-check" style="width: 120px;">会計検査院</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm5"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="005"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm5"
                                                                                            class="table-check" style="width: 120px;">内閣官房</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm6"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="006"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm6"
                                                                                            class="table-check" style="width: 120px;">人事院</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm7"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="007"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm7"
                                                                                            class="table-check" style="width: 120px;">内閣府</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm8"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="008"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm8"
                                                                                            class="table-check" style="width: 120px;">宮内庁</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm9"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="009"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm9"
                                                                                            class="table-check"
                                                                                            style="width: 120px;">国家公安委員会（警察庁）</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm10"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="010"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm10"
                                                                                            class="table-check" style="width: 120px;">防衛省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm11"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="011"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm11"
                                                                                            class="table-check" style="width: 120px;">金融庁</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm12"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="012"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm12"
                                                                                            class="table-check" style="width: 120px;">総務省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm13"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="013"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm13"
                                                                                            class="table-check" style="width: 120px;">法務省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm14"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="014"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm14"
                                                                                            class="table-check" style="width: 120px;">外務省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm15"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="015"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm15"
                                                                                            class="table-check" style="width: 120px;">財務省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm16"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="016"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm16"
                                                                                            class="table-check" style="width: 120px;">文部科学省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm17"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="017"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm17"
                                                                                            class="table-check" style="width: 120px;">厚生労働省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm18"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="018"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm18"
                                                                                            class="table-check" style="width: 120px;">農林水産省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm19"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="019"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm19"
                                                                                            class="table-check" style="width: 120px;">経済産業省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm20"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="020"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm20"
                                                                                            class="table-check" style="width: 120px;">国土交通省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm21"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="021"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm21"
                                                                                            class="table-check" style="width: 120px;">環境省</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm22"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="022"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm22"
                                                                                            class="table-check" style="width: 120px;">消費者庁</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm23"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="023"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm23"
                                                                                            class="table-check" style="width: 120px;">復興庁</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm24"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="024"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm24"
                                                                                            class="table-check" style="width: 120px;">公正取引委員会</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm25"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="025"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm25"
                                                                                            class="table-check" style="width: 120px;">個人情報保護委員会</label>
                                                                                    </li>
                                                                                    <li><input
                                                                                            id="searchConditionBean.govementProcurementOraganBean.procurementOrgNm26"
                                                                                            name="searchConditionBean.govementProcurementOraganBean.procurementOrgNm"
                                                                                            tabindex="2440" type="checkbox" value="026"
                                                                                            class="mousetrap"><label
                                                                                            for="searchConditionBean.govementProcurementOraganBean.procurementOrgNm26"
                                                                                            class="table-check" style="width: 120px;">カジノ管理委員会</label>
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
                                                                                &nbsp;|&nbsp; <a class="table-check-remove"
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
                                                                                                type="checkbox" value="1"
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
                                                                                                        type="checkbox" value="01"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_11"
                                                                                                        class="table-check">北海道</label>
                                                                                                </li>
                                                                                                <input type="hidden"
                                                                                                       name="_searchConditionBean.govementProcurementOraganBean.prefecture_1"
                                                                                                       value="on" class="mousetrap">
                                                                                            </ul>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                            <input
                                                                                                id="searchConditionBean.govementProcurementOraganBean.area2"
                                                                                                name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                                onclick="single_govementProcurementOragan_area_select(this)"
                                                                                                type="checkbox" value="2"
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
                                                                                                        type="checkbox" value="02"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_21"
                                                                                                        class="table-check">青森県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_22"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="03"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_22"
                                                                                                        class="table-check">岩手県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_23"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="04"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_23"
                                                                                                        class="table-check">宮城県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_24"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="05"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_24"
                                                                                                        class="table-check">秋田県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_25"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="06"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_25"
                                                                                                        class="table-check">山形県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_26"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="07"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_26"
                                                                                                        class="table-check">福島県</label>
                                                                                                </li>
                                                                                                <input type="hidden"
                                                                                                       name="_searchConditionBean.govementProcurementOraganBean.prefecture_2"
                                                                                                       value="on" class="mousetrap">
                                                                                            </ul>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                            <input
                                                                                                id="searchConditionBean.govementProcurementOraganBean.area3"
                                                                                                name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                                onclick="single_govementProcurementOragan_area_select(this)"
                                                                                                type="checkbox" value="3"
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
                                                                                                        type="checkbox" value="08"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_31"
                                                                                                        class="table-check">茨城県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_32"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="09"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_32"
                                                                                                        class="table-check">栃木県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_33"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="10"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_33"
                                                                                                        class="table-check">群馬県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_34"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="11"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_34"
                                                                                                        class="table-check">埼玉県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_35"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="12"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_35"
                                                                                                        class="table-check">千葉県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_36"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="13"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_36"
                                                                                                        class="table-check">東京都</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_37"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="14"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_37"
                                                                                                        class="table-check">神奈川県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_38"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="15"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_38"
                                                                                                        class="table-check">新潟県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_39"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="19"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_39"
                                                                                                        class="table-check">山梨県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_310"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="20"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_310"
                                                                                                        class="table-check">長野県</label>
                                                                                                </li>
                                                                                                <input type="hidden"
                                                                                                       name="_searchConditionBean.govementProcurementOraganBean.prefecture_3"
                                                                                                       value="on" class="mousetrap">
                                                                                            </ul>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                            <input
                                                                                                id="searchConditionBean.govementProcurementOraganBean.area4"
                                                                                                name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                                onclick="single_govementProcurementOragan_area_select(this)"
                                                                                                type="checkbox" value="4"
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
                                                                                                        type="checkbox" value="16"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_41"
                                                                                                        class="table-check">富山県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_42"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="17"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_42"
                                                                                                        class="table-check">石川県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_43"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="18"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_43"
                                                                                                        class="table-check">福井県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_44"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="21"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_44"
                                                                                                        class="table-check">岐阜県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_45"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="22"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_45"
                                                                                                        class="table-check">静岡県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_46"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="23"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_46"
                                                                                                        class="table-check">愛知県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_47"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="24"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_47"
                                                                                                        class="table-check">三重県</label>
                                                                                                </li>
                                                                                                <input type="hidden"
                                                                                                       name="_searchConditionBean.govementProcurementOraganBean.prefecture_4"
                                                                                                       value="on" class="mousetrap">
                                                                                            </ul>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                            <input
                                                                                                id="searchConditionBean.govementProcurementOraganBean.area5"
                                                                                                name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                                onclick="single_govementProcurementOragan_area_select(this)"
                                                                                                type="checkbox" value="5"
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
                                                                                                        type="checkbox" value="25"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_51"
                                                                                                        class="table-check">滋賀県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_52"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="26"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_52"
                                                                                                        class="table-check">京都府</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_53"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="27"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_53"
                                                                                                        class="table-check">大阪府</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_54"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="28"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_54"
                                                                                                        class="table-check">兵庫県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_55"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="29"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_55"
                                                                                                        class="table-check">奈良県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_56"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="30"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_56"
                                                                                                        class="table-check">和歌山県</label>
                                                                                                </li>
                                                                                                <input type="hidden"
                                                                                                       name="_searchConditionBean.govementProcurementOraganBean.prefecture_5"
                                                                                                       value="on" class="mousetrap">
                                                                                            </ul>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                            <input
                                                                                                id="searchConditionBean.govementProcurementOraganBean.area6"
                                                                                                name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                                onclick="single_govementProcurementOragan_area_select(this)"
                                                                                                type="checkbox" value="6"
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
                                                                                                        type="checkbox" value="31"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_61"
                                                                                                        class="table-check">鳥取県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_62"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="32"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_62"
                                                                                                        class="table-check">島根県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_63"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="33"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_63"
                                                                                                        class="table-check">岡山県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_64"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="34"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_64"
                                                                                                        class="table-check">広島県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_65"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="35"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_65"
                                                                                                        class="table-check">山口県</label>
                                                                                                </li>
                                                                                                <input type="hidden"
                                                                                                       name="_searchConditionBean.govementProcurementOraganBean.prefecture_6"
                                                                                                       value="on" class="mousetrap">
                                                                                            </ul>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                            <input
                                                                                                id="searchConditionBean.govementProcurementOraganBean.area7"
                                                                                                name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                                onclick="single_govementProcurementOragan_area_select(this)"
                                                                                                type="checkbox" value="7"
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
                                                                                                        type="checkbox" value="36"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_71"
                                                                                                        class="table-check">徳島県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_72"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="37"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_72"
                                                                                                        class="table-check">香川県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_73"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="38"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_73"
                                                                                                        class="table-check">愛媛県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_74"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="39"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_74"
                                                                                                        class="table-check">高知県</label>
                                                                                                </li>
                                                                                                <input type="hidden"
                                                                                                       name="_searchConditionBean.govementProcurementOraganBean.prefecture_7"
                                                                                                       value="on" class="mousetrap">
                                                                                            </ul>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="padding: 0px; border-bottom: none; width: 200px; border-right: 1px solid #dedede;">
                                                                                            <input
                                                                                                id="searchConditionBean.govementProcurementOraganBean.area8"
                                                                                                name="searchConditionBean.govementProcurementOraganBean.area"
                                                                                                onclick="single_govementProcurementOragan_area_select(this)"
                                                                                                type="checkbox" value="8"
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
                                                                                                        type="checkbox" value="40"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_81"
                                                                                                        class="table-check">福岡県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_82"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="41"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_82"
                                                                                                        class="table-check">佐賀県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_83"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="42"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_83"
                                                                                                        class="table-check">長崎県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_84"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="43"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_84"
                                                                                                        class="table-check">熊本県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_85"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="44"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_85"
                                                                                                        class="table-check">大分県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_86"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="45"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_86"
                                                                                                        class="table-check">宮崎県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_87"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="46"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_87"
                                                                                                        class="table-check">鹿児島県</label>
                                                                                                </li>
                                                                                                <li><input
                                                                                                        id="searchConditionBean.govementProcurementOraganBean.prefecture_88"
                                                                                                        name="searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                        onclick="single_govementProcurementOragan_presures_select(this)"
                                                                                                        type="checkbox" value="47"
                                                                                                        class="mousetrap"><label
                                                                                                        for="searchConditionBean.govementProcurementOraganBean.prefecture_88"
                                                                                                        class="table-check">沖縄県</label>
                                                                                                </li>
                                                                                                <input type="hidden"
                                                                                                       name="_searchConditionBean.govementProcurementOraganBean.prefecture_8"
                                                                                                       value="on" class="mousetrap">
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
                                                            class="button-orange button-large" data-dismiss="modal" style="border: none; background: none; padding: 0;">
                                                        <img src="./img/button_04.jpg" alt="株式会社日本スマートマーケティング">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Scrolling Modal-->
                                    <div class="modal fade" id="modal_04" tabindex="-1" role="dialog" aria-labelledby="select_type" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 style="margin-top: 15px;">調達品目分類を選択する</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="main-modal modal-type-04">
                                                        <div class="main-modal-inner" style="width: 100%" tabindex="2600">
                                                            <div class="modal-contents" id="select-control">
                                                                <p>
                                                                    [&nbsp; <a class="table-check-all" tabindex="2620">全選択</a>
                                                                    &nbsp;|&nbsp; <a class="table-check-remove" tabindex="2630">選択解除</a>
                                                                    &nbsp;]
                                                                </p>
                                                                <div class="table-checks modal-Items">
                                                                    <div style="padding: 0px; border-bottom: none;">
                                                                        <div
                                                                            id="tri_WAA0101FM01/searchConditionBean/itemClassifcationBean/itemClassifcation">
                                                                            <div
                                                                                style="border-collapse: collapse; width: 100%; margin-left: 30px; border: 0px solid;"
                                                                                id="td_itemClassifcation">
                                                                                <ul class="johoProcurementOrganLayout row">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation1"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="001"
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
                                                                                        tabindex="2640" type="checkbox" value="002"
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
                                                                                        tabindex="2640" type="checkbox" value="003"
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
                                                                                        tabindex="2640" type="checkbox" value="004"
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
                                                                                        tabindex="2640" type="checkbox" value="005"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation5"
                                                                                        class="table-check">005.人造樹脂、ゴム、皮革、毛皮及びこれらの製品</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation6"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="006"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation6"
                                                                                        class="table-check">006.木材及びその製品、製紙用原料並びに紙製品</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation7"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="007"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation7"
                                                                                        class="table-check">007.かばん類並びに紡織用繊維及びその製品</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation8"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="008"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation8"
                                                                                        class="table-check">008.石、セメント他これらに類する材料の製品、陶磁器製品、ガラス及びその製品</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation9"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="009"
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
                                                                                        tabindex="2640" type="checkbox" value="010"
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
                                                                                        tabindex="2640" type="checkbox" value="011"
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
                                                                                        tabindex="2640" type="checkbox" value="012"
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
                                                                                        tabindex="2640" type="checkbox" value="013"
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
                                                                                        tabindex="2640" type="checkbox" value="014"
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
                                                                                        tabindex="2640" type="checkbox" value="015"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation15"
                                                                                        class="table-check">015.電気通信用機器及び音声録音再生機器</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation16"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="016"
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
                                                                                        tabindex="2640" type="checkbox" value="017"
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
                                                                                        tabindex="2640" type="checkbox" value="018"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation18"
                                                                                        class="table-check">018.鉄道用車両及びその付属装置</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation19"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="019"
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
                                                                                        tabindex="2640" type="checkbox" value="020"
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
                                                                                        tabindex="2640" type="checkbox" value="021"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation21"
                                                                                        class="table-check">021.衛生用品、暖房器具及び照明器具</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation22"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="022"
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
                                                                                        tabindex="2640" type="checkbox" value="023"
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
                                                                                        tabindex="2640" type="checkbox" value="024"
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
                                                                                        tabindex="2640" type="checkbox" value="025"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation25"
                                                                                        class="table-check">025.写真用機器、光学用品及び時計</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation26"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="026"
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
                                                                                        tabindex="2640" type="checkbox" value="027"
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
                                                                                        tabindex="2640" type="checkbox" value="028"
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
                                                                                        tabindex="2640" type="checkbox" value="029"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation29"
                                                                                        class="table-check">029.電気通信機器に係るサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation30"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="030"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation30"
                                                                                        class="table-check">030.電気通信分野のその他のサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation31"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="031"
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
                                                                                        tabindex="2640" type="checkbox" value="032"
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
                                                                                        tabindex="2640" type="checkbox" value="033"
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
                                                                                        tabindex="2640" type="checkbox" value="034"
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
                                                                                        tabindex="2640" type="checkbox" value="041"
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
                                                                                        tabindex="2640" type="checkbox" value="042"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation36"
                                                                                        class="table-check">042.建設のためのサービス、エンジニアリング・サービスその他の技術的サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation37"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="051"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation37"
                                                                                        class="table-check">051.自動車の保守及び修理サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation38"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="052"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation38"
                                                                                        class="table-check">052.モーターサイクル、カタピラを有する軽自動車の保守及び修理のサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation39"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="053"
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
                                                                                        tabindex="2640" type="checkbox" value="054"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation40"
                                                                                        class="table-check">054.運転者を伴う海上航行船舶の賃貸サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation41"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="055"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation41"
                                                                                        class="table-check">055.海上航行船舶以外の船舶の賃貸サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation42"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="056"
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
                                                                                        tabindex="2640" type="checkbox" value="057"
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
                                                                                        tabindex="2640" type="checkbox" value="058"
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
                                                                                        tabindex="2640" type="checkbox" value="061"
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
                                                                                        tabindex="2640" type="checkbox" value="062"
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
                                                                                        tabindex="2640" type="checkbox" value="063"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation47"
                                                                                        class="table-check">063.情報及びデータベースのオンラインでの検索</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation48"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="064"
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
                                                                                        tabindex="2640" type="checkbox" value="065"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation49"
                                                                                        class="table-check">065.高度ファクシミリ・サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation50"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="066"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation50"
                                                                                        class="table-check">066.コード及びプロトコルの変換</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation51"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="067"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation51"
                                                                                        class="table-check">067.情報及びデータのオンラインでの処理</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation52"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="071"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation52"
                                                                                        class="table-check">071.電子計算機サービス及び関連のサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation53"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="072"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation53"
                                                                                        class="table-check">072.市場調査及び世論調査のサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation54"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="073"
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
                                                                                        tabindex="2640" type="checkbox" value="074"
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
                                                                                        tabindex="2640" type="checkbox" value="075"
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
                                                                                        tabindex="2640" type="checkbox" value="076"
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
                                                                                        tabindex="2640" type="checkbox" value="077"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation58"
                                                                                        class="table-check">077.金属製品、機械及び機器の修理のサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation59"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="078"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation59"
                                                                                        class="table-check">078.汚水及び廃棄物の処理、衛生その他の環境保護のサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation60"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="079"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation60"
                                                                                        class="table-check">079.個人用品及び家庭用品の修理のサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation61"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="080"
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
                                                                                        tabindex="2640" type="checkbox" value="081"
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
                                                                                        tabindex="2640" type="checkbox" value="082"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation63"
                                                                                        class="table-check">082.農業用機器（運転者を伴わないもの）の賃貸サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation64"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="083"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation64"
                                                                                        class="table-check">083.家具その他家庭用の器具の賃貸サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation65"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="084"
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
                                                                                        tabindex="2640" type="checkbox" value="085"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation66"
                                                                                        class="table-check">085.その他の個人用品又は家庭用の賃貸サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation67"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="086"
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
                                                                                        tabindex="2640" type="checkbox" value="087"
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
                                                                                        tabindex="2640" type="checkbox" value="088"
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
                                                                                        tabindex="2640" type="checkbox" value="089"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation70"
                                                                                        class="table-check">089.林業及び木材伐出業に付随するサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation71"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="090"
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
                                                                                        tabindex="2640" type="checkbox" value="091"
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
                                                                                        tabindex="2640" type="checkbox" value="092"
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
                                                                                        tabindex="2640" type="checkbox" value="093"
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
                                                                                        tabindex="2640" type="checkbox" value="094"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation75"
                                                                                        class="table-check">094.映画及びビデオテープの制作及び配給のサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation76"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="101"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation76"
                                                                                        class="table-check">101.電気通信に関連するサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation77"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="102"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation77"
                                                                                        class="table-check">102.保険(再保険を含む。)及び年金基金サービス（強制加入の社会保険サービスを除く。）</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation78"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="111"
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
                                                                                        tabindex="2640" type="checkbox" value="112"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation79"
                                                                                        class="table-check">112.事務補助従事者その他の労働者あっせんサービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation80"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="113"
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
                                                                                        tabindex="2640" type="checkbox" value="114"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation81"
                                                                                        class="table-check">114.その他の商業又は工業労働者提供サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation82"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="115"
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
                                                                                        tabindex="2640" type="checkbox" value="116"
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
                                                                                        tabindex="2640" type="checkbox" value="121"
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
                                                                                        tabindex="2640" type="checkbox" value="122"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation85"
                                                                                        class="table-check">122.広告及び関連する写真サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation86"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="123"
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
                                                                                        tabindex="2640" type="checkbox" value="124"
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
                                                                                        tabindex="2640" type="checkbox" value="125"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation88"
                                                                                        class="table-check">125.映像加工サービス（映画及びテレビ産業に関連しないもの）</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation89"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="126"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation89"
                                                                                        class="table-check">126.写真の修復、複写及び修正サービス）</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation90"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="127"
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
                                                                                        tabindex="2640" type="checkbox" value="131"
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
                                                                                        tabindex="2640" type="checkbox" value="132"
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
                                                                                        tabindex="2640" type="checkbox" value="133"
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
                                                                                        tabindex="2640" type="checkbox" value="134"
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
                                                                                        tabindex="2640" type="checkbox" value="135"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.itemClassifcationBean.itemClassifcation95"
                                                                                        class="table-check">135.郵送リスト作成及び郵送サービス</label><input
                                                                                        type="hidden"
                                                                                        name="_searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        value="on" class="mousetrap">

                                                                                    <input
                                                                                        id="searchConditionBean.itemClassifcationBean.itemClassifcation96"
                                                                                        name="searchConditionBean.itemClassifcationBean.itemClassifcation"
                                                                                        tabindex="2640" type="checkbox" value="136"
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
                                                            class="button-orange button-large" data-dismiss="modal" style="border: none; background: none; padding: 0;">
                                                        <img src="./img/button_04.jpg" alt="株式会社日本スマートマーケティング">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-modal modal-type-03" style="display: none;">
                                        <div class="main-modal-bg" style="height: 937px; width: 1480px;"></div>
                                        <div class="main-modal-inner" style="width: 1000px" tabindex="2500">
                                            <a class="main-modal-close"> <img
                                                    src="/pps-web-biz/resources/app/image/common/btn_modal_close.png"
                                                    alt="モーダルを閉じる"
                                                    tabindex="2510">
                                            </a>
                                            <div class="modal-contents" id="select-control">
                                                <h3 style="margin-top: 15px;">調達機関（地方公共団体）を選択する</h3>
                                                <dl class="table-form" style="float: left;">
                                                    <dd>
                                                        <p>
                                                            [&nbsp; <a class="table-check-all" tabindex="2520">全選択</a>
                                                            &nbsp;|&nbsp; <a class="table-check-remove" tabindex="2530">選択解除</a>
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
                                                                                        type="checkbox" value="01"
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
                                                                                        type="checkbox" value="02"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOrgBean.prefecture_21"
                                                                                        class="table-check">青森県</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOrgBean.prefecture_22"
                                                                                        name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                        onclick="single_presures_select(this)"
                                                                                        type="checkbox" value="03"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOrgBean.prefecture_22"
                                                                                        class="table-check">岩手県</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOrgBean.prefecture_23"
                                                                                        name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                        onclick="single_presures_select(this)"
                                                                                        type="checkbox" value="04"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOrgBean.prefecture_23"
                                                                                        class="table-check">宮城県</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOrgBean.prefecture_24"
                                                                                        name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                        onclick="single_presures_select(this)"
                                                                                        type="checkbox" value="05"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOrgBean.prefecture_24"
                                                                                        class="table-check">秋田県</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOrgBean.prefecture_25"
                                                                                        name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                        onclick="single_presures_select(this)"
                                                                                        type="checkbox" value="06"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOrgBean.prefecture_25"
                                                                                        class="table-check">山形県</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOrgBean.prefecture_26"
                                                                                        name="searchConditionBean.govementProcurementOrgBean.prefecture_2"
                                                                                        onclick="single_presures_select(this)"
                                                                                        type="checkbox" value="07"
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
                                                                                        type="checkbox" value="08"
                                                                                        class="mousetrap"><label
                                                                                        for="searchConditionBean.govementProcurementOrgBean.prefecture_31"
                                                                                        class="table-check">茨城県</label>
                                                                                </li>
                                                                                <li><input
                                                                                        id="searchConditionBean.govementProcurementOrgBean.prefecture_32"
                                                                                        name="searchConditionBean.govementProcurementOrgBean.prefecture_3"
                                                                                        onclick="single_presures_select(this)"
                                                                                        type="checkbox" value="09"
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

                                    <!-- /検索前の基本形 -->
                                </div>
                            </div>

                        </div>

                    {{--                        <div class="ta-r">--}}
                    {{--                            <div class="main-item-submit submit-large">--}}
                    {{--                                <input class="button-orange main-item-button button-large nodisabled mousetrap"--}}
                    {{--                                       tabindex="3000"--}}
                    {{--                                       id="OAA0102" name="OAA0102" type="submit" value="検索">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}


                    <!--/メイン 検索結果 -->


                        <div>
                            <input type="hidden" name="_csrf" value="7ff7727a-5367-46d3-8665-6f54b588357a"
                                   class="mousetrap">
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
    <script src="{{asset('js/UAA01.js')}}"></script>

@endsection
