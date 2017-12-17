@extends('front-end.layouts.master')
@section('content')
    <head>
        <style>
            body{
                background-color: #f8f8f8;
            }
            .panel-title{
                font-size: 16px;
            }
            input[type="submit"]{
                padding: 6px 12px;
                border-radius: 4px;
            }
        </style>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'UA-97014841-15');
        </script>

    </head>

    <body id="contactPen">
    <header>
        <div class="container">
            <nav class="">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#" target="_blank"><img
                                    src="front-end/img/greek-capital.png" width="50" height="50"/></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="http://members.pif.vn/contactPen/">Đầu tư ngay <span
                                            class="sr-only">(current)</span></a></li>
                            <li><a href="{{ asset('') }}" target="_blank">Website</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="tel:0966607094"><i class="fa fa-phone"></i> 0966.607.094</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10" id="header_pi">
                <h1>HỢP TÁC ĐẦU TƯ</h1></br>
            </div>
            <div class="col-md-1">

            </div>
        </div>
        <div class="row bs-wizard" style="border-bottom:0;">

            <div class="col-xs-3 bs-wizard-step complete">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Bước 1: Đăng ký đầu tư</div>
            </div>

            <div class="col-xs-3 bs-wizard-step complete">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Bước 2: Lấy số hợp đồng</div>
            </div>

            <div class="col-xs-3 bs-wizard-step disabled">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Bước 3: Chuyển khoản</div>
            </div>

            <div class="col-xs-3 bs-wizard-step disabled">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Bước 4: Hoàn tất</div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div id="divLoading">
                </div>
                <div class="login-panel panel panel-default" style="margin-top: 5%;">
                    <div class="panel-heading" style="padding: 10px 15px;background-color: #f5f5f5;" id="title_login">
                        <h3 class="panel-title">THÔNG BÁO</h3>
                    </div>
                    <div class="panel-body">

                        <div class="alert alert-success">
                            <p>Quý khách đã đăng ký Hợp tác đầu tư thành công. Vui lòng kiểm tra Email để hoàn thiện 2
                                bước cuối cùng</p>
                            <ul>
                                <li><b>Bước 3</b>: Quý khách sẽ nhận được email hướng dẫn chuyển khoản vào tài khoản Hợp
                                    tác kinh doanh của Greek Capital.
                                </li>
                                <li><b>Bước 4</b>: Sau khi nhận được thông báo từ phía ngân hàng. Greek Capital sẽ
                                    hoàn tất thủ tục và gửi bản cứng hợp đồng cho Quý khách.
                                </li>
                            </ul>
                            <p><br/></p>
                            <p><i>Nếu có bất cứ thắc mắc nào, xin vui lòng liên hệ HOTLINE <b><a href="tel:0966607094">0966.607.094</a></b></i>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection