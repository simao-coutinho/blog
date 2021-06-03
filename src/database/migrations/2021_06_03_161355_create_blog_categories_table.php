<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->bigIncrements('id')->start_from(3285);
            $table->text('title');
            $table->text('url_alias');
            $table->boolean('state')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
