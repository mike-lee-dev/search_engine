@extends('admin.layouts.base')

@section('page-css')
<style>
    #user-datatables_filter{
        display: none;
    }
</style>
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">ユーザー管理</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a>ユーザー一覧</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">ユーザー検索</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="company_name">会社名</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="会社名を入力してください。">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="email">メールアドレス</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="メールアドレス入力">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action text-right py-3">
                        <button class="btn btn-success" id="submit">検索</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" id="table_container">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('page-js')
    <script type="text/javascript">
        var home_path = $("#home_path").val();
        $(document).ready(function () {
            getUsersList();
            $('#submit').click(function () {
                getUsersList();
            })
            function getUsersList() {
                var token = $("meta[name='_csrf']").attr("content");
                var formData = new FormData();

                formData.append('company_name', $('#company_name').val())
                formData.append('email', $('#email').val())
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

                var url = home_path + '/users-table';
                $.ajax({
                    url:url,
                    type:'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#table_container').html(response);
                        $('#user-datatables').DataTable({
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
                            }
                        });
                    },
                    error: function () {
                        return false;
                    }
                });
            }
        });



    </script>

@endsection
