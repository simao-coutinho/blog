@foreach($footerLatestBlogs as $footerLatestBlog)
    <li style="margin-top: 8px;"><img src="{{ asset($footerLatestBlog->image) }}" alt="" style="max-height: 60px;"/>
        <p>{{ $footerLatestBlog->description->title }}</p></li>
@endforeach
