<?php

namespace SimaoCoutinho\Blog\Components;

use Illuminate\View\Component;
use SimaoCoutinho\Blog\Models\Blog;

class BlogMostSeen extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $blogs = Blog::whereDeleted(false)->whereState(true)->orderByDesc('total_clicks')->limit(3)->get();

        return view('blog::components.blog-most-seen', [
            'mostSeenBlogs' => $blogs
        ]);
    }
}
