<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="custom" custom-color="#819e33">

{{--        <a href="index.html" class="logo">--}}
{{--            <img src="{{asset('img/logo.png')}}" alt="navbar brand" class="navbar-brand">--}}
{{--        </a>--}}
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="custom" custom-color="#819e33">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{asset('img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="{{asset('img/profile.jpg')}}" alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>{{$user->username}}</h4>
                                        <p class="text-muted">{{$user->email}}</p>
                                        <button class="btn btn-xs btn-secondary btn-sm" data-toggle="modal" data-target="#profileModal">プロファイル</button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('/logout')}}">ログアウト</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
