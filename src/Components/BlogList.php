<?php

namespace SimaoCoutinho\Blog\Components;

use Illuminate\View\Component;
use SimaoCoutinho\Blog\Models\Blog;
use SimaoCoutinho\Blog\Models\BlogCategoryDescription;
use SimaoCoutinho\Blog\Models\BlogCategoryRelationship;

class BlogList extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (isset($_GET['categoria'])) {
            $blogCategory = BlogCategoryDescription::whereUrlAlias($_GET['categoria'])->first();

            if ($blogCategory) {
                $category_id = $blogCategory->blog_category_id;
            }
        }

        if (isset($category_id)) {
            $blogIds = BlogCategoryRelationship::whereBlogCategoryId($category_id)->pluck('blog_id');

            $blogs = Blog::whereState(true)->whereDeleted(false)->orderByDesc('date')
                ->whereIn('id', $blogIds)->paginate(10);
        } else {
            $blogs = Blog::whereState(true)->whereDeleted(false)->orderByDesc('date')->paginate(10);
        }

        return view('blog::components.blog-list', [
            'blogs' => $blogs
        ]);
    }
}
