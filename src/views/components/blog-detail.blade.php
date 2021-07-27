<section id="single_news" class="secondary-page">
    <div class="general general-results">
        <div class="top-score-title">
            <h3>{{ $blog->description->title }}</h3>

            <div class="w-100">
                        <span style="display: table; margin-left: auto; margin-right: auto;">
                            <i class="fa fa-calendar"></i> {{ date("d-m-Y", strtotime($blog->date)) }}
                            <i class="fa fa-clock-o"></i> {{ round(str_word_count(strip_tags($blog->description->text)) / 200) }} min. leitura
                        </span>
                @if($blog->blogCategories->count() > 0)
                    <span style="display: table; margin-left: auto; margin-right: auto; margin-top: 20px;">
                            <div class="post_theme">
                                @foreach($blog->blogCategories as $category)
                                    @if(!$loop->first)
                                        &nbsp;
                                    @endif
                                    {{ $category['category']['description']['title']}}
                                @endforeach
                            </div>
                        </span>
                @endif
            </div>

            <p class="desc_news" style=" margin-top: 40px;">{!! $blog->description->summary !!}</p>

            <img src="{{ asset($blog->image) }}" style="width: 100%;"/>

            <p class="desc_news">{!! $blog->description->text !!}</p>

            <p class="desc_news">
            </p>

            {{--                    <div class="other-news">--}}
            {{--                        <h3>Other <span>News</span><span class="point-little">.</span></h3>--}}
            {{--                        <ul id="product" class="bxslider">--}}
            {{--                            <li>--}}
            {{--                                <img src="images/news/1.jpg" alt="" />--}}
            {{--                                <p class="product-title">Europe Tour</p>--}}
            {{--                                <p class="txt-other-news">It normally takes a great of deal time and effort to defeat No. 26 Gilles Simon, largely due to his counterpunching style of play and impressive foot speed.</p>--}}
            {{--                                <div><a href="single_news.html" class="ready-news">Read</a></div>--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                <img src="images/news/2.jpg" alt="" />--}}
            {{--                                <p class="product-title">London Cup</p>--}}
            {{--                                <p class="txt-other-news">It normally takes a great of deal time and effort to defeat No. 26 Gilles Simon, largely due to his counterpunching style of play and impressive foot speed.</p>--}}
            {{--                                <div><a href="single_news.html" class="ready-news">Read</a></div>--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                <img src="images/news/3.jpg" alt="" />--}}
            {{--                                <p class="product-title">ATP World</p>--}}
            {{--                                <p class="txt-other-news">It normally takes a great of deal time and effort to defeat No. 26 Gilles Simon, largely due to his counterpunching style of play and impressive foot speed.</p>--}}
            {{--                                <div><a href="single_news.html" class="ready-news">Read</a></div>--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                <img src="images/news/4.jpg" alt="" />--}}
            {{--                                <p class="product-title">WPT World</p>--}}
            {{--                                <p class="txt-other-news">It normally takes a great of deal time and effort to defeat No. 26 Gilles Simon, largely due to his counterpunching style of play and impressive foot speed.</p>--}}
            {{--                                <div><a href="single_news.html" class="ready-news">Read</a></div>--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                <img src="images/news/5.jpg" alt="" />--}}
            {{--                                <p class="product-title">Russian</p>--}}
            {{--                                <p class="txt-other-news">It normally takes a great of deal time and effort to defeat No. 26 Gilles Simon, largely due to his counterpunching style of play and impressive foot speed.</p>--}}
            {{--                                <div><a href="single_news.html" class="ready-news">Read</a></div>--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                <img src="images/news/6.jpg" alt="" />--}}
            {{--                                <p class="product-title">Africa Tour</p>--}}
            {{--                                <p class="txt-other-news">It normally takes a great of deal time and effort to defeat No. 26 Gilles Simon, largely due to his counterpunching style of play and impressive foot speed.</p>--}}
            {{--                                <div><a href="single_news.html" class="ready-news">Read</a></div>--}}
            {{--                            </li>--}}

            {{--                        </ul>--}}
            {{--                    </div>--}}

            {{--                    <div class="top-score-title l-comment">--}}
            {{--                        <h3>LEAVE A <span>COMMENT</span><span class="point-little">.</span></h3>--}}
            {{--                        <div class="col-md-12 login-page">--}}
            {{--                            <form method="post" class="register-form">--}}

            {{--                                <div class="name">--}}
            {{--                                    <label for="name">* Name:</label><div class="clear"></div>--}}
            {{--                                    <input id="Text2" name="name" type="text" placeholder="e.g. Mr. John" required=""/>--}}
            {{--                                </div>--}}
            {{--                                <div class="name">--}}
            {{--                                    <label for="email">* Email:</label><div class="clear"></div>--}}
            {{--                                    <input id="email" name="email" type="text" placeholder="e.g. Mr. Doe" required=""/>--}}
            {{--                                </div>--}}
            {{--                                <div class="message">--}}
            {{--                                    <label for="message"> Message:</label>--}}
            {{--                                    <textarea name="messagetext" class="txt-area" id="message" cols="30" rows="4"></textarea>--}}
            {{--                                </div>--}}
            {{--                                <div id="register-submit">--}}
            {{--                                    <input type="submit" value="Submit"/>--}}
            {{--                                </div>--}}
            {{--                            </form>--}}

            {{--                        </div>--}}

            {{--                    </div><!--Close comment-->--}}

        </div><!--Close Top Match-->
    </div>
</section>
