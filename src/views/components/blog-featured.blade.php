<div class="section-blog" style="min-height: auto">
    <div class="container">
        <article class="content">
            <div class="row">
                @foreach($blogFeatureds as $blogFeatured)
                    <div class="col-md-4 col-lg-4 col-12 pt-5">
                        <ul class="posts">
                            <a href="{{ route('noticia_single', ["url" => $blogFeatured->description->url_alias]) }}" class="post-img">
                                <img src="{{ isset($blogFeatured->image) ? asset("public/" . $blogFeatured->image) : asset("public/img/enkonta/enkonta_grayscale.png") }}" class="img-fluid rounded" style="display: block; margin-left: auto; margin-right: auto;" alt="{{ $blogFeatured->description->title }}">
                                @php
                                    // Março <- returned a bad encoding ..
                                    // https://stackoverflow.com/questions/8993971/php-strftime-french-characters
                                    setlocale(LC_TIME, "pt_PT");
                                    $month = utf8_encode(strftime('%B', strtotime($blogFeatured->date)));
                                    $month = ucfirst($month);

                                    $year = date('Y', strtotime($blogFeatured->date));
                                    $day  = date('d', strtotime($blogFeatured->date));
                                @endphp
                                <span class="post-date" style="top: 190px; bottom: auto">{{ $month . ' ' . $day . ', ' . $year }}</span>
                                <div class="post-meta">
                                    <h2 class="post-title" style="position: relative; top: 30px; text-align: center">
                                        <a href="{{ route('noticia_single', ["url" => $blogFeatured->description->url_alias]) }}">
                                            {{ $blogFeatured->description->title }}
                                        </a>
                                    </h2>
                                </div>
                            </a>
                        </ul>
                    </div>
                @endforeach
            </div>
        </article>

    </div>
</div>
