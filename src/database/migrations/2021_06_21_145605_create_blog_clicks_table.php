<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogClicksTable extends Migration
{
    public function up()
    {
        Schema::create('blog_clicks', function (Blueprint $table) {
            $table->bigIncrements('id')->start_from(3285);
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('language_id')->nullable();
            $table->bigInteger('blog_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_clicks');
    }
}
