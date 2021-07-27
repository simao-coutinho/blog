<?php

namespace SimaoCoutinho\Blog\Components;

use Illuminate\View\Component;
use SimaoCoutinho\Blog\Models\Blog;

class LatestBlog extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $blogs = Blog::whereDeleted(false)->whereState(true)->orderByDesc('created_at')->limit(3)->get();

        return view('blog::components.latest-blog', [
            'latestBlogs' => $blogs
        ]);
    }
}
