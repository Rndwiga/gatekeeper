<!-- Featured Posts Grid -->
<section class="featured-posts-grid">
    <div class="container">
        <div class="row row-8">

            <div class="col-lg-6">
                @if(isset($smallLatestPosts))
                    @foreach($smallLatestPosts as $post)
                        <!-- Small post -->
                        <div class="featured-posts-grid__item featured-posts-grid__item--sm">
                            <article class="entry card post-list featured-posts-grid__entry">
                                <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url({{$post['featured_image']}})">
                                    <a href="{{route('writter.front.article',$post['slug'])}}" class="thumb-url"></a>
                                    <img src="{{$post['featured_image']}}" alt="" class="entry__img d-none">
                                    <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">{{$post['category_id']}}</a>
                                </div>

                                <div class="entry__body post-list__body card__body">
                                    <h2 class="entry__title">
                                        <a href="{{route('writter.front.article',$post['slug'])}}">{{$post['title']}}</a>
                                    </h2>
                                    <ul class="entry__meta">
                                        <li class="entry__meta-author">
                                            <span>by</span>
                                            <a href="{{route('writter.front.article',$post['slug'])}}">{{$post['author_id']}}</a>
                                        </li>
                                        <li class="entry__meta-date">
                                            {{\Carbon\Carbon::createFromTimeStamp(strtotime($post['created_at']))->diffForHumans()}}
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <!-- end post -->
                    @endforeach
                @endif

            </div>
            <!-- end col -->

            <div class="col-lg-6">
                @if(isset($featuredPost))
                <!-- Large post -->
                <div class="featured-posts-grid__item featured-posts-grid__item--lg">
                    <article class="entry card featured-posts-grid__entry">
                        <div class="entry__img-holder card__img-holder">
                            <a href="{{route('writter.front.article',$featuredPost['slug'])}}">
                                <img src="{{$featuredPost['featured_image']}}" alt="" class="entry__img">
                            </a>
                            <a href="{{route('writter.front.article',$featuredPost['slug'])}}" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green">{{$featuredPost['category_id']}}</a>
                        </div>

                        <div class="entry__body card__body">
                            <h2 class="entry__title">
                                <a href="{{route('writter.front.article',$featuredPost['slug'])}}">{{$featuredPost['title']}}</a>
                            </h2>
                            <ul class="entry__meta">
                                <li class="entry__meta-author">
                                    <span>by</span>
                                    <a href="{{route('writter.front.article',$featuredPost['slug'])}}">{{$featuredPost['author_id']}}</a>
                                </li>
                                <li class="entry__meta-date">
                                    {{\Carbon\Carbon::createFromTimeStamp(strtotime($featuredPost['created_at']))->diffForHumans()}}
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                    <!-- end large post -->
                @endif
            </div>

        </div>
    </div>
</section>
<!-- end featured posts grid -->
