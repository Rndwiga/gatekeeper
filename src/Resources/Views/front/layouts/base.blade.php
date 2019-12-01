<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{env('APP_NAME')}}</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('deus') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('deus') }}/css/font-icons.css" />
    <link rel="stylesheet" href="{{ asset('deus') }}/css/style.css" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('deus') }}/img/favicon.ico">
    <link rel="apple-touch-icon" href="http://deothemes.com/envato/deus/html/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('deus') }}/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('deus') }}/img/apple-touch-icon-114x114.png">

    <!-- Lazyload (must be placed in head in order to work) -->
    <script src="{{ asset('deus') }}/js/lazysizes.min.js"></script>
    <style>
        .to_action {
            overflow: hidden;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap; }
        .to_action_ht a {
            width: 40px;
            height: auto;
            border: 0;
            line-height: 32px;
            margin-right: 15px;
            margin-bottom: 0;
            color: #e8e0e0;
            background-color: transparent; }
        .to_action_color a {
            /** background-color: #fff; **/
            color: #f6f0f6; }

        /**below**/

        .main-section{
            background-color: #F8F8F8;
        }
        .dropdown{
            float:right;
            padding-right: 30px;
        }

        .dropdown .dropdown-menu{
            padding:20px;
            top:30px !important;
            width:350px !important;
            left:-110px !important;
            box-shadow:0px 5px 30px black;
        }
        .total-header-section{
            border-bottom:1px solid #d2d2d2;
        }
        .total-section p{
            margin-bottom:20px;
        }
        .cart-detail{
            padding:15px 0px;
        }
        .cart-detail-img img{
            width:100%;
            height:100%;
            padding-left:15px;
        }
        .cart-detail-product p{
            margin:0px;
            color:#000;
            font-weight:500;
        }
        .cart-detail .price{
            font-size:12px;
            margin-right:10px;
            font-weight:500;
        }
        .cart-detail .count{
            color:#C2C2DC;
        }
        .checkout{
            border-top:1px solid #d2d2d2;
            padding-top: 15px;
        }
        .checkout .btn-primary{
            border-radius:50px;
            height:50px;
        }

        .thumbnail {
            position: relative;
            padding: 0px;
            margin-bottom: 20px;
        }

        .thumbnail img {
            width: 100%;
        }

        .thumbnail .caption{
            margin: 7px;
        }

        .page {
            margin-top: 50px;
        }


        .table>tbody>tr>td, .table>tfoot>tr>td{
            vertical-align: middle;
        }
        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control{
                width:20%;
                display: inline !important;
            }
            .actions .btn{
                width:36%;
                margin:1.5em 0;
            }

            .actions .btn-info{
                float:left;
            }
            .actions .btn-danger{
                float:right;
            }

            table#cart thead { display: none; }
            table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
            table#cart tbody tr td:first-child { background: #333; color: #fff; }
            table#cart tbody td:before {
                content: attr(data-th); font-weight: bold;
                display: inline-block; width: 8rem;
            }



            table#cart tfoot td{display:block; }
            table#cart tfoot td .btn{display:block;}

        }
    </style>

</head>

<body class="bg-light style-default style-rounded">

<!-- Preloader -->
<div class="loader-mask">
    <div class="loader">
        <div></div>
    </div>
</div>

<!-- Bg Overlay -->
<div class="content-overlay"></div>

<!-- Sidenav -->
@include(config('writter.views.front.layouts.partials.navbars.sidenav'))
<!-- end sidenav -->

<main class="main oh" id="main">

    <!-- main container -->
    @yield('content')
    <!-- end main container -->

    <!-- Footer -->
@include(config('writter.views.front.layouts.partials.footers.footer'))
<!-- end footer -->

    <div id="back-to-top">
        <a href="index.html#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
    </div>

</main> <!-- end main-wrapper -->


<!-- jQuery Scripts -->
<script src="{{ asset('deus') }}/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="{{ asset('deus') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('deus') }}/js/easing.min.js"></script>
<script src="{{ asset('deus') }}/js/owl-carousel.min.js"></script>
<script src="{{ asset('deus') }}/js/flickity.pkgd.min.js"></script>
<script src="{{ asset('deus') }}/js/twitterFetcher_min.js"></script>
<script src="{{ asset('deus') }}/js/jquery.newsTicker.min.js"></script>
<script src="{{ asset('deus') }}/js/modernizr.min.js"></script>
<script src="{{ asset('deus') }}/js/scripts.js"></script>
@yield('scripts')
</body>
</html>
