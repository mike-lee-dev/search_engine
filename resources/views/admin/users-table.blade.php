<table id="user-datatables" class="display table table-striped table-hover" >
    <thead>
    <tr>
        <th width="20%" style="width: 20%;">会社名</th>
        <th width="10%" style="width: 10%;">部署名</th>
        <th width="10%" style="width: 10%;">ユーザー名</th>
        <th width="23%" style="width: 25%;">住所</th>
        <th width="15%" style="width: 15%;">メールアドレス</th>
        <th width="10%" style="width: 10%;">登録日</th>
        <th width="7%" style="width: 5% !important;">種類</th>
        <th width="5%" style="width: 5% !important;"></th>
    </tr>
    </thead>
{{--    <tfoot>--}}
{{--    <tr>--}}
{{--        <th>会社名</th>--}}
{{--        <th>ユーザー名</th>--}}
{{--        <th>住所</th>--}}
{{--        <th>メールアドレス</th>--}}
{{--        <th></th>--}}
{{--    </tr>--}}
{{--    </tfoot>--}}
    <tbody>
    @foreach($users as $user)
        <tr>
            <td width="20%">{{$user->company_name}}</td>
            <td width="10%">{{$user->belong}}</td>
            <td width="10%">{{$user->username}}</td>
            <td width="23%">{{$user->address}}</td>
            <td width="15%">{{$user->email}}</td>
            <td width="10%">{{date('Ymd', strtotime($user->created_at))}}</td>
            <td width="7%">{{$user->account_type === 'B' ? 'B ' . date('Y/m/d', strtotime($user->b_date)) : $user->account_type}}</td>
            <td width="5%">
                <div class="form-button-action">
                    <a href="{{route('user-profile', $user->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg px-1" data-original-title="Edit Task">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('delete', $user->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg px-1" data-original-title="Remove">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="my-2">
    <div class="col-12">
        <p class="mb-1">アカウント種類毎のユーザ人数:</p>
    </div>
    <div class="col-12">
        <p>A 制限なし：<span id="a_type">
                @foreach($users_type as $item)
                    @if($item['account_type'] === 'A')
                        {{$item['total']}}
                    @endif
                @endforeach</span>人　/　B 期間制限：<span id="b_type">@foreach($users_type as $item)
                    @if($item['account_type'] === 'B')
                        {{$item['total']}}
                    @endif
                @endforeach</span>人 ／　C データ制限：<span id="c_type">@foreach($users_type as $item)
                    @if($item['account_type'] === 'C')
                        {{$item['total']}}
                    @endif
                @endforeach</span>人 ／　D 無効：<span id="d_type">@foreach($users_type as $item)
                    @if($item['account_type'] === 'D')
                        {{$item['total']}}
                    @endif
                @endforeach</span>人</p>
    </div>
</div>

