<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoryRelationshipsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_category_relationships', function (Blueprint $table) {
            $table->bigIncrements('id')->start_from(3285);
            $table->bigInteger('blog_id');
            $table->bigInteger('blog_category_id');

            $table->index(['blog_id', 'blog_category_id']);
        });


    }

    public function down()
    {
        Schema::dropIfExists('blog_category_relationships');
    }
}
