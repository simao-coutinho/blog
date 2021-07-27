<div class="top-score-title col-md-12 right-title">
    <h3>Notícias mais vistas</h3>
    @foreach($mostSeenBlogs as $mostSeenBlog)
        <div class="right-content">
            <p class="news-title-right">{{ $mostSeenBlog->description->title }}</p>
            <p class="txt-right">{{ $mostSeenBlog->description->summary }}</p>
            <a href="{{ route('noticia_single', ['url' => $mostSeenBlog->description->url_alias]) }}" class="ca-more"><i class="fa fa-angle-double-right"></i>ver mais...</a>
        </div>
    @endforeach
</div>
