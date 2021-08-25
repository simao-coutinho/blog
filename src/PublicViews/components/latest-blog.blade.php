<div class="top-score-title col-md-12 right-title">
    <h3>Últimas Notícias</h3>
    @foreach($latestBlogs as $latestBlog)
        <div class="right-content">
            <p class="news-title-right">{{ $latestBlog->description->title }}</p>
            <p class="txt-right">{{ $latestBlog->description->summary }}</p>
            <a href="{{ route('noticia_single', ['url' => $latestBlog->description->url_alias]) }}" class="ca-more"><i class="fa fa-angle-double-right"></i>ver mais...</a>
        </div>
    @endforeach
</div>
