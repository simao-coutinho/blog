<?php

namespace SimaoCoutinho\Blog\Components;

use Auth;
use Illuminate\View\Component;
use SimaoCoutinho\Blog\Models\Blog;
use SimaoCoutinho\Blog\Models\BlogClicks;
use SimaoCoutinho\Blog\Models\BlogDescription;

class BlogDetail extends Component
{
    public $url;

    /**
     * BlogDetail constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $blogDescription = BlogDescription::whereUrlAlias($this->url)->first();
        $blog = Blog::findOrFail($blogDescription->blog_id);

        $blogClick = new BlogClicks();
        $blogClick->blog_id = $blog->id;
        $blogClick->language_id = 0;
        if (!Auth::guest()) {
            $blogClick->user_id = Auth::id();
        }
        $blogClick->save();

        $blog->total_clicks = $blog->total_clicks + 1;
        $blog->save();

        $word = str_word_count(strip_tags($blog->description->text));
        $m = floor($word / 200);

        return view('blog::components.blog-detail', [
            'blog' => $blog,
            'est' => $m
        ]);
    }
}
