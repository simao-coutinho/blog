<?php

namespace SimaoCoutinho\Blog\Components;

use Illuminate\View\Component;
use SimaoCoutinho\Blog\Models\Blog;

class ScrollerLastBlog extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $latestBlog = Blog::whereState(true)->whereDeleted(false)->orderByDesc('date')->first();

        return view('blog::components.scroller-last-blog', [
            'latestScroller' => $latestBlog
        ]);
    }
}
