<div class="section-blog" style="min-height: auto">
    <div class="container">
        <div class="row">
            @foreach($blogFeatureds as $blogFeatured)
                <div class="col-md-3 col-lg-3 col-6">
                    <ul class="posts">
                        <a href="{{ route('noticia_single', ["url" => $blogFeatured->description->url_alias]) }}" class="post-img">
                            <img src="{{ isset($blogFeatured->image) ? asset("public/" . $blogFeatured->image) : asset("public/img/enkonta/enkonta_grayscale.png") }}" class="img-fluid rounded" style="max-height: 130px;" alt="{{ $blogFeatured->description->title }}">
                            @php
                                // Março <- returned a bad encoding ..
                                // https://stackoverflow.com/questions/8993971/php-strftime-french-characters
                                setlocale(LC_TIME, "pt_PT");
                                $month = utf8_encode(strftime('%B', strtotime($blogFeatured->date)));
                                $month = ucfirst($month);

                                $year = date('Y', strtotime($blogFeatured->date));
                                $day  = date('d', strtotime($blogFeatured->date));
                            @endphp
                            <span class="post-date" style="bottom: 10px;">{{ $month . ' ' . $day . ', ' . $year }}</span>
                            <div class="post-meta">
                                <h2 class="post-title" style="position: relative; top: 30px;">
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
    </div>
</div>
