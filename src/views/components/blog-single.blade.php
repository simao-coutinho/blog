<div class="section-blog single-post">
    <article id="{{ $blog->id }}" class="content">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-12">
                    <a href="{{ route('noticias') }}">« Voltar ao blog</a>
                    <div class="headline">
                        <h1>{{ $blog->description->title }}</h1>
                    </div>
                    <div class="meta">
                        <span class="post-date">{{ date("d-m-Y", strtotime($blog->date)) }}</span>
                        <span class="time-read ml-2">
                            <i class="far fa-clock text-secondary font-13-px"></i> {{ round(str_word_count(strip_tags($blog->description->text)) / 200) }} min.
                        </span>
                        @if (Auth::check())
                            <a href="{{ route('admin.blogShow', ['id' => $blog->id]) }}"
                               class="btn btn-warning btn-sm text-dark ml-2 font-weight-bold">
                                Editar Post
                            </a>
                        @endif
                    </div>
                    <div class="summary">
                        {!! $blog->description->summary !!}
                    </div>
                    <div class="mt-4">
                        @if ($blog->url_video)
                            <div class="embed-responsive embed-responsive-16by9">
                                <video controls class="mt-2">
                                    <source src="{{ asset("public/" . $blog->video) }}" type="video/mp4">
                                </video>
                            </div>
                        @else
                            <img
                                src="{{ isset($blog->image) ? asset("public/" . $blog->image) : asset('public/img/enkonta/enkonta_logo.pt_grayscale.png') }}"
                                class="img-fluid w-100"/>
                        @endif
                    </div>
                    <div class="text">
                        {!! nl2br($blog->description->text) !!}
                    </div>
                </div>
                <div class="col-xl-3 col-12">
                    <x-blog-blog-categories />

                    <x-blog-latest-blog />

                    <x-blog-blog-most-seen />
                </div>
            </div>
        </div>
    </article>
</div>
