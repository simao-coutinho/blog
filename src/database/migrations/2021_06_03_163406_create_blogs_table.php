<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id')->start_from(3285);
            $table->date('date');
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('state')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
