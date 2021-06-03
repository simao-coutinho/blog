<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoryDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_category_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id')->start_from(3285);
            $table->bigInteger('blog_category_id');
            $table->text('title');
            $table->text('url_alias');

            $table->index(['blog_category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_category_descriptions');
    }
}
