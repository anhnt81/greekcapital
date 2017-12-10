<div id="preloader"></div>


<div id="wrapper">
    <div id="overlay-1">
        <section id="navigation-scroll">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-example">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="#">Rain</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-example">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about" class="active">{{ trans('header.about') }}</a></li>
                            <li><a href="#Meet">{{ trans('header.our_team') }}</a></li>
                            <li><a href="#product">{{ trans('header.product') }}</a></li>
                            <li><a href="#ScreenShot">Screen</a></li>
                            <li><a href="#testimonial">Testimonials</a></li>
                            <li><a href="#download">Download</a></li>
                            <!-- <li><a href="#price_table">Price Table</a></li> -->
                            <li><a href="#contact">Contact</a></li>
                            @if ( Config::get('app.locale') == 'en')
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">English<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('home')}}">English</a></li>
                                        <li><a href="{{URL::asset('')}}vi">Tiếng Việt</a></li>
                                    </ul>
                                </li>
                            @elseif ( Config::get('app.locale') == 'vi' )
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiếng Việt<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{URL::asset('')}}">English</a></li>
                                        <li><a href="{{route('home')}}">Tiếng Việt</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>	<!-- navbar -->
        </section>	<!-- #navigation -->

        <section id="particles">
            <div id="intro">
                    <div class="text-center starting-text wow animated zoomInDown">
                        <h2>Welcome to A-Z Application Service</h2>
                        <h1 class="rene">Greek Capital</h1>
                        <a href="#" class="bttn apple-store btn btn-lg">
                            <img src="front-end/img/apple.png" alt="apple">
                            <p>DOWNLOAD FROM</p>
                            <h6>APPLE STORE</h6>
                        </a>
                        <a href="#" class="bttn google-play btn btn-lg">
                            <img src="front-end/img/play.png" alt="play">
                            <p>DOWNLOAD FROM</p>
                            <h6>GOOGLE PLAY</h6>
                        </a>
                    </div>
            </div>
        </section>
        <div id="bottom" class="bottom text-center">
            <a href="#about"><i class="ion-ios7-arrow-down"></i></a>
        </div>
    </div><!-- overlay-1 -->
</div>	<!-- wrapper -->
