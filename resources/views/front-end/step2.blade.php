@extends('front-end.layouts.master')
@section('content')
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
                        <a class="navbar-brand" href="http://pif.vn" target="_blank"><img
                                    src="/web/images/logo-white.png" height="50"/></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="http://members.pif.vn/contactPen/">Đầu tư ngay <span
                                            class="sr-only">(current)</span></a></li>
                            <li><a href="http://pif.vn" target="_blank">Website</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="tel:0915849235"><i class="fa fa-phone"></i> 0915.849.235</a></li>
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

            <div class="col-xs-3 bs-wizard-step active">
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
                        <h3 class="panel-title">Bước 2: LẤY SỐ HỢP ĐỒNG</h3>
                    </div>
                    <div class="panel-body">

                        <form id="contact-form" action="/contactPen/CreateHD" method="post">

                            <div class="col-md-12">
                                <h4>THÔNG TIN</h4>
                            </div>
                            <div class="col-md-8">
                                <label>Họ và tên *</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Họ và tên " value="Nguyễn Tuấn Anh"
                                           name="ContactPenForm[name]" id="ContactPenForm_name" type="text"/></div>
                                <div class="form-group">
                                    <div class="error" id="ContactPenForm_name_em_" style="display:none"></div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Mã số thuế</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mã số thuế " name="ContactPenForm[mst]"
                                           id="ContactPenForm_mst" type="text"/></div>
                                <div class="form-group">
                                    <div class="error" id="ContactPenForm_mst_em_" style="display:none"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Số CMTND *</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Số CMTND * " name="ContactPenForm[cmt]"
                                           id="ContactPenForm_cmt" type="text" maxlength="100"/></div>
                                <div class="form-group">
                                    <div class="error" id="ContactPenForm_cmt_em_" style="display:none"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Ngày cấp CMTND *</label>
                                <div class="form-group">
                                    <!--  <input class="form-control" placeholder="Ngày cấp CMTND *" name="ContactPenForm[cmt_datecreate]" id="ContactPenForm_cmt_datecreate" type="text" /> -->
                                    <input class="form-control" placeholder="Ngày cấp CMTND *" value="01/01/1970"
                                           id="ContactPenForm_cmt_datecreate" name="ContactPenForm[cmt_datecreate]"
                                           type="text"/></div>
                                <div class="form-group">
                                    <div class="error" id="ContactPenForm_cmt_datecreate_em_"
                                         style="display:none"></div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label>Nơi cấp CMTND *</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nơi cấp CMTND *"
                                           name="ContactPenForm[cmt_addresscreate]"
                                           id="ContactPenForm_cmt_addresscreate" type="text"/></div>
                                <div class="form-group">
                                    <div class="error" id="ContactPenForm_cmt_addresscreate_em_"
                                         style="display:none"></div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <h4>DỰ KIẾN ĐẦU TƯ</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="width:300px">
                                    <input class="form-control" placeholder="Vốn đầu tư *"
                                           name="ContactPenForm[investment]" id="ContactPenForm_investment"
                                           type="text"/></div>
                                <div class="form-group">
                                    <div class="error" id="ContactPenForm_investment_em_" style="display:none"></div>
                                </div>
                                <input class="btn btn-success " id="btnDK" type="submit" name="yt0" value="Đầu tư"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="/templates/js/jquery.formatCurrency-1.4.0.min.js"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('#ContactPenForm_investment').formatCurrency();
        });
        $('#ContactPenForm_investment').keyup(function () {
            if (($(this).val().trim() == null || $(this).val().trim() == "")) {

            } else {
                $(this).val(format($(this).val().trim()));
                if (isNaN($(this).val().trim().replace(/\./g, ""))) {
                    $('#ContactPenForm_investment_em_').show();
                    $('#ContactPenForm_investment_em_').html("Vốn hợp đồng phải là số!");
                    $("#btnDK").prop('disabled', true);
                } else {
                    $('#ContactPenForm_investment_em_').hide();
                    if ($(this).val().trim().replace(/\./g, '') < 20000000) {
                        $('#ContactPenForm_investment_em_').show();
                        $('#ContactPenForm_investment_em_').html("Vốn hợp đồng phải lớn hơn 20 triệu!");
                        $("#btnDK").prop('disabled', true);
                    } else {
                        $('#ContactPenForm_investment_em_').hide();
                        $("#btnDK").prop('disabled', false);
                    }

                }
            }

        });

        function format(num) {
            var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
            // if(str.indexOf(".") > 0) {
            //   parts = str.split(".");
            //   str = parts[0];
            // }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ".") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(".");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        }
    </script>
    <script type="text/javascript" src="/assets/405a04a2/jui/js/jquery-ui-i18n.min.js"></script>
    <script type="text/javascript" src="/assets/70b2e682/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
        /*<![CDATA[*/
        jQuery(function ($) {

            jQuery('#ContactPenForm_cmt_datecreate').datepicker(jQuery.extend({showMonthAfterYear: false}, jQuery.datepicker.regional['vi'], {
                'showSecond': true,
                'showOtherMonths': true,
                'selectOtherMonths': true,
                'changeMonth': true,
                'changeYear': true,
                'showAnim': 'fold',
                'dateFormat': 'dd/mm/yy'
            }));
            jQuery('#contact-form').yiiactiveform({
                'validateOnSubmit': true, 'attributes': [{
                    'id': 'ContactPenForm_name',
                    'inputID': 'ContactPenForm_name',
                    'errorID': 'ContactPenForm_name_em_',
                    'model': 'ContactPenForm',
                    'name': 'name',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push("H\u1ecd v\u00e0 t\u00ean kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }

                    }
                }, {
                    'id': 'ContactPenForm_mst',
                    'inputID': 'ContactPenForm_mst',
                    'errorID': 'ContactPenForm_mst_em_',
                    'model': 'ContactPenForm',
                    'name': 'mst',
                    'enableAjaxValidation': false
                }, {
                    'id': 'ContactPenForm_cmt',
                    'inputID': 'ContactPenForm_cmt',
                    'errorID': 'ContactPenForm_cmt_em_',
                    'model': 'ContactPenForm',
                    'name': 'cmt',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push("S\u1ed1 CMTND kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }


                        if (jQuery.trim(value) != '') {

                            if (value.length > 100) {
                                messages.push("S\u1ed1 CMTND is too long (maximum is 100 characters).");
                            }

                        }


                        if (jQuery.trim(value) != '') {

                            if (!value.match(/^\s*[+-]?\d+\s*$/)) {
                                messages.push("S\u1ed1 CMTND must be an integer.");
                            }

                        }

                    }
                }, {
                    'id': 'ContactPenForm_cmt_datecreate',
                    'inputID': 'ContactPenForm_cmt_datecreate',
                    'errorID': 'ContactPenForm_cmt_datecreate_em_',
                    'model': 'ContactPenForm',
                    'name': 'cmt_datecreate',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push("Ng\u00e0y c\u1ea5p CMTND kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }

                    }
                }, {
                    'id': 'ContactPenForm_cmt_addresscreate',
                    'inputID': 'ContactPenForm_cmt_addresscreate',
                    'errorID': 'ContactPenForm_cmt_addresscreate_em_',
                    'model': 'ContactPenForm',
                    'name': 'cmt_addresscreate',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push("N\u01a1i c\u1ea5p CMTND kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }

                    }
                }, {
                    'id': 'ContactPenForm_id_form',
                    'inputID': 'ContactPenForm_id_form',
                    'errorID': 'ContactPenForm_id_form_em_',
                    'model': 'ContactPenForm',
                    'name': 'id_form',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push(" kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }

                    }
                }, {
                    'id': 'ContactPenForm_investment',
                    'inputID': 'ContactPenForm_investment',
                    'errorID': 'ContactPenForm_investment_em_',
                    'model': 'ContactPenForm',
                    'name': 'investment',
                    'enableAjaxValidation': false,
                    'clientValidation': function (value, messages, attribute) {

                        if (jQuery.trim(value) == '') {
                            messages.push("V\u1ed1n \u0111\u1ea7u t\u01b0 kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng.");
                        }

                    }
                }], 'errorCss': 'error'
            });
        });
        /*]]>*/
    </script>
    </body>

    </html>

@endsection