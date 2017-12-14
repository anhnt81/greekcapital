<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Greek Capital</title>
    <link rel="shortcut icon" href="front-end/img/greek-capital.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- css -->
    <link rel="stylesheet" href="front-end/css/bootstrap.min.css">
    <link rel="stylesheet" href="front-end/css/font-awesome.min.css">
    <link rel="stylesheet" href="front-end/css/owl.carousel.css">
    <link rel="stylesheet" href="front-end/css/owl.theme.css">
    <link rel="stylesheet" href="front-end/css/owl.transitions.css">
    <link rel="stylesheet" href="front-end/css/animate.css">
    <link rel="stylesheet" href="front-end/js/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" href="front-end/js/nivo-lightbox/nivo-lightbox-theme.css">
    <link rel="stylesheet" href="front-end/css/custom.css">
    <!-- js -->
    <script src="front-end/js/jquery.min.js"></script>
    <script src="front-end/js/bootstrap.min.js"></script>
    <script src="front-end/js/owl.carousel.min.js"></script>
    <script src="front-end/js/wow.min.js"></script>
    <script src="front-end/js/jquery.actual.min.js"></script>
    <!--Start of Zendesk Chat Script-->
    <script type="text/javascript">
        window.$zopim || (function (d, s) {
            var z = $zopim = function (c) {
                z._.push(c)
            }, $ = z.s =
                d.createElement(s), e = d.getElementsByTagName(s)[0];
            z.set = function (o) {
                z.set._.push(o)
            };
            z._ = [];
            z.set._ = [];
            $.async = !0;
            $.setAttribute('charset', 'utf-8');
            $.src = 'https://v2.zopim.com/?5Iblxa3HyX0YXirXJNoKKN5cZvAwNSfS';
            z.t = +new Date;
            $.type = 'text/javascript';
            e.parentNode.insertBefore($, e)
        })(document, 'script');
    </script>
    <!--End of Zendesk Chat Script-->
</head>
    <!-- =======================================================
      Author: AnhNT
      License: https://bootstrapmade.com/license/
    ======================================================= -->

<body>
{{--@include('front-end.layouts.header')--}}
<!--==========================
   Content
============================-->
@yield('content')
<!--==========================
  Footer
============================-->
@include('front-end.layouts.footer')

<!-- js -->
{{--<script>--}}
    {{--new WOW().init();--}}
{{--</script>--}}
<script>
    $( function() {

        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup )
        {
            var $buttonGroup =$( buttonGroup );
            $buttonGroup.on( 'click', 'button', function()
            {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });

    });
</script>
<script src="front-end/js/jquery-ui-1.10.3.min.js"></script>
<script src="front-end/js/jquery.knob.js"></script>
<script src="front-end/js/daterangepicker.js"></script>
<script src="front-end/js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="front-end/js/smoothscroll.js"></script>
<script src="front-end/js/nivo-lightbox/nivo-lightbox.min.js"></script>
<script src="front-end/js/script.js"></script>
<script src="front-end/js/jquery.particleground.js"></script>
<script src="front-end/js/particleground.js"></script>

</body>
</html>