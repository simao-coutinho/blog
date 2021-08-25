<?php

namespace App\View\Components;

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
        $blogs = Blog::whereDeleted(false)->whereState(true)->orderByDesc('created_at')->get();

        return view('components.latest-blog', [
            'latestBlogs' => $blogs
        ]);
    }
}
