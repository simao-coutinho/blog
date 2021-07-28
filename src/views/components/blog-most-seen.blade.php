<div class="block-posts-most-viewed mt-5">
    <h4>Posts mais vistos</h4>
    <ul>
        @foreach($mostSeenBlogs as $mostSeenBlog)
            <li>
                <a href="{{ route('noticia_single', ['url' => $mostSeenBlog->description->url_alias]) }}" class="font-13-px">
                    {{ $mostSeenBlog->description->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
