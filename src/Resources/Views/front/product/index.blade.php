@extends(config('writter.views.front.layouts.base'))

@section('content')
    <!-- Navigation -->
    @include(config('writter.views.front.layouts.partials.navbars.alt_main_nav'))
    <!-- end navigation -->

    <div class="main-container container pt-40" id="main-container">

        <!-- Letest News -->
        <section class="section mb-16">
            <div class="title-wrap">
                <h3 class="section-title"></h3>
            </div>
            <div class="row card-row">
                @if(isset($products))
                    @foreach($products as $item)

                        <div class="col-md-4">
                            <a href="#">
                                <article class="entry card card--1">
                                    <div class="entry__img-holder card__img-holder">
                                        <a href="{{route(Request::route()->getName(),$item['slug'])}}">
                                            <div class="thumb-container thumb-70">
                                                <img data-src="{{$item['featured_image']}}" src="{{$item['featured_image']}}" class="entry__img lazyload" alt="" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="entry__body card__body">
                                        <div class="entry__header">
                                            <ul class="entry__meta">
                                                <li class="entry__meta-category">
                                                    <a href="{{route(Request::route()->getName(),$item['slug'])}}">Product</a>
                                                </li>
                                                <li class="entry__meta-date">
                                                    Now
                                                </li>
                                            </ul>
                                            <h2 class="entry__title">
                                                <a href="{{route(Request::route()->getName(),$item['slug'])}}">{{ $item->name }}</a>
                                            </h2>
                                            <ul class="entry__meta">
                                                <li class="entry__meta-author">
                                                    <span>by</span>
                                                    <a href="{{route(Request::route()->getName(),$item['slug'])}}">Admin</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </article>
                            </a>

                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!-- end latest news -->
    </div> <!-- end main container -->
@endsection
