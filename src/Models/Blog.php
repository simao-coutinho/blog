<?php

namespace SimaoCoutinho\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function description() {
        return $this->hasOne(BlogDescription::class, "blog_id", "id");
    }

    public function blogCategories() {
        return $this->hasMany(BlogCategoryRelationship::class, "blog_id", "id");
    }
}
