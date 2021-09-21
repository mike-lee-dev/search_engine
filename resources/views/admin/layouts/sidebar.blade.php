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
                <li class="nav-item {{$tab === 'users' ? 'active' : ''}}">
                    <a href="{{route('users')}}">
                        <i class="fas fa-user-alt"></i>
                        <p>ユーザー管理</p>
                    </a>
                </li>
                <li class="nav-item {{$tab === 'mails' ? 'active submenu' : ''}}">
                    <a data-toggle="collapse" href="#base" aria-expanded="{{$tab === 'mails' ? 'true' : 'false'}}" class="{{$tab === 'mails' ? '' : 'collapsed'}}">
                        <i class="far fa-envelope"></i>
                        <p>メール送信設定</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{$tab === 'mails' ? 'show' : ''}}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{\Request::route()->getName() === 'mails-A' ? 'active' : ''}}">
                                <a href="{{route('mails-A')}}">
                                    <span class="sub-item">A 制限なし</span>
                                </a>
                            </li>
                            <li class="{{\Request::route()->getName() === 'mails-B' ? 'active' : ''}}">
                                <a href="{{route('mails-B')}}">
                                    <span class="sub-item">B 期間制限</span>
                                </a>
                            </li>
                            <li class="{{\Request::route()->getName() === 'mails-C' ? 'active' : ''}}">
                                <a href="{{route('mails-C')}}">
                                    <span class="sub-item">C データ制限</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<style type="text/css">
    .side-menu__item.active, .side-menu__item:hover, .side-menu__item:focus {
        background: #766cc5;
        border-left-color: #766cc5;
        text-decoration: none;
        color: #fff;
    }
    .side-menu__item {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 12px 15px;
        font-size: 1.0em;
        text-transform: uppercase;
        font-weight: 400;
        border-left: 3px solid transparent;
        -webkit-transition: border-left-color 0.3s ease, background-color 0.3s ease;
        -o-transition: border-left-color 0.3s ease, background-color 0.3s ease;
        transition: border-left-color 0.3s ease, background-color 0.3s ease;
        color: #5e7cac;
    }
</style>
<!-- End Sidebar -->
