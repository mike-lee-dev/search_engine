@extends('layouts/app')

@section('css')

    <style>
        th {
            width: 150px !important;
            padding: 20px !important;
        }
        @media screen and (max-width: 640px){
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


                            <tbody><tr>
                                <th>調達案件番号</th>



                                <td colspan="5">0000000000000043534</td>


                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementCla">
                                <th>調達種別</th>



                                <td colspan="5">一般競争入札の入札公告（WTO対象外）</td>


                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/cla">
                                <th>分類</th>
                                <td colspan="5">物品・役務</td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/articleNm">
                                <th>調達案件名称</th>
                                <td colspan="5">平成28年度中国四国カワウ広域協議会等開催及び中海カワウ管理方針作成支援業務</td>
                            </tr>
                            <tr class="info-date" id="tri_WAB0102FM01/procurementInformationDetailBean/publicStartDate">
                                <th>公開開始日</th>
                                <td colspan="2">

                                    平成28年06月03日
                                </td>
                                <th>公開終了日</th>
                                <td colspan="2">

                                    令和03年06月03日
                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementOrgan">
                                <th>調達機関</th>



                                <td colspan="5">環境省</td>


                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementOraganLocation">
                                <th>調達機関所在地</th>



                                <td colspan="5">岡山県</td>


                            </tr>
                            <tr>
                                <th rowspan="8">調達品目分類</th>
                                <td colspan="5">

                                    -



                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementItemClassification6">
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/publicNoticeContent">
                                <th>公告内容</th>



                                <td colspan="5">入　札　公　告<br><br>次のとおり一般競争入札に付します。<br><br><br>平成28年6月3日<br><br><br>支出負担行為担当官<br>中国四国地方環境事務所<br>総務課長　柳 田　敏 久<br><br><br>１　競争入札に付する事項<br>（１）件　　名　平成28年度中国四国カワウ広域協議会等開催及び中海カワウ管理方針作<br>　　　　　　　　成支援業務<br>（２）仕 様 等　入札説明書による。<br>（３）納入期限　平成29年3月14日<br>（４）納入場所　中国四国地方環境事務所野生生物課<br>（５）入札方法<br>入札金額については、業務に要する一切の費用を含めた額とする。落札決定に当たっては、入札書に記載された金額に当該金額の８％に相当する額を加算した金額（当該金額に１円未満の端数があるときは、その端数金額を切り捨てるものとする。）をもって落札価格とするので、入札者は、消費税に係る課税事業者であるか免税事業者であるかを問わず、見積った契約金額の１０８分の１００に相当する金額を入札書に記載すること。<br><br>２　競争参加資格<br>（１）予算決算及び会計令第７０条の規定に該当しない者であること。なお、未成年者、被保佐人又は被補助人であって、契約締結のために必要な同意を得ている者は、同条中、特別の理由がある場合に該当する。<br>（２）予算決算及び会計令第７１条の規定に該当しない者であること。<br>（３）環境省から指名停止措置が講じられている期間中の者でないこと。<br>（４）平成28・29・30年度環境省競争参加資格（全省庁統一）「役務の提供等」の「調査・研究」において、開札時までに「Ｂ」、「Ｃ」又は「Ｄ」級に格付けされている者であること。<br>（５）業務請負条件を満たした者であること。<br>（６）入札説明書において示す暴力団排除に関する誓約事項に誓約できる者であること。<br><br>３　契約条項を示す場所、入札説明書の交付及び問い合わせ先等<br>（１）契約条項を示す場所及び問い合わせ先<br>〒700-0907　岡山県岡山市北区下石井１丁目４番１号<br>岡山第２合同庁舎１１階<br>中国四国地方環境事務所　総務課会計係　馬場園<br>電話 ： 086-223-1577、ＦＡＸ ： 086-224-2081<br>（２）入札説明書の交付<br>中国四国地方環境事務所サイトの「調達情報」＞「入札公告」より必要な件名を選択し、「入札公告」の下段に入札説明書のファイルが添付されているので、ダウンロードして入手すること。<br>http://chushikoku.env.go.jp/procure/index.html<br>（３）入札説明会の日時及び場所<br>開催しない<br>（４）開札の日時及び場所<br>入札日時：電子調達システムによる場合の締切りは平成28年6月22日（水）10時59分まで。<br>持参による場合の締切りは平成28年6月22日（水）11時00分まで。<br>開札日時：平成28年6月22日（水）11時00分<br>場　　所：中国四国地方環境事務所　会議室<br>　　　　　　　　　（岡山県岡山市北区下石井１丁目４番１号　岡山第２合同庁舎１１階）<br><br>４　電子調達システムの利用<br>本案件は、電子調達システムで行う。なお、電子入札システムによりがたい者は、発注者に申し出た場合に限り紙入札方式に変えることができる。<br>・https://www.geps.go.jp<br><br>５　その他<br>（１）入札及び契約手続きにおいて使用する言語及び通貨<br>日本語及び日本国通貨に限る。<br>（２）入札保証金及び契約保証金　免除<br>（３）入札の無効<br>本公告に示した競争参加資格のない者のした入札及び入札に関する条件に違反した入札は無効とする。<br>（４）契約書作成の要否　要<br>（５）落札者の決定方法<br>予算決算及び会計令第７９条の規定に基づいて作成された予定価格の制限の範囲内で最低価格をもって有効な入札を行った者を落札者とする。ただし、その者と契約を締結することが公正な取引の秩序を乱すこととなるおそれがあって著しく不適当であると認められるときは、予定価格の制限の範囲内の価格をもって入札した他の者のうち最低の価格をもって入札した者を落札者とするときがある。<br>（６）その他　詳細は入札説明書による。<br></td>


                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl1">
                                <th>調達資料１</th>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl2">
                                <th>調達資料２</th>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl3">
                                <th>調達資料３</th>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl4">
                                <th>調達資料４</th>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>
                            <tr id="tri_WAB0102FM01/procurementInformationDetailBean/procurementDocumentDownloadUrl5">
                                <th>調達資料５</th>
                                <td colspan="5">


                                    -



                                </td>
                            </tr>


                            </tbody></table>

                        <a onclick="window.history.back();">
                            <img src="./img/list_button.jpg" alt="株式会社日本スマートマーケティング">
                        </a>
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

@endsection
