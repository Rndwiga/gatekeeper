@extends(config('writter.views.front.layouts.base'))

@section('content')
    <!-- Navigation -->
    @include(config('writter.views.front.layouts.partials.navbars.alt_main_nav'))
    <!-- end navigation -->
    <!-- end main container -->
    {{--<div class="main-container container" id="main-container">
        <!-- Post Content -->
        <div class="blog__content mb-72">

            <!-- Entry Header -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__entry-header entry__header mb-56 text-center">
                        <h1 class="single-post__entry-title">
                            {{$post['title']}}
                        </h1>
                        <ul class="entry__meta">
                            <li class="entry__meta-author">
                                <span>by</span>
                                <a href="single-post-videos.html#">{{$post['author_id']}}</a>
                            </li>
                            <li class="entry__meta-date">
                                --}}{{--5 Days Ago--}}{{-- {{$post['created_at']}}
                            </li>
                            <li class="entry__meta-category">
                                <span>in</span>
                                <a href="single-post-videos.html#">{{$post['category_id']}}</a>
                            </li>
                            --}}{{--<li class="entry__meta-comments">
                                <a href="single-post-videos.html#">
                                    <i class="ui-chat-empty"></i>13
                                </a>
                            </li>--}}{{--
                        </ul>
                    </div>
                </div>
            </div> <!-- end entry header -->


            <!-- Entry Video -->
            <div class="entry__img-holder">

                <img src="{{$post['featured_image']}}" alt="">
                --}}{{--{!! $post['body'] !!}--}}{{--
                --}}{{--<div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.youtube.com/embed/SVnhBjRMlKA?feature=oembed" class="video-playlist__content-video">
                    </iframe>
                </div>--}}{{--
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- standard post -->
                    <article class="entry mb-0">
                        <div class="entry__article-wrap">

                            <!-- Share -->
                            <div class="entry__share">
                                <div class="sticky-col">
                                    <div class="socials socials--rounded socials--large">
                                        <a class="social social-facebook" href="single-post-videos.html#" title="facebook" target="_blank" aria-label="facebook">
                                            <i class="ui-facebook"></i>
                                        </a>
                                        <a class="social social-twitter" href="single-post-videos.html#" title="twitter" target="_blank" aria-label="twitter">
                                            <i class="ui-twitter"></i>
                                        </a>
                                        <a class="social social-google-plus" href="single-post-videos.html#" title="google" target="_blank" aria-label="google">
                                            <i class="ui-google"></i>
                                        </a>
                                        <a class="social social-pinterest" href="single-post-videos.html#" title="pinterest" target="_blank" aria-label="pinterest">
                                            <i class="ui-pinterest"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- share -->

                            <div class="entry__article">
                                <p>iPrice Group report offers insights on <a href="single-post-videos.html#">daily e-commerce</a> activity in the Philippines and Southeast. Statistically, you stand a better chance for success if you have some sort of strategic ask in almost everything that you do -- in-person, on the phone, over email, or on social media.</p>

                                <p><strong>Think about it:</strong> If you make one additional ask per day and convert at around 10 percent. Then you have three people each month providing you with benefits that you'd have missed otherwise It's essential to make sure that your ask relates to some direct path to what you want, whether it is revenue, a business relationship or anything else of prime importance to you.</p>

                                <blockquote><p>“Dreams and dedication are powerful combination.”</p>
                                </blockquote>

                                <p>Music can help you get into a “flow state” -- losing yourself in the task at hand. Even repetitive tasks or mundane assignments seem more bearable, or even fun, when your favorite tunes are in your ears.</p>

                                <h2>Set a bigger goals and chase them everyday</h2>
                                <p>Plus, your eyes won’t be so prone to checking the time. <a href="single-post-videos.html#">Check out these</a> and more reasons to bring your music to work in this Zing Instruments infographic below. A great piece of music is an instant mood lifter. Plenty of scientific evidence backs this up - we`re happier bunnies when listening to music.</p>

                                <figure class="alignleft">
                                    <img data-src="img/content/single/single_post_img_1.jpg" src="img/empty.png" alt="" class="lazyload">
                                    <figcaption>Having specific asks</figcaption>
                                </figure>

                                <p>Nulla rhoncus orci varius purus lobortis euismod. Fusce tincidunt dictum est et rhoncus. <strong>Vivamus hendrerit congue nisi, et nisl tincida</strong> vestibulum elit tincidunt eu. Vivamus ac pharetra orci, in feugiat massa. Proin congue mauris pretium, ultricies tortor in, aliquam urna. Vivamus mi tortor, <a href="single-post-videos.html#">finibus a interdum</a> ac, ultricies in elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere hendrerit ex eu scelerisque.</p>

                                <h4>Attraction needs attention</h4>
                                <p>In order to attract what you want, you actually have to consciously and strategically think about what you want and focus in on it. Then, you need to take some sort of action using the same <a href="single-post-videos.html#">four strategies</a> you use to ask for help in order to make it happen. You can't get what you want sitting around on your couch. You need to put yourself out there and stimulate interest in person, via email, by phone and through social media.</p>

                                <h2>Stylish article pages</h2>

                                <figure class="alignright">
                                    <img data-src="img/content/single/single_post_img_2.jpg" src="img/empty.png" alt="" class="lazyload">
                                    <figcaption>make it happen</figcaption>
                                </figure>

                                <p>Stimulating interest in person can be powerful, especially if you surround yourself with the right people and the right ideas. A study by Nielsen found that <strong>83 percent of people trust referrals</strong> from others they know. If you have a product, service, content or any other value that you provide to others, let them know when you talk in person or over the phone. As an example, if you're working with a charity organization, <a href="single-post-videos.html#">tell a story</a> about how much money you helped raise for another charity you're affiliated with.</p>

                                <p>If you win an important award in an industry, put it in your email signature or as a tagline in a piece of social content. Showcasing your wins organically and authentically will attract more of the same.</p>

                                <h5>List of features</h5>
                                <ul>
                                    <li>Reusable components</li>
                                    <li>Multiple niches</li>
                                    <li>Lightning fast</li>
                                    <li>BEM methodology</li>
                                    <li>Organized JS/Sass files</li>
                                </ul>

                                <h6>Summary</h6>

                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. And finally the subconscious is the mechanism through which thought impulses which are repeated regularly with feeling and emotion are quickened, charged. And finally the subconscious is the mechanism through which thought impulses which are repeated regularly with feeling and emotion.</p>

                                <!-- Final Review -->
                                <div class="final-review" style="background-image: url('img/content/single/final_review.jpg')">
                                    <div class="final-review__score">
                                        <span class="final-review__score-number">9.2</span>
                                    </div>
                                    <div class="final-review__text-holder">
                                        <h6 class="final-review__title">Great</h6>
                                        <p class="final-review__text">Lovingly rendered real-world space tech,playing through actual missions is a special thrill,scoring system gives much needed additional incentive to perfect your designs</p>
                                    </div>
                                </div> <!-- end final review -->

                                <!-- tags -->
                                <div class="entry__tags">
                                    <i class="ui-tags"></i>
                                    <span class="entry__tags-label">Tags:</span>
                                    <a href="single-post-videos.html#" rel="tag">mobile</a><a href="single-post-videos.html#" rel="tag">gadgets</a><a href="single-post-videos.html#" rel="tag">satelite</a>
                                </div> <!-- end tags -->

                            </div> <!-- end entry article -->
                        </div> <!-- end entry article wrap -->


                        <!-- Newsletter Wide -->
                        <div class="newsletter-wide">
                            <div class="widget widget_mc4wp_form_widget">
                                <div class="newsletter-wide__container">
                                    <div class="newsletter-wide__text-holder">
                                        <p class="newsletter-wide__text">
                                            <i class="ui-email newsletter__icon"></i>
                                            Subscribe for our daily news
                                        </p>
                                    </div>
                                    <div class="newsletter-wide__form">
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
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end newsletter wide -->

                        <!-- Prev / Next Post -->
                        <nav class="entry-navigation">
                            <div class="clearfix">
                                <div class="entry-navigation--left">
                                    <i class="ui-arrow-left"></i>
                                    <span class="entry-navigation__label">Previous Post</span>
                                    <div class="entry-navigation__link">
                                        <a href="single-post-videos.html#" rel="next">How to design your first mobile app</a>
                                    </div>
                                </div>
                                <div class="entry-navigation--right">
                                    <span class="entry-navigation__label">Next Post</span>
                                    <i class="ui-arrow-right"></i>
                                    <div class="entry-navigation__link">
                                        <a href="single-post-videos.html#" rel="prev">Video Youtube format post. Made with WordPress</a>
                                    </div>
                                </div>
                            </div>
                        </nav>

                        <!-- Author -->
                        <div class="entry-author clearfix">
                            <img alt="" data-src="img/content/single/author.jpg" src="img/empty.png" class="avatar lazyload">
                            <div class="entry-author__info">
                                <h6 class="entry-author__name">
                                    <a href="single-post-videos.html#">John Carpet</a>
                                </h6>
                                <p class="mb-0">But unfortunately for most of us our role as gardener has never been explained to us. And in misunderstanding our role, we have allowed seeds of all types, both good and bad, to enter our inner garden.</p>
                            </div>
                        </div>

                        <!-- Related Posts -->
                        <section class="section related-posts mt-40 mb-0">
                            <div class="title-wrap title-wrap--line title-wrap--pr">
                                <h3 class="section-title">Related Articles</h3>
                            </div>

                            <!-- Slider -->
                            <div id="owl-posts-3-items" class="owl-carousel owl-theme owl-carousel--arrows-outside">
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

                        </section> <!-- end related posts -->

                    </article> <!-- end standard post -->

                    <!-- Comments -->
                    <div class="entry-comments">
                        <div class="title-wrap title-wrap--line">
                            <h3 class="section-title">3 comments</h3>
                        </div>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="comment-avatar">
                                        <img alt="" src="img/content/single/comment_1.jpg">
                                    </div>
                                    <div class="comment-text">
                                        <h6 class="comment-author">Joeby Ragpa</h6>
                                        <div class="comment-metadata">
                                            <a href="single-post-videos.html#" class="comment-date">July 17, 2017 at 12:48 pm</a>
                                        </div>
                                        <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                                        <a href="single-post-videos.html#" class="comment-reply">Reply</a>
                                    </div>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-avatar">
                                                <img alt="" src="img/content/single/comment_2.jpg">
                                            </div>
                                            <div class="comment-text">
                                                <h6 class="comment-author">Alexander Samokhin</h6>
                                                <div class="comment-metadata">
                                                    <a href="single-post-videos.html#" class="comment-date">July 17, 2017 at 12:48 pm</a>
                                                </div>
                                                <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                                                <a href="single-post-videos.html#" class="comment-reply">Reply</a>
                                            </div>
                                        </div>
                                    </li> <!-- end reply comment -->
                                </ul>

                            </li> <!-- end 1-2 comment -->

                            <li>
                                <div class="comment-body">
                                    <div class="comment-avatar">
                                        <img alt="" src="img/content/single/comment_3.jpg">
                                    </div>
                                    <div class="comment-text">
                                        <h6 class="comment-author">Chris Root</h6>
                                        <div class="comment-metadata">
                                            <a href="single-post-videos.html#" class="comment-date">July 17, 2017 at 12:48 pm</a>
                                        </div>
                                        <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                                        <a href="single-post-videos.html#" class="comment-reply">Reply</a>
                                    </div>
                                </div>
                            </li> <!-- end 3 comment -->

                        </ul>
                    </div> <!-- end comments -->

                    <!-- Comment Form -->
                    <div id="respond" class="comment-respond">
                        <div class="title-wrap">
                            <h5 class="comment-respond__title section-title">Leave a Reply</h5>
                        </div>
                        <form id="form" class="comment-form" method="post" action="single-post-videos.html#">
                            <p class="comment-form-comment">
                                <label for="comment">Comment</label>
                                <textarea id="comment" name="comment" rows="5" required="required"></textarea>
                            </p>

                            <div class="row row-20">
                                <div class="col-lg-4">
                                    <label for="name">Name: *</label>
                                    <input name="name" id="name" type="text">
                                </div>
                                <div class="col-lg-4">
                                    <label for="comment">Email: *</label>
                                    <input name="email" id="email" type="email">
                                </div>
                                <div class="col-lg-4">
                                    <label for="comment">Website:</label>
                                    <input name="website" id="website" type="text">
                                </div>
                            </div>

                            <p class="comment-form-submit">
                                <input type="submit" class="btn btn-lg btn-color btn-button" value="Post Comment" id="submit-message">
                            </p>

                        </form>
                    </div> <!-- end comment form -->
                </div>
            </div>

        </div> <!-- end post content -->
    </div>--}}

    <!-- Breadcrumbs -->
    {{--<div class="container">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="index.html" class="breadcrumbs__url">Home</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="index.html" class="breadcrumbs__url">News</a>
            </li>
            <li class="breadcrumbs__item breadcrumbs__item--current">
                World
            </li>
        </ul>
    </div>--}}
    <div class="main-container container" id="main-container">

        <!-- Entry Image -->
        <div class="entry__img-holder mb-40">
            <img src="{{$post['featured_image']}}" alt="" class="entry__img">
        </div>

        <!-- Content -->
        <div class="row">

            <!-- Post Content -->
            <div class="col-lg-8 blog__content mb-72">
                <div class="content-box content-box--top-offset">

                    <!-- standard post -->
                    <article class="entry mb-0">

                        <div class="single-post__entry-header entry__header">
                            <ul class="entry__meta">
                                <li class="entry__meta-category">
                                    <a href="single-post-fashion.html#">{{$post['category_id']}}</a>
                                </li>
                                <li class="entry__meta-date">
                                    {{\Carbon\Carbon::createFromTimeStamp(strtotime($post['created_at']))->diffForHumans()}}
                                </li>
                            </ul>
                            <h1 class="single-post__entry-title">
                                {{$post['title']}}
                            </h1>
                            <div class="entry__meta-holder">
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>by</span>
                                        <a href="single-post-fashion.html#">{{$post['author_id']}}</a>
                                    </li>
                                </ul>

                                <ul class="entry__meta">
                                    <li class="entry__meta-views">
                                        <i class="ui-eye"></i>
                                        <span>1356</span>
                                    </li>
                                    {{--<li class="entry__meta-comments">
                                        <a href="single-post-fashion.html#">
                                            <i class="ui-chat-empty"></i>13
                                        </a>
                                    </li>--}}
                                </ul>
                            </div>
                        </div> <!-- end entry header -->

                        <div class="entry__article-wrap">

                            <!-- Share -->
                            {{--<div class="entry__share">
                                <div class="sticky-col">
                                    <div class="socials socials--rounded socials--large">
                                        <a class="social social-facebook" href="single-post-fashion.html#" title="facebook" target="_blank" aria-label="facebook">
                                            <i class="ui-facebook"></i>
                                        </a>
                                        <a class="social social-twitter" href="single-post-fashion.html#" title="twitter" target="_blank" aria-label="twitter">
                                            <i class="ui-twitter"></i>
                                        </a>
                                        <a class="social social-google-plus" href="single-post-fashion.html#" title="google" target="_blank" aria-label="google">
                                            <i class="ui-google"></i>
                                        </a>
                                        <a class="social social-pinterest" href="single-post-fashion.html#" title="pinterest" target="_blank" aria-label="pinterest">
                                            <i class="ui-pinterest"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- share -->

                            <div class="entry__article">
                                {!! $post['body'] !!}
                                <!-- tags -->
                                <div class="entry__tags">
                                    <i class="ui-tags"></i>
                                    <span class="entry__tags-label">Tags:</span>
                                    <a href="single-post-fashion.html#" rel="tag">mobile</a><a href="single-post-fashion.html#" rel="tag">gadgets</a><a href="single-post-fashion.html#" rel="tag">satelite</a>
                                </div> <!-- end tags -->

                            </div>
                            <!-- end entry article -->
                        </div> <!-- end entry article wrap -->


                        <!-- Prev / Next Post -->
                        {{--<nav class="entry-navigation">
                            <div class="clearfix">
                                <div class="entry-navigation--left">
                                    <i class="ui-arrow-left"></i>
                                    <span class="entry-navigation__label">Previous Post</span>
                                    <div class="entry-navigation__link">
                                        <a href="single-post-fashion.html#" rel="next">How to design your first mobile app</a>
                                    </div>
                                </div>
                                <div class="entry-navigation--right">
                                    <span class="entry-navigation__label">Next Post</span>
                                    <i class="ui-arrow-right"></i>
                                    <div class="entry-navigation__link">
                                        <a href="single-post-fashion.html#" rel="prev">Video Youtube format post. Made with WordPress</a>
                                    </div>
                                </div>
                            </div>
                        </nav>--}}

                        {{--<!-- Author -->
                        <div class="entry-author clearfix">
                            <img alt="" data-src="img/content/single/author.jpg" src="img/empty.png" class="avatar lazyload">
                            <div class="entry-author__info">
                                <h6 class="entry-author__name">
                                    <a href="single-post-fashion.html#">John Carpet</a>
                                </h6>
                                <p class="mb-0">But unfortunately for most of us our role as gardener has never been explained to us. And in misunderstanding our role, we have allowed seeds of all types, both good and bad, to enter our inner garden.</p>
                            </div>
                        </div>--}}

                        <!-- Related Posts -->
                        <section class="section related-posts mt-40 mb-0">
                            <div class="title-wrap title-wrap--line title-wrap--pr">
                                <h3 class="section-title">Related Articles</h3>
                            </div>

                            <!-- Slider -->
                            <div id="owl-posts-3-items" class="owl-carousel owl-theme owl-carousel--arrows-outside">
                                @if(isset($related))
                                    @foreach($related as $item)
                                        <article class="entry thumb thumb--size-1">
                                            <div class="entry__img-holder thumb__img-holder" style="background-image: url({{$item['featured_image']}});">
                                                <div class="bottom-gradient"></div>
                                                <div class="thumb-text-holder">
                                                    <h2 class="thumb-entry-title">
                                                        <a href="{{route(Request::route()->getName(),$item['slug'])}}">{{$item['title']}}</a>
                                                    </h2>
                                                </div>
                                                <a href="{{route(Request::route()->getName(),$item['slug'])}}" class="thumb-url"></a>
                                            </div>
                                        </article>
                                    @endforeach
                                @endif

                            </div> <!-- end slider -->

                        </section> <!-- end related posts -->

                    </article> <!-- end standard post -->


                    <!-- Comment Form -->
                    {{--<div id="respond" class="comment-respond">
                        <div class="title-wrap">
                            <h5 class="comment-respond__title section-title">Leave a Reply</h5>
                        </div>
                        <form id="form" class="comment-form" method="post" action="single-post-fashion.html#">
                            <p class="comment-form-comment">
                                <label for="comment">Comment</label>
                                <textarea id="comment" name="comment" rows="5" required="required"></textarea>
                            </p>

                            <div class="row row-20">
                                <div class="col-lg-4">
                                    <label for="name">Name: *</label>
                                    <input name="name" id="name" type="text">
                                </div>
                                <div class="col-lg-4">
                                    <label for="comment">Email: *</label>
                                    <input name="email" id="email" type="email">
                                </div>
                                <div class="col-lg-4">
                                    <label for="comment">Website:</label>
                                    <input name="website" id="website" type="text">
                                </div>
                            </div>

                            <p class="comment-form-submit">
                                <input type="submit" class="btn btn-lg btn-color btn-button" value="Post Comment" id="submit-message">
                            </p>

                        </form>
                    </div> --}}
                    <!-- end comment form -->

                </div> <!-- end content box -->
            </div> <!-- end post content -->

            <!-- Sidebar -->
            <aside class="col-lg-4 sidebar sidebar--right">

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

                <!-- Widget Ad 300 -->
                <aside class="widget widget_media_image">
                    <a href="single-post-fashion.html#">
                        <img src="img/content/placeholder_336.jpg" alt="">
                    </a>
                </aside> <!-- end widget ad 300 -->

            </aside> <!-- end sidebar -->

        </div> <!-- end content -->
    </div>
    <!-- end main container -->
@endsection
