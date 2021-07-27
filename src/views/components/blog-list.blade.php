<section id="news" class="secondary-page section-blog">
    <div class="general general-results players">
        <div class="top-score-title right-score">
            <h3>NOTÍCIAS</h3>
            <div class="section-blog">
                <div class="row">
                    <div class="col-12">
                        <ul class="posts">
                            @foreach($blogs as $blog)
                                @if ($loop->index % 2 == 0)
                                    <li style="border-bottom: silver solid 1px; padding-bottom: 20px;">
                                        <div class="post row">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                <a href="{{ route('noticia_single', ["url" => $blog->description->url_alias]) }}" class="post-img">
                                                    <img src="{{ isset($blog->image) ? asset($blog->image) : asset("img/FNS_gray.png") }}" class="img-fluid rounded" style="max-height: 130px;" alt="{{ $blog->description->title }}">
                                                    @php
                                                        // Março <- returned a bad encoding ..
                                                        // https://stackoverflow.com/questions/8993971/php-strftime-french-characters
                                                        setlocale(LC_TIME, "pt_PT");
                                                        $month = utf8_encode(strftime('%B', strtotime($blog->date)));
                                                        $month = ucfirst($month);

                                                        $year = date('Y', strtotime($blog->date));
                                                        $day  = date('d', strtotime($blog->date));
                                                    @endphp
                                                    <span class="post-date">{{ $month . ' ' . $day . ', ' . $year }}</span>
                                                </a>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                <div class="post-meta">
                                                    <h2 class="post-title">
                                                        <a href="{{ route('noticia_single', ["url" => $blog->description->url_alias]) }}">
                                                            {{ $blog->description->title }}
                                                        </a>
                                                    </h2>
                                                    <p class="post-summary">
                                                        {{ $blog->description->summary }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="pb-3" style="border-bottom: silver solid 1px; padding-bottom: 20px;">
                                        <div class="post row">
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                <div class="post-meta">
                                                    <h2 class="post-title">
                                                        <a href="{{ route('noticia_single', ["url" => $blog->description->url_alias]) }}">
                                                            {{ $blog->description->title }}
                                                        </a>
                                                    </h2>
                                                    <p class="post-summary">
                                                        {{ $blog->description->summary }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                <a href="{{ route('noticia_single', ["url" => $blog->description->url_alias]) }}" class="post-img">
                                                    <img src="{{ isset($blog->image) ? asset($blog->image) : asset("img/FNS_gray.png") }}" class="img-fluid rounded" style="max-height: 130px;" alt="{{ $blog->description->title }}">
                                                    @php
                                                        // Março <- returned a bad encoding ..
                                                        // https://stackoverflow.com/questions/8993971/php-strftime-french-characters
                                                        $month = utf8_encode(strftime('%B', strtotime($blog->date)));
                                                        $month = ucfirst($month);

                                                        $year = date('Y', strtotime($blog->date));
                                                        $day  = date('d', strtotime($blog->date));
                                                    @endphp
                                                    <span class="post-date">{{ $month . ' ' . $day . ', ' . $year }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{ $blogs->appends(request()->input())->links() }}
        </div>
    </div>
</section>
