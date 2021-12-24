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

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-ttl">
                    <div class="ttl-area">
                        <h2>官公需情報ポータルサイトの等級別検索リンク</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="main-item">
                    <h3>等級別検索リンク</h3><br><br>

                    <div style="border: #808000 solid 1px; font-size: 100%; padding: 15px;">
                        官公需とは、国や独立行政法人、地方公共団体等が、物品を購入する、サービスの提供を受ける、工事を発注することを『官公需』といいます。<br><br>

                        中小企業庁は、民間に調達情報を提供するために、<a href="https://www.kkj.go.jp/s/" target="_blank">官公需情報ポータルサイト</a>を公開しています。

                        しかし、この官公需情報ポータルサイトに用意された等級別検索は、整備されていないため、ヒット件数が実際よりかなり少ない件数となります。<br><br>

                        官公需情報ポータルサイトに用意された等級別指定を行うよりも、多くの調達案件を検索できる等級別検索リンクを、有料会員様のために用意いたしました。<br><br>

                        各等級のリンクをクリックすると、官公需の調達案件が50件毎に表示されます。<br><br>

                        また、官公需の調達案件には、「全省庁統一資格で入札できる案件」と、「全省庁統一資格以外の資格がないと入札できない案件」があります。<br><br>

                        そのため、各等級において、『全省庁統一資格のA等級案件』と『全省庁統一資格以外のA等級案件』というように、２つのリンクを用意してあります。<br><br>

                        リンクをクリックして案件表示後に、キーワード、機関名、地域、公示日またはデータ取得日等を入力して、調達案件を絞り込んでください。
                        <br><br>

                        <div style="background: #f0e68c; border: #808000 solid 2px; font-size: 100%; padding: 20px;">
                            検索結果には、目的とする等級が含まれない調達情報が表示される場合があります。ご了承ください。
                        </div>
                    </div>
                    <br><br>

                    <div style="border: #808000 double 6px; border-radius:15px; font-size: 100%; padding: 15px;">
                        <p><strong>A等級</strong><br><br>
                            全省庁統一資格のA等級案件　→　<a rel="noreferrer noopener"
                                               href="https://www.kkj.go.jp/s/?U=0-all&rc=50&S=(Aまたは OR A又は OR A若しくは OR Aもしくは OR A等級 OR 等級A OR A級 OR B以上 OR C以上 OR D以上 OR Aランク OR A、B) 統一資格"
                                               target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[0]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[0]['formula']}}" style="width: 75%" data-id="1"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                            <br>
                            全省庁統一資格以外のA等級案件　→　<a rel="noreferrer noopener"
                                                 href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=(Aまたは OR A又は OR A若しくは OR Aもしくは OR A等級 OR 等級A OR A級 OR B以上 OR C以上 OR D以上 OR Aランク OR A、B) NOT 統一資格"
                                                 target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[1]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[1]['formula']}}" style="width: 75%" data-id="2"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                        </p>
                    </div>
                    <br><br>

                    <div style="border: #808000 double 6px; border-radius:15px; font-size: 100%; padding: 15px;">
                        <p><strong>B等級</strong><br><br>
                            全省庁統一資格のB等級案件　→　<a rel="noreferrer noopener"
                                               href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=(またはC OR 又はC OR 若しくはC OR もしくはC OR C等級 OR 等級C OR C級 OR C以上 OR Cランク OR B、C OR C、D) 統一資格"
                                               target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[2]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[2]['formula']}}" style="width: 75%" data-id="3"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                            <br>
                            全省庁統一資格以外のB等級案件　→　<a rel="noreferrer noopener"
                                                 href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=(またはC OR 又はC OR 若しくはC OR もしくはC OR C等級 OR 等級C OR C級 OR C以上 OR Cランク OR B、C OR C、D) NOT 統一資格"
                                                 target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[3]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[3]['formula']}}" style="width: 75%" data-id="4"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                        </p>
                    </div>
                    <br><br>


                    <div style="border: #808000 double 6px; border-radius:15px; font-size: 100%; padding: 15px;">
                        <p><strong>C等級</strong><br><br>
                            全省庁統一資格のC等級案件　→　<a rel="noreferrer noopener"
                                               href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=(またはC OR 又はC OR 若しくはC OR もしくはC OR C等級 OR 等級C OR C級 OR C以上 OR Cランク OR B、C OR C、D) 統一資格"
                                               target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[4]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[4]['formula']}}" style="width: 75%" data-id="5"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                            <br>
                            全省庁統一資格以外の?等級案件　→　<a rel="noreferrer noopener"
                                                 href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=(またはC OR 又はC OR 若しくはC OR もしくはC OR C等級 OR 等級C OR C級 OR C以上 OR Cランク OR B、C OR C、D) NOT 統一資格"
                                                 target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[5]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[5]['formula']}}" style="width: 75%" data-id="6"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                        </p>
                    </div>
                    <br><br>


                    <div style="border: #808000 double 6px; border-radius:15px; font-size: 100%; padding: 15px;">
                        <p><strong>D等級</strong><br><br>
                            全省庁統一資格のD等級案件　→　<a rel="noreferrer noopener"
                                               href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=(またはD OR 又はD OR 若しくはD OR もしくはD OR D等級 OR 等級D OR D級 OR D以上 OR Dランク OR C、D) 統一資格"
                                               target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[6]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[6]['formula']}}" style="width: 75%" data-id="7"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                            <br>
                            全省庁統一資格以外のD等級案件　→　<a rel="noreferrer noopener"
                                                 href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=(またはD OR 又はD OR 若しくはD OR もしくはD OR D等級 OR 等級D OR D級 OR D以上 OR Dランク OR C、D) NOT 統一資格"
                                                 target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[7]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[7]['formula']}}" style="width: 75%" data-id="8"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                        </p>
                    </div>
                    <br><br>

                    <div style="border: #808000 double 6px; border-radius:15px; font-size: 100%; padding: 15px;">
                        <p><strong>等級指定なし</strong><br><br>
                            全省庁統一資格の等級指定なし案件　→　<a rel="noreferrer noopener"
                                                  href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=NOT (A OR B OR C OR D) 統一資格"
                                                  target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[8]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[8]['formula']}}" style="width: 75%" data-id="9"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                            <br>
                            全省庁統一資格以外の等級指定なし案件　→　<a rel="noreferrer noopener"
                                                    href="https://www.kkj.go.jp/s/?U=0-all&amp;rc=50&amp;S=NOT (A OR B OR C OR D)NOT 統一資格"
                                                    target="_blank1">５０件ごとに表示</a><br>
                            <a href="{{$formulas[9]['formula']}}" target="_blank1" style="margin: 0 20px">・登録検索式</a><span>URL : </span><input type="text" value="{{$formulas[9]['formula']}}" style="width: 75%" data-id="10"><button class="btn btn-primary register_formula" style="margin-left: 10px;">登録</button>
                        </p>
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
    <script>
        let home_path = $("#home_path").val();
        $('.register_formula').click(function () {
            $t = $(this)
            let token = $("meta[name='_csrf']").attr("content");
            let id = $(this).prev().data('id');
            let formula = $(this).prev().val()
            if(formula !== ""){
                let formData = new FormData();
                formData.append('id', id)
                formData.append('formula', formula)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

                var url = home_path + '/change-formula';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        if (response.status === true) {
                            $t.prev().prev().prev()[0].href = formula;
                            let content = {};
                            content.message = '検索式を変更しました。';
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
            }

        })
    </script>
@endsection
