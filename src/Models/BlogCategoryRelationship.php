<?php

namespace SimaoCoutinho\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryRelationship extends Model
{
    public function category() {
        return $this->hasOne(BlogCategory::class, "id", 'blog_category_id');
    }
}
