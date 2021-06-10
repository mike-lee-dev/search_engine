<table id="user-datatables" class="display table table-striped table-hover" >
    <thead>
    <tr>
        <th>会社名</th>
        <th>ユーザー名</th>
        <th>住所</th>
        <th>メールアドレス</th>
        <th></th>
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
            <td>{{$user->company_name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->email}}</td>
            <td>
                <div class="form-button-action">
                    <a href="{{route('user-profile', $user->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('delete', $user->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg" data-original-title="Remove">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
