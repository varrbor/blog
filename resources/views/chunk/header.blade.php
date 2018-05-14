<body>
    @guest
        <header class="blg-header">
            <div class="blg-header-social">
                <div class="container">
                    <div class="row">
                        @include('modules.header.social_links')

                        <div style="overflow: hidden;">
                            <div>

                                <div class="col-xs-6 col-sm-3 col-lg-3"  style="width: 70%;">
                                    <div class="blg-input-seach">
                                        <input type="seach" placeholder="Search" class="blg-seach-button">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-lg-3">
                                    <div>
                                        <ul>
                                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="blg-menu" id="BlgHederTop">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-lg-4">
                            <a href="{{asset('/')}}" class="blg-logo" title="PCUBE BLOG || HOME PAGE">
                                <img src="{{ asset('img/logo.png') }}" alt="logo">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-lg-8 text-right">
                            <div class="blg-nav-menu">
                                <a href="javascript:void(0)" class="blg-menu-mini visible-xs" id="blgMenu">
                                    <span>Menu</span>
                                    <i class="fa fa-bars"></i>
                                </a>
                                <ul class="list-inline blg-dropdown-menu" id="blgGeneralMenu">
                                    <li>
                                        <button type="button" class="blg-button-sidebar-left" data-toggle="modal" data-target="#modal_sidebar" title="Side Menu">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" title="Home">HOME</a>
                                        <i class="fa fa-angle-down marrow"></i>
                                        <ul class="blg-submenu">
                                            <li><a href="javascript:void(0)" title="Food">Food</a></li>
                                            <li><a href="javascript:void(0)" title="Travelling">Travelling</a></li>
                                            <li><a href="javascript:void(0)" title="Photografer">Photographer</a></li>
                                            <li><a href="javascript:void(0)" title="Legal">Legal</a></li>
                                            <li><a href="javascript:void(0)" title="Personal">Personal</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" title="About">ABOUT</a></li>
                                    <li>
                                    <li>
                                        <a href="javascript:void(0)" title="Blog">BLOG</a>
                                        <i class="fa fa-angle-down marrow"></i>
                                        <ul class="blg-submenu">
                                            <li><a href="javascript:void(0)" title="All Post">All Post</a></li>
                                            <li><a href="javascript:void(0)" title="Classic Style">Classic Style</a>
                                                <i class="fa fa-angle-down sinmenu"></i>
                                                <ul class="blg-submenu-menu">
                                                    <li><a href="javascript:void(0)" title="2 Columns">2 Columns</a></li>
                                                    <li><a href="javascript:void(0)" title="3 Columns">3 Columns</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" title="Portfolio Style">Portfolio Style</a>
                                                <i class="fa fa-angle-down sinmenu"></i>
                                                <ul class="blg-submenu-menu">
                                                    <li><a href="javascript:void(0)" title="2 Columns">2 Columns</a></li>
                                                    <li><a href="javascript:void(0)" title="3 Columns">3 Columns</a></li>
                                                    <li><a href="javascript:void(0)" title="4 Columns">4 Columns</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" title="Contact">CONTACT</a>
                                        <i class="fa fa-angle-down marrow"></i>
                                        <ul class="blg-submenu">
                                            <li><a href="javascript:void(0)" title="Contact 1">Contact 1</a></li>
                                            <li><a href="javascript:void(0)" title="Contact 2">Contact 2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @else
        <header class="blg-header">

            <div class="blg-header-social">
                <div class="container">
                    <div class="row">
                        @include('modules.header.social_links')

                            <div class="col-xs-6 col-sm-3 col-lg-3">
                                <div class="blg-input-seach">
                                    <input type="search" placeholder="Search" class="blg-seach-button">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-3 col-lg-3 login-block" style="float:right;">
                                <li class="nav-item dropdown" style="float: right">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="height: 100px;padding: 10px;">
                                        <a class="dropdown-item" href="profile">
                                            Profile
                                        </a>
                                        <br>
                                        <a class="dropdown-item" href="{{URL::to('posts')}}">
                                            My posts
                                        </a>
                                        <br>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <br>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </div>

                    </div>
                </div>
            </div>

            <div class="blg-menu" id="BlgHederTop">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-lg-4">
                            <a href="{{asset('/')}}" class="blg-logo" title="PCUBE BLOG || HOME PAGE">
                                <img src="{{ asset('img/logo.png') }}" alt="logo">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-lg-8 text-right">
                            <div class="blg-nav-menu">
                                <a href="javascript:void(0)" class="blg-menu-mini visible-xs" id="blgMenu">
                                    <span>Menu</span>
                                    <i class="fa fa-bars"></i>
                                </a>
                                <ul class="list-inline blg-dropdown-menu" id="blgGeneralMenu">
                                    <li>
                                        <button type="button" class="blg-button-sidebar-left" data-toggle="modal" data-target="#modal_sidebar" title="Side Menu">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" title="Home">HOME</a>
                                        <i class="fa fa-angle-down marrow"></i>
                                        <ul class="blg-submenu">
                                            <li><a href="javascript:void(0)" title="Food">Food</a></li>
                                            <li><a href="javascript:void(0)" title="Travelling">Travelling</a></li>
                                            <li><a href="javascript:void(0)" title="Photografer">Photographer</a></li>
                                            <li><a href="javascript:void(0)" title="Legal">Legal</a></li>
                                            <li><a href="javascript:void(0)" title="Personal">Personal</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" title="About">ABOUT</a></li>

                                    <li>
                                        <a href="javascript:void(0)" title="Blog">BLOG</a>
                                        <i class="fa fa-angle-down marrow"></i>
                                        <ul class="blg-submenu">
                                            <li><a href="javascript:void(0)" title="All Post">All Post</a></li>
                                            <li><a href="javascript:void(0)" title="Classic Style">Classic Style</a>
                                                <i class="fa fa-angle-down sinmenu"></i>
                                                <ul class="blg-submenu-menu">
                                                    <li><a href="javascript:void(0)" title="2 Columns">2 Columns</a></li>
                                                    <li><a href="javascript:void(0)" title="3 Columns">3 Columns</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" title="Portfolio Style">Portfolio Style</a>
                                                <i class="fa fa-angle-down sinmenu"></i>
                                                <ul class="blg-submenu-menu">
                                                    <li><a href="javascript:void(0)" title="2 Columns">2 Columns</a></li>
                                                    <li><a href="javascript:void(0)" title="3 Columns">3 Columns</a></li>
                                                    <li><a href="javascript:void(0)" title="4 Columns">4 Columns</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript:void(0)" title="Contact">CONTACT</a>
                                        <i class="fa fa-angle-down marrow"></i>
                                        <ul class="blg-submenu">
                                            <li><a href="javascript:void(0)" title="Contact 1">Contact 1</a></li>
                                            <li><a href="javascript:void(0)" title="Contact 2">Contact 2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      @endguest
</header>