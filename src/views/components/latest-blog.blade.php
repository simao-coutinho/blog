<div class="block-posts-featured mt-5">
    <h4>Últimas Notícias</h4>
    <ul>
        @foreach($latestBlogs as $latestBlog)
            <li>
                <a href="{{ route('noticia_single', ['url' => $latestBlog->description->url_alias]) }}">
                    {{ $latestBlog->description->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
