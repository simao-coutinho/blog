<?php

namespace SimaoCoutinho\Blog\Components;

use Illuminate\View\Component;
use SimaoCoutinho\Blog\Models\Blog;

class BlogFeatured extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $blogFeatureds = Blog::whereDeleted(false)->whereState(true)->where('date', ">=", "NOW()")->whereFeatured(true)->limit(4)->get();

        return view('blog::components.blog-featured', [
            'blogFeatureds' => $blogFeatureds
        ]);
    }
}
