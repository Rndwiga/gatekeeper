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

    <!-- Top Bar -->
@include(config('writter.views.front.layouts.partials.navbars.top_bar'))
<!-- end top bar -->

    <!-- Navigation -->
@include(config('writter.views.front.layouts.partials.navbars.main_nav'))
<!-- end navigation -->


    <!-- Trending Now -->
@include(config('writter.views.front.home.partials.trending'))
<!-- Trending Now -->

    <!-- Featured Posts Grid -->
@include(config('writter.views.front.home.partials.featured'))
<!-- end featured posts grid -->

    <div class="main-container container pt-24" id="main-container">

        <!-- Content -->
        <div class="row">

            <!-- Posts -->
            <div class="col-lg-8 blog__content">
                <!-- Latest News -->
                <section class="section tab-post mb-16">
                    <div class="title-wrap title-wrap--line">
                        <h3 class="section-title">Latest News</h3>

                        <div class="tabs tab-post__tabs">
                            <ul class="tabs__list">
                                <li class="tabs__item tabs__item--active">
                                    <a href="index.html#tab-all" class="tabs__trigger">All</a>
                                </li>
                                <li class="tabs__item">
                                    <a href="index.html#tab-world" class="tabs__trigger">World</a>
                                </li>
                                <li class="tabs__item">
                                    <a href="index.html#tab-lifestyle" class="tabs__trigger">Lifestyle</a>
                                </li>
                                <li class="tabs__item">
                                    <a href="index.html#tab-business" class="tabs__trigger">Business</a>
                                </li>
                                <li class="tabs__item">
                                    <a href="index.html#tab-fashion" class="tabs__trigger">Fashion</a>
                                </li>
                            </ul> <!-- end tabs -->
                        </div>
                    </div>

                    <!-- tab content -->
                    <div class="tabs__content tabs__content-trigger tab-post__tabs-content">

                        <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
                            <div class="row card-row">
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">world</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Follow These Smartphone Habits of Successful Entrepreneurs</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--purple">fashion</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">3 Things You Can Do to Get Your Customers Talking About Your Business</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_3.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange">mining</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Lose These 12 Bad Habits If You're Serious About Becoming a Millionaire</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_4.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green">lifestyle</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">10 Horrible Habits You're Doing Right Now That Are Draining Your Energy</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div> <!-- end pane 1 -->

                        <div class="tabs__content-pane" id="tab-world">
                            <div class="row card-row">
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_3.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange">mining</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Lose These 12 Bad Habits If You're Serious About Becoming a Millionaire</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_4.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green">lifestyle</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">10 Horrible Habits You're Doing Right Now That Are Draining Your Energy</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">world</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Follow These Smartphone Habits of Successful Entrepreneurs</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--purple">fashion</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">3 Things You Can Do to Get Your Customers Talking About Your Business</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div> <!-- end pane 2 -->

                        <div class="tabs__content-pane" id="tab-lifestyle">
                            <div class="row card-row">
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">world</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Follow These Smartphone Habits of Successful Entrepreneurs</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--purple">fashion</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">3 Things You Can Do to Get Your Customers Talking About Your Business</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_3.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange">mining</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Lose These 12 Bad Habits If You're Serious About Becoming a Millionaire</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_4.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green">lifestyle</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">10 Horrible Habits You're Doing Right Now That Are Draining Your Energy</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div> <!-- end pane 3 -->

                        <div class="tabs__content-pane" id="tab-business">
                            <div class="row card-row">
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_3.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange">mining</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Lose These 12 Bad Habits If You're Serious About Becoming a Millionaire</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_4.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green">lifestyle</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">10 Horrible Habits You're Doing Right Now That Are Draining Your Energy</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">world</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Follow These Smartphone Habits of Successful Entrepreneurs</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--purple">fashion</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">3 Things You Can Do to Get Your Customers Talking About Your Business</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div> <!-- end pane 4 -->

                        <div class="tabs__content-pane" id="tab-fashion">
                            <div class="row card-row">
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">world</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Follow These Smartphone Habits of Successful Entrepreneurs</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--purple">fashion</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">3 Things You Can Do to Get Your Customers Talking About Your Business</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_3.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange">mining</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">Lose These 12 Bad Habits If You're Serious About Becoming a Millionaire</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-6">
                                    <article class="entry card">
                                        <div class="entry__img-holder card__img-holder">
                                            <a href="single-post.html">
                                                <div class="thumb-container thumb-70">
                                                    <img data-src="img/content/grid/grid_post_4.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                                </div>
                                            </a>
                                            <a href="index.html#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green">lifestyle</a>
                                        </div>

                                        <div class="entry__body card__body">
                                            <div class="entry__header">

                                                <h2 class="entry__title">
                                                    <a href="single-post.html">10 Horrible Habits You're Doing Right Now That Are Draining Your Energy</a>
                                                </h2>
                                                <ul class="entry__meta">
                                                    <li class="entry__meta-author">
                                                        <span>by</span>
                                                        <a href="index.html#">DeoThemes</a>
                                                    </li>
                                                    <li class="entry__meta-date">
                                                        Jan 21, 2018
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry__excerpt">
                                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div> <!-- end pane 5 -->
                    </div> <!-- end tab content -->
                </section>
                <!-- end latest news -->

            </div>
            <!-- end posts -->

            <!-- Sidebar -->
            <aside class="col-lg-4 sidebar sidebar--right">

                <!-- Widget Popular Posts -->
                <aside class="widget widget-popular-posts">
                    <h4 class="widget-title">Popular Posts</h4>
                    <ul class="post-list-small">
                        <li class="post-list-small__item">
                            <article class="post-list-small__entry clearfix">
                                <div class="post-list-small__img-holder">
                                    <div class="thumb-container thumb-100">
                                        <a href="single-post.html">
                                            <img data-src="img/content/post_small/post_small_1.jpg" src="img/empty.png" alt="" class="post-list-small__img--rounded lazyload">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-list-small__body">
                                    <h3 class="post-list-small__entry-title">
                                        <a href="single-post.html">Follow These Smartphone Habits of Successful Entrepreneurs</a>
                                    </h3>
                                    <ul class="entry__meta">
                                        <li class="entry__meta-author">
                                            <span>by</span>
                                            <a href="index.html#">DeoThemes</a>
                                        </li>
                                        <li class="entry__meta-date">
                                            Jan 21, 2018
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </li>
                        <li class="post-list-small__item">
                            <article class="post-list-small__entry clearfix">
                                <div class="post-list-small__img-holder">
                                    <div class="thumb-container thumb-100">
                                        <a href="single-post.html">
                                            <img data-src="img/content/post_small/post_small_2.jpg" src="img/empty.png" alt="" class="post-list-small__img--rounded lazyload">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-list-small__body">
                                    <h3 class="post-list-small__entry-title">
                                        <a href="single-post.html">Lose These 12 Bad Habits If You're Serious About Becoming a Millionaire</a>
                                    </h3>
                                    <ul class="entry__meta">
                                        <li class="entry__meta-author">
                                            <span>by</span>
                                            <a href="index.html#">DeoThemes</a>
                                        </li>
                                        <li class="entry__meta-date">
                                            Jan 21, 2018
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </li>
                        <li class="post-list-small__item">
                            <article class="post-list-small__entry clearfix">
                                <div class="post-list-small__img-holder">
                                    <div class="thumb-container thumb-100">
                                        <a href="single-post.html">
                                            <img data-src="img/content/post_small/post_small_3.jpg" src="img/empty.png" alt="" class="post-list-small__img--rounded lazyload">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-list-small__body">
                                    <h3 class="post-list-small__entry-title">
                                        <a href="single-post.html">June in Africa: Taxi wars, smarter cities and increased investments</a>
                                    </h3>
                                    <ul class="entry__meta">
                                        <li class="entry__meta-author">
                                            <span>by</span>
                                            <a href="index.html#">DeoThemes</a>
                                        </li>
                                        <li class="entry__meta-date">
                                            Jan 21, 2018
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </li>
                        <li class="post-list-small__item">
                            <article class="post-list-small__entry clearfix">
                                <div class="post-list-small__img-holder">
                                    <div class="thumb-container thumb-100">
                                        <a href="single-post.html">
                                            <img data-src="img/content/post_small/post_small_4.jpg" src="img/empty.png" alt="" class="post-list-small__img--rounded lazyload">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-list-small__body">
                                    <h3 class="post-list-small__entry-title">
                                        <a href="single-post.html">PUBG Desert Map Finally Revealed, Here Are All The Details</a>
                                    </h3>
                                    <ul class="entry__meta">
                                        <li class="entry__meta-author">
                                            <span>by</span>
                                            <a href="index.html#">DeoThemes</a>
                                        </li>
                                        <li class="entry__meta-date">
                                            Jan 21, 2018
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </li>
                    </ul>
                </aside> <!-- end widget popular posts -->

                <!-- Widget Newsletter -->
                <aside class="widget widget_mc4wp_form_widget">
                    <h4 class="widget-title">Newsletter</h4>
                    <p class="newsletter__text">
                        <i class="ui-email newsletter__icon"></i>
                        Subscribe for our daily news
                    </p>
                    <form class="mc4wp-form" method="post">
                        <div class="mc4wp-form-fields">
                            <div class="form-group">
                                <input type="email" name="EMAIL" placeholder="Your email" required="">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-lg btn-color" value="Sign Up">
                            </div>
                        </div>
                    </form>
                </aside> <!-- end widget newsletter -->

                <!-- Widget Socials -->
                <aside class="widget widget-socials">
                    <h4 class="widget-title">Let's hang out on social</h4>
                    <div class="socials socials--wide socials--large">
                        <div class="row row-16">
                            <div class="col">
                                <a class="social social-facebook" href="index.html#" title="facebook" target="_blank" aria-label="facebook">
                                    <i class="ui-facebook"></i>
                                    <span class="social__text">Facebook</span>
                                </a><!--
                  --><a class="social social-twitter" href="index.html#" title="twitter" target="_blank" aria-label="twitter">
                                    <i class="ui-twitter"></i>
                                    <span class="social__text">Twitter</span>
                                </a><!--
                  --><a class="social social-youtube" href="index.html#" title="youtube" target="_blank" aria-label="youtube">
                                    <i class="ui-youtube"></i>
                                    <span class="social__text">Youtube</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="social social-google-plus" href="index.html#" title="google" target="_blank" aria-label="google">
                                    <i class="ui-google"></i>
                                    <span class="social__text">Google+</span>
                                </a><!--
                  --><a class="social social-instagram" href="index.html#" title="instagram" target="_blank" aria-label="instagram">
                                    <i class="ui-instagram"></i>
                                    <span class="social__text">Instagram</span>
                                </a><!--
                  --><a class="social social-rss" href="index.html#" title="rss" target="_blank" aria-label="rss">
                                    <i class="ui-rss"></i>
                                    <span class="social__text">Rss</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside> <!-- end widget socials -->

            </aside> <!-- end sidebar -->

        </div> <!-- end content -->

        <!-- Ad Banner 728 -->
        <div class="text-center pb-48">
            <a href="index.html#">
                <img src="{{ asset('deus') }}/img/content/placeholder_728.jpg" alt="">
            </a>
        </div>

        <!-- Carousel posts -->
        <section class="section mb-0">
            <div class="title-wrap title-wrap--line title-wrap--pr">
                <h3 class="section-title">editors picks</h3>
            </div>

            <!-- Slider -->
            <div id="owl-posts" class="owl-carousel owl-theme owl-carousel--arrows-outside">
                <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_1.jpg');">
                        <div class="bottom-gradient"></div>
                        <div class="thumb-text-holder">
                            <h2 class="thumb-entry-title">
                                <a href="single-post.html">9 Things to Consider Before Accepting a New Job</a>
                            </h2>
                        </div>
                        <a href="single-post.html" class="thumb-url"></a>
                    </div>
                </article>
                <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_2.jpg');">
                        <div class="bottom-gradient"></div>
                        <div class="thumb-text-holder">
                            <h2 class="thumb-entry-title">
                                <a href="single-post.html">Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</a>
                            </h2>
                        </div>
                        <a href="single-post.html" class="thumb-url"></a>
                    </div>
                </article>
                <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_3.jpg');">
                        <div class="bottom-gradient"></div>
                        <div class="thumb-text-holder">
                            <h2 class="thumb-entry-title">
                                <a href="single-post.html">(Infographic) Is Work-Life Balance Even Possible?</a>
                            </h2>
                        </div>
                        <a href="single-post.html" class="thumb-url"></a>
                    </div>
                </article>
                <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_4.jpg');">
                        <div class="bottom-gradient"></div>
                        <div class="thumb-text-holder">
                            <h2 class="thumb-entry-title">
                                <a href="single-post.html">Is Uber Considering To Sell its Southeast Asia Business to Grab?</a>
                            </h2>
                        </div>
                        <a href="single-post.html" class="thumb-url"></a>
                    </div>
                </article>
                <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_2.jpg');">
                        <div class="bottom-gradient"></div>
                        <div class="thumb-text-holder">
                            <h2 class="thumb-entry-title">
                                <a href="single-post.html">Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</a>
                            </h2>
                        </div>
                        <a href="single-post.html" class="thumb-url"></a>
                    </div>
                </article>
            </div> <!-- end slider -->

        </section> <!-- end carousel posts -->


        <!-- Posts from categories -->
        <section class="section mb-0">
            <div class="row">

                <!-- Technology -->
                <div class="col-md-6">
                    <div class="title-wrap title-wrap--line">
                        <h3 class="section-title">technology</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <article class="entry thumb thumb--size-2">
                                <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/thumb/thumb_post_1.jpg');">
                                    <div class="bottom-gradient"></div>
                                    <div class="thumb-text-holder thumb-text-holder--1">
                                        <h2 class="thumb-entry-title">
                                            <a href="single-post.html">Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</a>
                                        </h2>
                                        <ul class="entry__meta">
                                            <li class="entry__meta-author">
                                                <span>by</span>
                                                <a href="index.html#">DeoThemes</a>
                                            </li>
                                            <li class="entry__meta-date">
                                                Jan 21, 2018
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="single-post.html" class="thumb-url"></a>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-6">
                            <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">Need a Website for Your Business? Google Can Help</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">Here Are Ways You Can Earn From the Sharing Economy</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">19 Crazy Facts You Probably Didn't Know About Google</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">What Household Chores Would Filipinos Love to Assign to Robots?</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end technology -->

                <!-- Travel -->
                <div class="col-md-6">
                    <div class="title-wrap title-wrap--line">
                        <h3 class="section-title">travel</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <article class="entry thumb thumb--size-2">
                                <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/thumb/thumb_post_2.jpg');">
                                    <div class="bottom-gradient"></div>
                                    <div class="thumb-text-holder thumb-text-holder--1">
                                        <h2 class="thumb-entry-title">
                                            <a href="single-post.html">4 credit card tips to make business travel easier</a>
                                        </h2>
                                        <ul class="entry__meta">
                                            <li class="entry__meta-author">
                                                <span>by</span>
                                                <a href="index.html#">DeoThemes</a>
                                            </li>
                                            <li class="entry__meta-date">
                                                Jan 21, 2018
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="single-post.html" class="thumb-url"></a>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-6">
                            <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">5 deadliest luxury vacation spots on Earth</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">These 4 startups can send you to work and travel abroad</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">9 mind-blowing travel destinations for adventure seekers</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">These Small Business Ideas Are Great for Entrepreneurial Children</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end travel -->

                <!-- Cryptocurrency -->
                <div class="col-md-6">
                    <div class="title-wrap title-wrap--line">
                        <h3 class="section-title">Cryptocurrency</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <article class="entry thumb thumb--size-2">
                                <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/thumb/thumb_post_3.jpg');">
                                    <div class="bottom-gradient"></div>
                                    <div class="thumb-text-holder thumb-text-holder--1">
                                        <h2 class="thumb-entry-title">
                                            <a href="single-post.html">UN’s WFP Building Up Blockchain-Based Payments System</a>
                                        </h2>
                                        <ul class="entry__meta">
                                            <li class="entry__meta-author">
                                                <span>by</span>
                                                <a href="index.html#">DeoThemes</a>
                                            </li>
                                            <li class="entry__meta-date">
                                                Jan 21, 2018
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="single-post.html" class="thumb-url"></a>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-6">
                            <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">Cryptocurrency Markets: Weekly Trading Overview (06-13 October)</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">MyEtherWallet Opens the Ethereum Universe for You</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">Put Your Money Where Your Marketing Is</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">3 ways for startups to master the art of emailing</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end cryptocurrency -->

                <!-- Investment -->
                <div class="col-md-6">
                    <div class="title-wrap title-wrap--line">
                        <h3 class="section-title">Investment</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <article class="entry thumb thumb--size-2">
                                <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/thumb/thumb_post_4.jpg');">
                                    <div class="bottom-gradient"></div>
                                    <div class="thumb-text-holder thumb-text-holder--1">
                                        <h2 class="thumb-entry-title">
                                            <a href="single-post.html">14 easy, low-cost ways authors can promote their books</a>
                                        </h2>
                                        <ul class="entry__meta">
                                            <li class="entry__meta-author">
                                                <span>by</span>
                                                <a href="index.html#">DeoThemes</a>
                                            </li>
                                            <li class="entry__meta-date">
                                                Jan 21, 2018
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="single-post.html" class="thumb-url"></a>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-6">
                            <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">Financial Adviser: 4 ways to know how much dividends you should pay</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">3 cash flow rules first-time business owners need to know</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">Common credit mistakes new business owners make</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry">
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="single-post.html">Ask these 2 questions every time you make a purchase</a>
                                            </h3>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end investment -->

            </div>
        </section> <!-- end posts from categories -->

        <!-- Video posts -->
        <section class="section mb-24">
            <div class="title-wrap title-wrap--line">
                <h3 class="section-title">Videos</h3>
                <a href="index.html#" class="all-posts-url">View All</a>
            </div>
            <div class="row card-row">
                <div class="col-md-6">
                    <article class="entry card">
                        <div class="entry__img-holder card__img-holder">
                            <a href="single-post.html">
                                <div class="thumb-container thumb-65">
                                    <img data-src="img/content/grid/grid_post_5.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                </div>
                            </a>
                            <div class="entry__play-time"><i class="ui-play"></i>3:21</div>
                        </div>

                        <div class="entry__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="single-post.html">What Days and Hours are PH Online Shoppers Most Likely to Buy?</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <article class="entry card">
                        <div class="entry__img-holder card__img-holder">
                            <a href="single-post.html">
                                <div class="thumb-container thumb-65">
                                    <img data-src="img/content/grid/grid_post_6.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                                </div>
                            </a>
                            <div class="entry__play-time"><i class="ui-play"></i>3:21</div>
                        </div>

                        <div class="entry__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="single-post.html">Want to work at Tesla? This program guarantees you a job after graduation</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section> <!-- end video posts -->


        <!-- Content Secondary -->
        <div class="row">

            <!-- Posts -->
            <div class="col-lg-8 blog__content mb-72">

                <!-- Worldwide News -->
                <section class="section">
                    <div class="title-wrap title-wrap--line">
                        <h3 class="section-title">Worldwide</h3>
                        <a href="index.html#" class="all-posts-url">View All</a>
                    </div>

                    <article class="entry card post-list">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(img/content/list/list_post_1.jpg)">
                            <a href="single-post.html" class="thumb-url"></a>
                            <img src="img/content/list/list_post_1.jpg" alt="" class="entry__img d-none">
                            <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue">Business</a>
                        </div>

                        <div class="entry__body post-list__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="single-post.html">These Are the 20 Best Places to Work in 2018</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                            </div>
                        </div>
                    </article>

                    <article class="entry card post-list">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(img/content/list/list_post_2.jpg)">
                            <a href="single-post.html" class="thumb-url"></a>
                            <img src="img/content/list/list_post_2.jpg" alt="" class="entry__img d-none">
                            <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--purple">Fashion</a>
                        </div>

                        <div class="entry__body post-list__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="single-post.html">This Co-Working Space is a One-Stop Shop</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                            </div>
                        </div>
                    </article>

                    <article class="entry card post-list">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(img/content/list/list_post_3.jpg)">
                            <a href="single-post.html" class="thumb-url"></a>
                            <img src="img/content/list/list_post_3.jpg" alt="" class="entry__img d-none">
                            <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange">Mining</a>
                        </div>

                        <div class="entry__body post-list__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="single-post.html">This 6-Year-Old Kid Reportedly Earned US$11 Million on YouTube</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                            </div>
                        </div>
                    </article>

                    <article class="entry card post-list">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(img/content/list/list_post_4.jpg)">
                            <a href="single-post.html" class="thumb-url"></a>
                            <img src="img/content/list/list_post_4.jpg" alt="" class="entry__img d-none">
                            <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">World</a>
                        </div>

                        <div class="entry__body post-list__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="single-post.html">Rating Agency Breaks with Financial Community </a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                            </div>
                        </div>
                    </article>

                    <article class="entry card post-list">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(img/content/list/list_post_5.jpg)">
                            <a href="single-post.html" class="thumb-url"></a>
                            <img src="img/content/list/list_post_5.jpg" alt="" class="entry__img d-none">
                            <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--red">Investment</a>
                        </div>

                        <div class="entry__body post-list__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="single-post.html">Decentralized Exchanges (DEX) – What Are They?</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                            </div>
                        </div>
                    </article>

                    <article class="entry card post-list">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(img/content/list/list_post_6.jpg)">
                            <a href="single-post.html" class="thumb-url"></a>
                            <img src="img/content/list/list_post_6.jpg" alt="" class="entry__img d-none">
                            <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--cyan">Technology</a>
                        </div>

                        <div class="entry__body post-list__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="single-post.html">Decentralized Exchanges (DEX) – What Are They?</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                            </div>
                        </div>
                    </article>
                </section> <!-- end worldwide news -->

                <!-- Pagination -->
                <nav class="pagination">
                    <span class="pagination__page pagination__page--current">1</span>
                    <a href="index.html#" class="pagination__page">2</a>
                    <a href="index.html#" class="pagination__page">3</a>
                    <a href="index.html#" class="pagination__page">4</a>
                    <a href="index.html#" class="pagination__page pagination__icon pagination__page--next"><i class="ui-arrow-right"></i></a>
                </nav>

            </div> <!-- end posts -->

            <!-- Sidebar 1 -->
            <aside class="col-lg-4 sidebar sidebar--1 sidebar--right">

                <!-- Widget Ad 300 -->
                <aside class="widget widget_media_image">
                    <a href="index.html#">
                        <img src="img/content/placeholder_336.jpg" alt="">
                    </a>
                </aside> <!-- end widget ad 300 -->

                <!-- Widget Categories -->
                <aside class="widget widget_categories">
                    <h4 class="widget-title">Categories</h4>
                    <ul>
                        <li><a href="categories.html">World <span class="categories-count">5</span></a></li>
                        <li><a href="categories.html">Lifestyle <span class="categories-count">7</span></a></li>
                        <li><a href="categories.html">Business <span class="categories-count">5</span></a></li>
                        <li><a href="categories.html">Fashion <span class="categories-count">8</span></a></li>
                        <li><a href="categories.html">Investment <span class="categories-count">10</span></a></li>
                        <li><a href="categories.html">Technology <span class="categories-count">6</span></a></li>
                    </ul>
                </aside> <!-- end widget categories -->

                <!-- Widget Recommended (Rating) -->
                <aside class="widget widget-rating-posts">
                    <h4 class="widget-title">Recommended</h4>
                    <article class="entry">
                        <div class="entry__img-holder">
                            <a href="single-post.html">
                                <div class="thumb-container thumb-60">
                                    <img data-src="img/content/review/review_post_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="entry__body">
                            <div class="entry__header">

                                <h2 class="entry__title">
                                    <a href="single-post.html">UN’s WFP Building Up Blockchain-Based Payments System</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                                <ul class="entry__meta">
                                    <li class="entry__meta-rating">
                                        <i class="ui-star"></i><!--
                      --><i class="ui-star"></i><!--
                      --><i class="ui-star"></i><!--
                      --><i class="ui-star"></i><!--
                      --><i class="ui-star-empty"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article class="entry">
                        <div class="entry__img-holder">
                            <a href="single-post.html">
                                <div class="thumb-container thumb-60">
                                    <img data-src="img/content/review/review_post_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="entry__body">
                            <div class="entry__header">

                                <h2 class="entry__title">
                                    <a href="single-post.html">4 credit card tips to make business travel easier</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="index.html#">DeoThemes</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        Jan 21, 2018
                                    </li>
                                </ul>
                                <ul class="entry__meta">
                                    <li class="entry__meta-rating">
                                        <i class="ui-star"></i><!--
                      --><i class="ui-star"></i><!--
                      --><i class="ui-star"></i><!--
                      --><i class="ui-star"></i><!--
                      --><i class="ui-star-empty"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </aside> <!-- end widget recommended (rating) -->
            </aside> <!-- end sidebar 1 -->
        </div> <!-- content secondary -->


    </div>
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
<script src="{{ asset('deus') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('deus') }}/js/easing.min.js"></script>
<script src="{{ asset('deus') }}/js/owl-carousel.min.js"></script>
<script src="{{ asset('deus') }}/js/flickity.pkgd.min.js"></script>
<script src="{{ asset('deus') }}/js/twitterFetcher_min.js"></script>
<script src="{{ asset('deus') }}/js/jquery.newsTicker.min.js"></script>
<script src="{{ asset('deus') }}/js/modernizr.min.js"></script>
<script src="{{ asset('deus') }}/js/scripts.js"></script>

</body>
</html>
