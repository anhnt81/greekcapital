<!--==========================
  Header
  ============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <a href="#hero"><img height="50px" width="200px" src="{{ URL::asset('image/test.png') }}" alt="" title="" /></a>
            <!-- Uncomment below if you prefer to use a text logo -->
            <!--<h1><a href="#hero">Regna</a></h1>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#about">{{ trans('header.about') }}</a></li>
                <li><a href="#services">{{ trans('header.road_map') }}</a></li>
                <li><a href="#team">{{ trans('header.our_team') }}</a></li>
                <li><a href="#contact">{{ trans('header.contact') }}</a></li>
                <li class="menu-has-children active">
                    @if ( Config::get('app.locale') == 'vi')
                        <a href="{{route('home')}}">Tiếng Việt</a>
                        <ul>
                            <li><a href="{{URL::asset('')}}en">English</a></li>
                        </ul>
                    @elseif ( Config::get('app.locale') == 'en' )
                        <a href="{{URL::asset('')}}en">English</a>
                        <ul>
                            <li><a href="{{route('home')}}">Tiếng Việt</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

