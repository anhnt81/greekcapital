@extends('front-end.layouts.master')
@section('content')
    <style>
        input[type="submit"] {
            padding: 6px 12px;
            border-radius: 4px;
        }
        .panel-title {
            font-size: 16px;
        }
        body{
            background-color: #f8f8f8;
        }
    </style>
    <head>
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
                            <li><a href="{{asset('')}}" target="_blank">Website</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="tel:0966607094"><i class="fa fa-phone"></i> 096.607.094</a></li>
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

            <div class="col-xs-3 bs-wizard-step active">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Bước 1: Đăng ký đầu tư</div>
            </div>

            <div class="col-xs-3 bs-wizard-step disabled">
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
            <div class="col-md-4 col-md-offset-4">
                <div id="divLoading">
                </div>
                <div class="login-panel panel panel-default" style="margin-top: 5%;">
                    <div class="panel-heading" style="padding: 10px 15px;background-color: #f5f5f5;" id="title_login">
                        <h3 class="panel-title">Bước 1: ĐĂNG KÝ ĐẦU TƯ</h3>
                    </div>
                    <div class="panel-body">
                        <p>Quý khách vui lòng nhập đầy đủ các thông tin dưới đây để Đăng ký đầu tư</p>
                        <form id="contact-form" action="{{route('postStep1')}}" method="post">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input class="form-control" placeholder="Họ và tên *" name="name"
                                       id="ContactPenUserForm_name" type="text" maxlength="100"/></div>
                            <div class="form-group">
                                <div class="error" id="ContactPenUserForm_name_em_" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email *" name="email"
                                       id="ContactPenUserForm_email" type="text" maxlength="100"/></div>
                            <div class="form-group">
                                <div class="error" id="ContactPenUserForm_email_em_" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Số điện thoại *"
                                       name="telephone" id="ContactPenUserForm_telephone"
                                       type="text" maxlength="100"/></div>
                            <div class="form-group">
                                <div class="error" id="ContactPenUserForm_telephone_em_" style="display:none"></div>
                            </div>
                            <input class="btn btn-success " type="submit" name="yt0" value="Đăng ký"/>
                            <p></p>
                            <p class="small" style="color: #aaa"><i>Nếu Quý khách đã đăng ký đầu tư tại Passion
                                    Investment, vui lòng nhập đúng Email và Họ tên đầy đủ đã đăng ký trước đó</i></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->

    <script type="text/javascript">
        /*<![CDATA[*/
        jQuery(function ($) {
            jQuery('#contact-form').yiiactiveform({
                'validateOnSubmit': true, 'attributes': [{
                    'id': 'ContactPenUserForm_name',
                    'inputID': 'ContactPenUserForm_name',
                    'errorID': 'ContactPenUserForm_name_em_',
                    'model': 'ContactPenUserForm',
                    'name': 'name',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push("H\u1ecd v\u00e0 t\u00ean kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }


                        if (jQuery.trim(value) != '') {

                            if (value.length > 100) {
                                messages.push("H\u1ecd v\u00e0 t\u00ean is too long (maximum is 100 characters).");
                            }

                        }

                    }
                }, {
                    'id': 'ContactPenUserForm_email',
                    'inputID': 'ContactPenUserForm_email',
                    'errorID': 'ContactPenUserForm_email_em_',
                    'model': 'ContactPenUserForm',
                    'name': 'email',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push("Email kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }


                        if (jQuery.trim(value) != '' && !value.match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/)) {
                            messages.push("Email is not a valid email address.");
                        }


                        if (jQuery.trim(value) != '') {

                            if (value.length > 100) {
                                messages.push("Email is too long (maximum is 100 characters).");
                            }

                        }

                    }
                }, {
                    'id': 'ContactPenUserForm_telephone',
                    'inputID': 'ContactPenUserForm_telephone',
                    'errorID': 'ContactPenUserForm_telephone_em_',
                    'model': 'ContactPenUserForm',
                    'name': 'telephone',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push("S\u1ed1 \u0111i\u1ec7n tho\u1ea1i kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }


                        if (jQuery.trim(value) != '') {

                            if (value.length > 100) {
                                messages.push("S\u1ed1 \u0111i\u1ec7n tho\u1ea1i is too long (maximum is 100 characters).");
                            }

                        }


                        if (jQuery.trim(value) != '' && !value.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/)) {
                            messages.push("S\u1ed1 \u0111i\u1ec7n tho\u1ea1i is invalid.");
                        }

                    }
                }], 'errorCss': 'error'
            });
        });
        /*]]>*/
    </script>
    </body>
@endsection