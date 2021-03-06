@extends('front-end.layouts.master')
@section('content')
    <?php use \App\Http\Controllers\HomeController; ?>
    <div id="preloader"></div>

    <div id="wrapper">
        <div id="overlay-1">
            <section id="navigation-scroll">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar-example">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-bars"></i>
                            </button>

                            <img style="float: left;padding-right: 5px;" height="50" width="50"
                                 src="front-end/img/greek-capital.png"
                                 alt="Greek Capital"/>
                            <a class="navbar-brand" href="#">
                                Greek Capital
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-example">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#about" class="active">{{ trans('header.about') }}</a></li>
                                <li><a href="#Meet">{{ trans('header.our_team') }}</a></li>
                                <li><a href="#ScreenShot">Screen</a></li>
                                <li><a href="#product">{{ trans('header.product') }}</a></li>
                                <li><a href="#faqs">FAQs</a></li>
                                <li><a href="#contact">Contact</a></li>
                                @if ( Config::get('app.locale') == 'en')
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true" aria-expanded="false">English<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('home')}}">English</a></li>
                                            <li><a href="{{URL::asset('')}}vi">Tiếng Việt</a></li>
                                        </ul>
                                    </li>
                                @elseif ( Config::get('app.locale') == 'vi' )
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true" aria-expanded="false">Tiếng Việt<span
                                                    class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{URL::asset('')}}">English</a></li>
                                            <li><a href="{{route('home')}}">Tiếng Việt</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>    <!-- navbar -->
            </section>    <!-- #navigation -->

            <section id="particles">
                <div id="intro">
                    <div class="text-center starting-text wow animated zoomInDown">
                        <h2>Welcome to Investment Securities</h2>
                        <h1 class="rene">Greek Capital</h1>
                        <p><a href="#about" class="btn btn-primary btn-lg" href="#" role="button">Download</a></p>
                    </div>
                </div>
            </section>
            <div id="bottom" class="bottom text-center">
                <a href="#about"><i class="ion-ios7-arrow-down"></i></a>
            </div>
        </div><!-- overlay-1 -->
    </div>    <!-- wrapper -->

    <!-- About Us -->
    <section id="about">
        <div class="container">
            <div class="row text-center heading">
                <div class="wow animated zoomInDown heading-text">
                    <h3>About Us</h3>
                    <hr class="full">
                    <br/>
                </div>
            </div>    <!-- row -->
            <div class="row about-us-text">
                <div class="col-md-12">
                    <p class="text-center">Đây là 1 công ty rất nhiều tiềm năng phát triển.Greek Capital </p>
                </div>
            </div>    <!-- row -->
        </div>    <!-- container -->
    </section>    <!-- about us -->

    <!-- Greek Capital -->
    <section id="greek_capital">
        <div class="container">
            <div class="row text-center heading">
                <div class="wow animated zoomInDown heading-text">
                    <h3>{{trans('header.greek_capital')}}</h3>
                </div>
            </div>
            <div class="main_content">
                <div class="services">
                    <div class="row">
                        @foreach($gcapital as $gcap)
                            @if ( Config::get('app.locale') == 'en')
                                @if($gcap->locale == 'en')
                                    <div class="col-md-3 col-sm-6">
                                        <div class="service">
                                            <img width="200px" height="150px" src="{!! $gcap->image !!}" alt="service1">
                                            <div class="text-center">
                                                <h4>{!! $gcap->title !!}</h4>
                                                {!! $gcap->content !!}
                                            </div> <!-- .text-center -->
                                        </div> <!-- .service -->
                                    </div> <!-- .col-md-3 -->
                                @endif
                            @elseif ( Config::get('app.locale') == 'vi' )
                                @if($gcap->locale == 'vi')
                                    <div class="col-md-3 col-sm-6">
                                        <div class="service">
                                            <img width="200px" height="150px" src="{!! $gcap->image !!}" alt="service1">
                                            <div class="text-center">
                                                <h4>{!! $gcap->title !!}</h4>
                                                {!! $gcap->content !!}
                                            </div> <!-- .text-center -->
                                        </div> <!-- .service -->
                                    </div> <!-- .col-md-3 -->
                                @endif
                            @endif
                        @endforeach
                    </div>    <!-- row -->
                </div>    <!-- services -->
            </div>    <!-- main_content -->
        </div>    <!-- container -->
    </section>    <!-- Greek Capital -->

    <!-- Meet With Us -->
    <section id="Meet">
        <div class="container">
            <div class="row text-center heading">
                <div class="wow animated zoomInDown heading-text">
                    <h3>{{ trans('header.our_team') }}</h3>
                    <hr class="full">
                </div>    <!-- row -->
            </div> <!-- #heading-text -->
        </div>
        <div class="main_content">
            <div class="container">
                <div class="row">
                    @foreach($employee as $emp)
                        @if ( Config::get('app.locale') == 'en')
                            @if($emp->locale == 'en')
                                <div class="col-md-3 col-sm-6">
                                    <div class="meet-item">
                                        <img width="300px" height="200px" src="{{ $emp->image }}" alt="meet1">
                                        <div class="text-center">
                                            <h4>{!! $emp->name !!}</h4>
                                            <p>{!! $emp->positon !!}</p>
                                            {!! $emp->info !!}
                                        </div> <!-- .text-center -->
                                    </div> <!-- .meet-item -->
                                </div> <!-- .col-md-3 -->
                            @endif
                        @elseif ( Config::get('app.locale') == 'vi' )
                            @if($emp->locale == 'vi')
                                <div class="col-md-3 col-sm-6">
                                    <div class="meet-item">
                                        <img width="200px" height="200px" src="{{ $emp->image }}" alt="meet1">
                                        <div class="text-center">
                                            <h4>{!! $emp->name !!}</h4>
                                            <p>{!! $emp->positon !!}</p>
                                            {!! $emp->info !!}
                                        </div> <!-- .text-center -->
                                    </div> <!-- .meet-item -->
                                </div> <!-- .col-md-3 -->
                            @endif
                        @endif
                    @endforeach
                </div>    <!-- row -->
            </div>    <!-- .container -->
        </div>    <!-- main_content -->
        <!--</div>	 container -->
    </section>    <!-- Meet -->


    <section id="ScreenShot">
        <div class="container">
            <div class="row text-center heading">
                <div class="wow animated zoomInDown heading-text">
                    <h3>Screen Shots</h3>
                    <hr class="full">
                </div> <!-- #heading-text -->
            </div>
            <div class="main_content">
                <div class="container">

                    <div class="col-xs-12">
                        <div id="screenshots-wrap" class="owl-carousel owl-theme">
                            <a href="front-end/img/screenShoot1.png" class="item" data-lightbox-gallery="screenshots">
                                <img src="front-end/img/screenShoot1.png" class="img_res wow animated zoomIn" alt="">
                            </a>

                            <a href="front-end/img/screenShoot2.png" class="item" data-lightbox-gallery="screenshots">
                                <img src="front-end/img/screenShoot2.png" class="img_res wow animated zoomIn" alt="">
                            </a>
                            <a href="front-end/img/screenShoot3.png" class="item" data-lightbox-gallery="screenshots">
                                <img src="front-end/img/screenShoot3.png" class="img_res wow animated zoomIn" alt="">
                            </a>

                            <a href="front-end/img/screenShoot4.png" class="item" data-lightbox-gallery="screenshots">
                                <img src="front-end/img/screenShoot4.png" class="img_res wow animated zoomIn" alt="">
                            </a>
                            <a href="front-end/img/screenShoot1.png" class="item" data-lightbox-gallery="screenshots">
                                <img src="front-end/img/screenShoot1.png" class="img_res wow animated zoomIn" alt="">
                            </a>

                            <a href="front-end/img/screenShoot2.png" class="item" data-lightbox-gallery="screenshots">
                                <img src="front-end/img/screenShoot2.png" class="img_res wow animated zoomIn" alt="">
                            </a>
                            <a href="front-end/img/screenShoot3.png" class="item" data-lightbox-gallery="screenshots">
                                <img src="front-end/img/screenShoot3.png" class="img_res wow animated zoomIn" alt="">
                            </a>

                            <a href="front-end/img/screenShoot4.png" class="item" data-lightbox-gallery="screenshots">
                                <img src="front-end/img/screenShoot4.png" class="img_res wow animated zoomIn" alt="">
                            </a>

                        </div>
                    </div>

                </div>    <!-- row -->
            </div>    <!-- .container -->
        </div>    <!-- main_content -->
        <!--</div>	 container -->
    </section>    <!-- #ScreenShot -->


    <!-- Download now -->
    <section id="product">
        <div class="container">
            <div class="row text-center heading">
                <div class="wow animated zoomInDown heading-text">
                    <h3>{{ trans('header.product') }}</h3>
                    <hr class="full">
                </div> <!-- #heading-text -->
            </div>
            <div class="main-match">
                <h3 style="text-align: center;">Gói Sản Phẩm Tháng 12 năm 2017</h3>
                <table class="table table-customize table-responsive">
                    <thead>
                    <tr>
                        <th rowspan="2">{{ trans('content.investment') }}</th>
                        <th rowspan="2">{{ trans('content.product') }}</th>
                        <th rowspan="2">{{ trans('content.interest_rate') }}</th>
                        <th colspan="2">{{ trans('content.interest_out') }}</th>
                    </tr>
                    <tr>
                        <th>{{ trans('content.investors') }}</th>
                        <th>{{ trans('content.funds') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_cat as $cat)
                        @if($cat->exception == 0)
                            @if ( Config::get('app.locale') == 'en')
                                @if($cat->locale == 'en')
                                    <tr>
                                        <td data-title="Mức đầu tư" class="category"
                                            rowspan="{!! \App\Http\Controllers\HomeController::countProduct($cat->id); !!}">{{$cat->name}}</td>
                                    </tr>
                                @endif
                            @elseif ( Config::get('app.locale') == 'vi' )
                                @if($cat->locale == 'vi')
                                    <tr>
                                        <td data-title="Mức đầu tư" class="category"
                                            rowspan="{!! \App\Http\Controllers\HomeController::countProduct($cat->id); !!}">{{$cat->name}}</td>
                                    </tr>
                                @endif
                            @endif
                            <?php $proById = HomeController::getProductByCatID($cat->id); ?>
                            @foreach($proById as $pro)
                                @if ( Config::get('app.locale') == 'en')
                                    @if($pro->locale == 'en')
                                        <tr>
                                            <td data-title="Sản phẩm" class="product">{{ $pro->name }}</td>
                                            <td data-title="Quỹ đảm bảo lãi xuất năm" class="interest">
                                                @if(is_numeric($pro->interest_rate))
                                                    {{ $pro->interest_rate }} %
                                                @else
                                                    {{ $pro->interest_rate }}
                                                @endif
                                            </td>
                                            <td data-title="Dành cho NĐT" class="investors">
                                                {{ $pro->investors }} %
                                            </td>
                                            <td data-title="Dành cho quỹ" class="funds">
                                                {{ $pro->funds }} %
                                            </td>
                                        </tr>
                                    @endif
                                @elseif ( Config::get('app.locale') == 'vi' )
                                    @if($pro->locale == 'vi')
                                        <tr>
                                            <td data-title="Sản phẩm" class="product">{{ $pro->name }}</td>
                                            <td data-title="Quỹ đảm bảo lãi xuất năm" class="interest">
                                                @if(is_numeric($pro->interest_rate))
                                                    {{ $pro->interest_rate }} %
                                                @else
                                                    {{ $pro->interest_rate }}
                                                @endif
                                            </td>
                                            <td data-title="Dành cho NĐT" class="investors">
                                                {{ $pro->investors }} %
                                            </td>
                                            <td data-title="Dành cho quỹ" class="funds">
                                                {{ $pro->funds }} %
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        @elseif($cat->exception == 1)
                            @if ( Config::get('app.locale') == 'en')
                                @if($cat->locale == 'en')
                                    <tr bgcolor="#83efb8">
                                        <td>{{ $cat->name }}</td>
                                        <td colspan="4" data-title="Lựa chọn" class="option">
                                            AGREE
                                        </td>
                                    </tr>
                                @elseif ( Config::get('app.locale') == 'vi' )
                                    @if($pro->locale == 'vi')
                                        <tr bgcolor="#83efb8">
                                            <td>{{ $cat->name }}</td>
                                            <td colspan="4" data-title="Lựa chọn" class="option">
                                                THỎA THUẬN
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endforeach
                    <tr>
                        <td colspan="5" data-title="Lựa chọn" class="option">
                            <a href="{{route('product')}}">
                                <button class="btn btn-danger"
                                        style="border-radius: 4px;padding: 10px 16px;margin-right: 15px;">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    {{ trans('content.buy') }}
                                </button>
                            </a>
                            <a href="#contact">
                                <button class="btn btn-success" style="border-radius: 4px;padding: 10px 16px;">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    {{ trans('content.btn_contact') }}
                                </button>
                            </a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- </div>	container -->
    </section>    <!-- Product -->
    <!--FAQs
====================================== -->
    <section class="faq-accordion" id="faqs">
        <div class="container">
            <div class="row text-center heading">
                <div class="wow animated zoomInDown heading-text">
                    <h3>{{ trans('content.faqs') }}</h3>
                    <hr class="full">
                </div> <!-- #heading-text -->
            </div>
            <div class="row">
                <div class="col-sm-6">
                    @foreach($quest_answer as $faqs)
                        @if ( Config::get('app.locale') == 'en')
                            @if($faqs->locale == 'en')
                                @if($faqs->id % 2 != 0)
                                    <div class="panel-group" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading-{{$faqs->id}}">
                                                <h4 class="panel-title">
                                                    <a id="faqs_{{$faqs->id}}" class="collapsed" data-toggle="collapse"
                                                       data-parent="#accordion-1"
                                                       href="#collapseOne" aria-expanded="false"
                                                       aria-controls="collapseOne">
                                                        {!! $faqs->quest !!}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="answer_{{$faqs->id}}" class="panel-collapse collapse"
                                                 role="tabpanel"
                                                 aria-labelledby="headingOne" aria-expanded="false">
                                                <div class="panel-body">
                                                    {!! $faqs->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @elseif ( Config::get('app.locale') == 'vi' )
                            @if($faqs->locale == 'vi')
                                @if($faqs->id % 2 != 0)
                                    <div class="panel-group" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading-{{$faqs->id}}">
                                                <h4 class="panel-title">
                                                    <a id="faqs_{{$faqs->id}}" class="collapsed"
                                                       data-toggle="collapse"
                                                       data-parent="#accordion-1"
                                                       href="#collapseOne" aria-expanded="false"
                                                       aria-controls="collapseOne">
                                                        {!! $faqs->quest !!}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="answer_{{$faqs->id}}" class="panel-collapse collapse"
                                                 role="tabpanel"
                                                 aria-labelledby="headingOne" aria-expanded="false">
                                                <div class="panel-body">
                                                    {!! $faqs->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="col-sm-6">
                    @foreach($quest_answer as $faqs)
                        @if ( Config::get('app.locale') == 'en')
                            @if($faqs->locale == 'en')
                                @if($faqs->id % 2 == 0)
                                    <div class="panel-group" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading-{{$faqs->id}}">
                                                <h4 class="panel-title">
                                                    <a id="faqs_{{$faqs->id}}" class="collapsed" data-toggle="collapse"
                                                       data-parent="#accordion-1"
                                                       href="#collapseOne" aria-expanded="false"
                                                       aria-controls="collapseOne">
                                                        {!! $faqs->quest !!}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="answer_{{$faqs->id}}" class="panel-collapse collapse"
                                                 role="tabpanel"
                                                 aria-labelledby="headingOne" aria-expanded="false">
                                                <div class="panel-body">
                                                    {!! $faqs->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @elseif ( Config::get('app.locale') == 'vi' )
                            @if($faqs->locale == 'vi')
                                @if($faqs->id % 2 == 0)
                                    <div class="panel-group" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading-{{$faqs->id}}">
                                                <h4 class="panel-title">
                                                    <a id="faqs_{{$faqs->id}}" class="collapsed"
                                                       data-toggle="collapse"
                                                       data-parent="#accordion-1"
                                                       href="#collapseOne" aria-expanded="false"
                                                       aria-controls="collapseOne">
                                                        {!! $faqs->quest !!}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="answer_{{$faqs->id}}" class="panel-collapse collapse"
                                                 role="tabpanel"
                                                 aria-labelledby="headingOne" aria-expanded="false">
                                                <div class="panel-body">
                                                    {!! $faqs->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @foreach($quest_answer as $faqs)
        <script>
            $(document).ready(function () {
                $("#faqs_{{$faqs->id}}").on("click", function () {
                    if ($("#answer_{{$faqs->id}}").css('display') == 'none') {
                        $("#answer_{{$faqs->id}}").show();
                    } else {
                        $("#answer_{{$faqs->id}}").hide();
                    }
                });
            });
        </script>
    @endforeach
    <!-- end faqs -->
    <!-- end section.faq-accordion -->
    <section id="contact">
        <div class="row text-center heading">
            <div class="wow animated zoomInDown heading-text">
                <h3>{{ trans('content.btn_contact') }}</h3>
                <hr class="full">
            </div> <!-- #heading-text -->
        </div>
        <div class="container">
            <div class="col-sm-6">
                <div class="contact-box">
                    <div class="row">
                        <div class="bg-image">
                            <div class="col-md-12 share-text wow animated zoomInDown">
                                <p class="heading" style="font-size: 22px;">
                                    {{ trans('content.contact') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{ route('form.contact') }}" class="">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form">
                                    <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-user fa-fw"></i>
	  								</span>
                                        <input class="form-control" name="name" type="text" placeholder="Name" required>
                                    </div>
                                    <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-envelope-o fa-fw"></i>
	  								</span>
                                        <input class="form-control" name="email" type="email"
                                               placeholder="Email address"
                                               required>
                                    </div>
                                    <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-phone-square fa-fw"></i>
	  								</span>
                                        <input class="form-control" name="telephone" type="text"
                                               placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form">
                                    <div class="input-group margin-bottom-sm">
									<span class="input-group-addon">
										<i class="fa fa-comment-o fa-fw"></i>
									</span>
                                        <input type="text" name="message" class="form-control message"
                                               placeholder="Your Message">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-sub" type="submit" value="Send Message">
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="contact-box">
                    <img src="{{asset('front-end/img/location-icon.png')}}" alt="location icon" class="wow zoomIn">
                    <p>18th Floor, Handico Building, Pham Hung, Hanoi, Vietnam
                        <br> Time: 8h00am - 8h00pm (GMT+7)
                        <br>
                        <br>+84 966 607 094
                        <br>+84 999 365 8872
                    </p>
                </div>
            </div>
        </div>
        <!--  // end .row -->
        </div>
    </section>
@endsection