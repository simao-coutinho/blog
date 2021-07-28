<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id')->start_from(3285);
            $table->bigInteger('blog_id');
            $table->bigInteger('language_id');
            $table->text('title');
            $table->longText('text')->nullable();
            $table->text('summary');
            $table->text('url_alias');
            $table->timestamps();

            $table->index(['blog_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_descriptions');
    }
}
