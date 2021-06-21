<?php

namespace SimaoCoutinho\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public function description() {
        return $this->hasOne(BlogCategoryDescription::class, "blog_category_id", "id");
    }
    
    public function posts() {
        $categoryBlogRelationship = BlogCategoryRelationship::whereBlogCategoryId($this->id)->pluck('blog_id');
        return Blog::whereIn("id", $categoryBlogRelationship)->whereState(true)->whereDeleted(false)->get();
    }
}
