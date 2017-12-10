@extends('front-end.layouts.master')
@section('content')
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
                    <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>    <!-- row -->
            <div class="row main_content">
                <div class="col-md-4 col-sm-4 wow animated zoomIn" data-wow-delay="0.1s">
                    <figure>
                        <img class="pro img-responsive center-block" src="front-end/img/3-col-icons-web.png"
                             alt="image">
                    </figure>
                    <h5 class="text-center">RESPONSIVE</h5>
                </div>    <!-- col-md-4 -->

                <div class="col-md-4 col-sm-4 wow animated zoomIn" data-wow-delay="0.1s">
                    <figure>
                        <img class="pro img-responsive center-block" src="front-end/img/3-col-icons-android.png"
                             alt="image">
                    </figure>
                    <h5 class="text-center">ANDROID</h5>
                </div>    <!-- col-md-4 -->

                <div class="col-md-4 col-sm-4 wow animated zoomIn" data-wow-delay="0.1s">
                    <figure>
                        <img class="pro img-responsive center-block" src="front-end/img/3-col-icons-iphone.png"
                             alt="image">
                    </figure>
                    <h5 class="text-center">iOS</h5>
                </div>    <!-- col-md-4 -->
            </div><!-- row main_content -->
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
                        <th rowspan="2">{{ trans('content.option') }}</th>
                    </tr>
                    <tr>
                        <th>{{ trans('content.investors') }}</th>
                        <th>{{ trans('content.funds') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $pro)
                        @if ( Config::get('app.locale') == 'en')
                            @if($pro->locale == 'en')
                                <tr>
                                    <td data-title="Mức đầu tư" class="category">{{ $pro->cat_name }}</td>
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
                                    <td data-title="Lựa chọn" class="option">
                                        <button class="btn btn-danger">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                            {{ trans('content.buy') }}
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @elseif ( Config::get('app.locale') == 'vi' )
                            @if($pro->locale == 'vi')
                                <tr>
                                    <td data-title="Mức đầu tư" class="category">{{ $pro->cat_name }}</td>
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
                                    <td data-title="Lựa chọn" class="option">
                                        <button class="btn btn-danger">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                            {{ trans('content.buy') }}
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- </div>	container -->
    </section>    <!-- Product -->

    <section id="testimonial">
        <div class="container">
            <div class="row text-center heading">
                <div class="bg-image col-md-12">
                    <div class="wow animated zoomInDown heading-text">
                        <h3>Testimonials</h3>
                        <hr class="full">
                        <br/>
                    </div>
                </div>
            </div>
            <div class="row main_content">
                <div class="col-md-10 col-md-offset-1">
                    <div id="client-speech" class="owl-carousel owl-theme">
                        <div class="item">
                            <img class="img-circle img-responsive center-block" src="front-end/img/test1.png"
                                 alt="text">
                            <p class="client-comment text-center">
                                When you form a team, why do you try to form a team? Because teamwork builds trust and
                                trust builds speed.When you form a team, why do you try to form a team? Because teamwork
                                builds trust and trust builds speed.
                            </p>
                            <div class="row text-center">
                                <p class="client-name text-center"> ----- Noona Nuengthida Sophon</p>
                            </div>
                        </div>
                        <div class="item">
                            <img class="img-circle img-responsive center-block" src="front-end/img/test2.png"
                                 alt="text">
                            <p class="client-comment text-center">
                                When you form a team, why do you try to form a team? Because teamwork builds trust and
                                trust builds speed.When you form a team, why do you try to form a team? Because teamwork
                                builds trust and trust builds speed.
                            </p>
                            <div class="row text-center">
                                <p class="client-name text-center"> ----- Noona Nuengthida Sophon</p>
                            </div>
                        </div>
                        <div class="item">
                            <img class="img-circle img-responsive center-block" src="front-end/img/test3.png"
                                 alt="text">
                            <p class="client-comment text-center">
                                When you form a team, why do you try to form a team? Because teamwork builds trust and
                                trust builds speed.When you form a team, why do you try to form a team? Because teamwork
                                builds trust and trust builds speed.
                            </p>
                            <div class="row text-center">
                                <p class="client-name text-center"> ----- Noona Nuengthida Sophon</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- clients -->

    <!-- Price-Table -->
    <section id="price_table">
        <div class="container">
            <div class="row main_content">
                <ul class="price-table-chart">
                    <li class="text-center">
                        <strong>NORMAL</strong>
                        <span class="big">$100</span>
                        <span class="price_table-pay">4 quarterly payments</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> 20 Users</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Unlimited dashboards</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Custom CSS</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> IP Restriction</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Custom domain</span>
                        <br>
                        <a class="btn btn-sub btn-primary" href="#" role="button">GET STARTED NOW</a>
                    </li>

                    <li class="text-center">
                        <strong>PERSONAL</strong>
                        <span class="big">$200</span>
                        <span class="price_table-pay">4 quarterly payments</span>
                        <hr class="full">
                        <span class="price_table-description"><i class="fa fa-check"></i> 20 Users</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Unlimited dashboards</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Custom CSS</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> IP Restriction</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Custom domain</span>
                        <br>
                        <a class="btn btn-sub btn-primary" href="#" role="button">GET STARTED NOW</a>

                    </li>

                    <li class="text-center">
                        <strong>EXTRA</strong>
                        <span class="big">$300</span>
                        <span class="price_table-pay">4 quarterly payments</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> 20 Users</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Unlimited dashboards</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Custom CSS</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> IP Restriction</span>
                        <span class="price_table-description"><i class="fa fa-check"></i> Custom domain</span>
                        <br>
                        <a class="btn btn-sub btn-primary" href="#" role="button">GET STARTED NOW</a>
                    </li>
                </ul>
            </div>    <!-- row main_content -->
        </div>    <!-- container -->
    </section>    <!-- price_table -->

    <!-- contact -->
    <section id="contact">
        <div class="container text-center">
            <div class="row text-center">
                <div class="bg-image">
                    <div class="col-md-6 col-md-offset-3 text-center share-text wow animated zoomInDown heading-text">
                        <p class="heading">
                            If you got any questions, please do not hesitate to send us a message.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row text-center main_content">
                <form method="post" action="#" class="">
                    <div class="col-md-4 col-md-offset-2 text-center">
                        <div class="form">
                            <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-user fa-fw"></i>
	  								</span>
                                <input class="form-control" type="text" placeholder="Name" required>
                            </div>
                            <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-envelope-o fa-fw"></i>
	  								</span>
                                <input class="form-control" name="email" type="email" placeholder="Email address"
                                       required>
                            </div>
                            <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-tags fa-fw"></i>
	  								</span>
                                <input class="form-control" type="text" placeholder="Subject">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form">
                            <div class="input-group margin-bottom-sm">
									<span class="input-group-addon">
										<i class="fa fa-comment-o fa-fw"></i>
									</span>
                                <input type="text" name="text" class="form-control message" placeholder="Your Message">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <input class="btn btn-sub" type="submit" value="Send Message">
        </div>
    </section>    <!-- contacts -->
@endsection