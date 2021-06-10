<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{$user->username}}
									<span class="user-level">管理者</span>
								</span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{$tab == 'users' ? 'active' : ''}}">
                    <a href="{{route('users')}}">
                        <i class="fas fa-user-alt"></i>
                        <p>ユーザー管理</p>
                    </a>
                </li>
                <li class="nav-item {{$tab == 'mails' ? 'active' : ''}}">
                    <a href="{{route('mails')}}">
                        <i class="far fa-envelope"></i>
                        <p>メール送信設定</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
