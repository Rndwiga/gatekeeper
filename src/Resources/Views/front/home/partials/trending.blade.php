<!-- Trending Now -->
<div class="container">
    <div class="trending-now">
        <span class="trending-now__label">
          <i class="ui-flash"></i>
          <span class="trending-now__text d-lg-inline-block d-none">Newsflash</span>
        </span>
        <div class="newsticker">
            <ul class="newsticker__list">
                @if(isset($latestTicker))
                    @foreach($latestTicker as $latest)
                        <li class="newsticker__item"><a href="{{route('writter.front.article',$latest['slug'])}}" class="newsticker__item-url">{{$latest['title']}}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="newsticker-buttons">
            <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-left"></i></button>
            <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-right"></i></button>
        </div>
    </div>
</div>
<!-- Trending Now -->
