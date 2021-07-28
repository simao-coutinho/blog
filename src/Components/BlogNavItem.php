<?php

namespace SimaoCoutinho\Blog\Components;

use Illuminate\View\Component;

class BlogNavItem extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.blog-nav-item');
    }
}
