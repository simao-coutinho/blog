<?php

namespace App\View\Components;

use Illuminate\View\Component;
use SimaoCoutinho\Blog\Models\BlogCategory;

class BlogCategories extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $blogCategories = BlogCategory::whereDeleted(0)->whereState(1)->orderBy('position')->get();

        return view('components.blog-categories', [
            'blogCategories' => $blogCategories
        ]);
    }
}
