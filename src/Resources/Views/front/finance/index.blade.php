@extends(config('writter.views.front.layouts.base'))

@section('content')
    <!-- Navigation -->
    @include(config('writter.views.front.layouts.partials.navbars.alt_main_nav'))
    <!-- end navigation -->
    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <div class="row row-24">

                <div class="col-xl-7">
                    <!-- Large post -->
                    @if(isset($featuredPost))
                    <div class="hero__item">
                        <article class="entry">
                            <div class="entry__img-holder">
                                <a href="{{route(Request::route()->getName(),$featuredPost['slug'])}}">
                                    <img src="{{ $featuredPost['featured_image']}}" alt="" class="entry__img">
                                </a>
                            </div>
                            <div class="entry__body">
                                <ul class="entry__meta">
                                    <li class="entry__meta-category">
                                        <a href="{{route(Request::route()->getName(),$featuredPost['slug'])}}">{{ $featuredPost['category_id']}}</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        5 Days Ago
                                    </li>
                                </ul>
                                <h2 class="entry__title">
                                    <a href="{{route(Request::route()->getName(),$featuredPost['slug'])}}">{{ $featuredPost['title']}}</a>
                                </h2>
                            </div>
                        </article>
                    </div>
                    @endif
                    <!-- end large post -->
                </div> <!-- end col -->

                <div class="col-xl-5">
                    <h4 class="widget-title">Top News</h4>
                    <ul class="post-list-small post-list-small--2 mb-32">
                        @if(isset($smallLatestPosts))
                            @foreach($smallLatestPosts as $post)
                                <li class="post-list-small__item">
                            <article class="post-list-small__entry clearfix">
                                <div class="post-list-small__img-holder">
                                    <div class="thumb-container thumb-70">
                                        <a href="{{route(Request::route()->getName(),$post['slug'])}}">
                                            <img data-src="{{$post['featured_image']}}" src="{{$post['featured_image']}}" alt="" class=" lazyload">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-list-small__body">
                                    <ul class="entry__meta">
                                        <li class="entry__meta-category">
                                            <a href="{{route(Request::route()->getName(),$post['slug'])}}">{{$post['category_id']}}</a>
                                        </li>
                                        <li class="entry__meta-date">
                                            {{\Carbon\Carbon::createFromTimeStamp(strtotime($post['created_at']))->diffForHumans()}}
                                        </li>
                                    </ul>
                                    <h3 class="post-list-small__entry-title">
                                        <a href="{{route(Request::route()->getName(),$post['slug'])}}">{{$post['title']}}</a>
                                    </h3>
                                </div>
                            </article>
                        </li>
                            @endforeach
                        @endif
                    </ul>
                </div> <!-- end col -->

            </div>
        </div>
    </section> <!-- end hero -->

    <div class="main-container container pt-40" id="main-container">

        <!-- Letest News -->
        <section class="section mb-16">
            <div class="title-wrap">
                <h3 class="section-title">Latest News</h3>
            </div>
            <div class="row card-row">
                @if(isset($stickyNews))
                    @foreach($stickyNews as $news)
                        <div class="col-md-4">
                            <article class="entry card card--1">
                                <div class="entry__img-holder card__img-holder">
                                    <a href="{{route(Request::route()->getName(),$news['slug'])}}">
                                        <div class="thumb-container thumb-70">
                                            <img data-src="{{$news['featured_image']}}" src="{{$news['featured_image']}}" class="entry__img lazyload" alt="" />
                                        </div>
                                    </a>
                                </div>

                                <div class="entry__body card__body">
                                    <div class="entry__header">
                                        <ul class="entry__meta">
                                            <li class="entry__meta-category">
                                                <a href="{{route(Request::route()->getName(),$news['slug'])}}">{{$news['category_id']}}</a>
                                            </li>
                                            <li class="entry__meta-date">
                                                {{\Carbon\Carbon::createFromTimeStamp(strtotime($news['created_at']))->diffForHumans()}}
                                            </li>
                                        </ul>
                                        <h2 class="entry__title">
                                            <a href="{{route(Request::route()->getName(),$news['slug'])}}">{{$news['title']}}</a>
                                        </h2>
                                        <ul class="entry__meta">
                                            <li class="entry__meta-author">
                                                <span>by</span>
                                                <a href="{{route(Request::route()->getName(),$news['slug'])}}">{{$news['author_id']}}</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </article>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!-- end latest news -->

        <!-- Content -->
        <div class="row">
            <!-- Posts -->
            <div class="col-lg-8 blog__content mb-48">

                <!-- Top Picks -->
                <div class="title-wrap">
                    <h3 class="section-title">Others</h3>
                </div>
                <div class="content-box">
                    <section class="section mb-0">
                        @if(isset($latestNews))
                            @foreach($latestNews as $item)
                                <article class="entry card post-list">
                            <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url({{$item['featured_image']}})">
                                <a href="{{route(Request::route()->getName(),$item['slug'])}}" class="thumb-url"></a>
                                <img src="{{$item['featured_image']}}" alt="" class="entry__img d-none">
                            </div>

                            <div class="entry__body post-list__body card__body">
                                <div class="entry__header">
                                    <ul class="entry__meta">
                                        <li class="entry__meta-category">
                                            <a href="{{route(Request::route()->getName(),$item['slug'])}}">{{$item['category_id']}}</a>
                                        </li>
                                        <li class="entry__meta-date">
                                           {{\Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans()}}
                                        </li>
                                    </ul>
                                    <h2 class="entry__title">
                                        <a href="{{route(Request::route()->getName(),$item['slug'])}}">{{$item['title']}}</a>
                                    </h2>
                                    <ul class="entry__meta">
                                        <li class="entry__meta-author">
                                            <span>by</span>
                                            <a href="{{route(Request::route()->getName(),$item['slug'])}}">{{$item['author_id']}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="entry__excerpt">
                                    <p>{{$item['excerpt']}}</p>
                                </div>
                            </div>
                        </article>
                            @endforeach
                        @endif

                    </section>
                </div>
                <!-- end content box -->

            </div>
            <!-- end posts -->

            <!-- Sidebar -->
            <aside class="col-lg-4 sidebar sidebar--right">

                <!-- Widget Newsletter -->
                {{--<aside class="widget widget_mc4wp_form_widget">
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
                </aside> --}}
                <!-- end widget newsletter -->

                <!-- Widget Socials -->
                {{--<aside class="widget widget-socials text-center">
                    <div class="socials socials--rounded socials--large">
                        <a class="social social-facebook" href="index-fashion.html#" title="facebook" target="_blank" aria-label="facebook">
                            <i class="ui-facebook"></i>
                        </a><!--
              --><a class="social social-twitter" href="index-fashion.html#" title="twitter" target="_blank" aria-label="twitter">
                            <i class="ui-twitter"></i>
                        </a><!--
              --><a class="social social-youtube" href="index-fashion.html#" title="youtube" target="_blank" aria-label="youtube">
                            <i class="ui-youtube"></i>
                        </a>
                        <a class="social social-google-plus" href="index-fashion.html#" title="google" target="_blank" aria-label="google">
                            <i class="ui-google"></i>
                        </a><!--
              --><a class="social social-instagram" href="index-fashion.html#" title="instagram" target="_blank" aria-label="instagram">
                            <i class="ui-instagram"></i>
                        </a><!--
              --><a class="social social-rss" href="index-fashion.html#" title="rss" target="_blank" aria-label="rss">
                            <i class="ui-rss"></i>
                        </a>
                    </div>
                </aside>--}}
                <!-- end widget socials -->

                <!-- Widget Latest Videos -->
                <aside class="widget widget-popular-posts">
                    <h4 class="widget-title">Popular Posts</h4>
                    <ul class="post-list-small">
                        @if(isset($latestTicker))
                            @foreach($latestTicker as $item)
                                <li class="post-list-small__item">
                                    <article class="post-list-small__entry clearfix">
                                        <div class="post-list-small__img-holder">
                                            <div class="thumb-container thumb-100">
                                                <a href="{{route(Request::route()->getName(),$item['slug'])}}">
                                                    <img data-src="{{$item['featured_image']}}" src="{{$item['featured_image']}}" alt="" class="post-list-small__img--rounded lazyload">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-list-small__body">
                                            <h3 class="post-list-small__entry-title">
                                                <a href="{{route(Request::route()->getName(),$item['slug'])}}">{{$item['title']}}</a>
                                            </h3>
                                            <ul class="entry__meta">
                                                <li class="entry__meta-author">
                                                    <span>by</span>
                                                    <a href="{{route(Request::route()->getName(),$item['slug'])}}">DeoThemes</a>
                                                </li>
                                                <li class="entry__meta-date">
                                                    {{\Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans()}}
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </aside>
                <!-- end widget latest videos -->

                <!-- Widget Instagram -->
                {{--<aside class="widget widget-instagram">
                    <h4 class="widget-title">Instagram Feed</h4>
                    <ul class="widget-instagram__list clearfix">
                        <li><a href="index-fashion.html#"><img src="img/content/instagram/1_small.jpg" alt=""></a></li>
                        <li><a href="index-fashion.html#"><img src="img/content/instagram/2_small.jpg" alt=""></a></li>
                        <li><a href="index-fashion.html#"><img src="img/content/instagram/3_small.jpg" alt=""></a></li>
                        <li><a href="index-fashion.html#"><img src="img/content/instagram/4_small.jpg" alt=""></a></li>
                        <li><a href="index-fashion.html#"><img src="img/content/instagram/5_small.jpg" alt=""></a></li>
                        <li><a href="index-fashion.html#"><img src="img/content/instagram/6_small.jpg" alt=""></a></li>
                    </ul>
                </aside>--}}
                <!-- end widget instagram -->

                <!-- Widget Ad 300 -->
                {{--<aside class="widget widget_media_image">
                    <a href="index-fashion.html#">
                        <img src="img/content/placeholder_336.jpg" alt="">
                    </a>
                </aside> --}}
                <!-- end widget ad 300 -->

            </aside> <!-- end sidebar -->

        </div> <!-- end content -->
    </div> <!-- end main container -->
@endsection
