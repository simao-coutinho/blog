<?php

namespace SimaoCoutinho\Blog\Components;

use Illuminate\View\Component;
use SimaoCoutinho\Blog\Models\Blog;

class FooterLatestBlog extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $blogs = Blog::whereState(true)->whereDeleted(false)->orderByDesc('date')->limit(3)->get();

        return view('blog::components.footer-latest-blog', [
            'footerLatestBlogs' => $blogs
        ]);
    }
}
